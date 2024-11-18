<?php

namespace App\Base\Services;

use App\Base\Traits\Request\SendRequest;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class ChatGatewaySocketV2 implements MessageComponentInterface
{
    use SendRequest;

    protected $clients;
    private $subscriptions;
    private $users;
    private $user_resources;
    private $authUsers;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->subscriptions = [];
        $this->users = [];
        $this->user_resources = [];
        echo "Server Started \r\n";
    }

    private function authenticateUser($query, $conn)
    {
        $token = str_replace('token=', '', $query);
        $token = str_replace('%7C', '|', $token);
        $tokenarr = explode('|', $token);
        if (is_numeric($tokenarr[0])) {
            $token = \Laravel\Sanctum\PersonalAccessToken::findToken($token);
            if ($token) {
                $this->authUsers[$conn->resourceId] = [
                    'sender_type' => $token->tokenable->getTable(),
                    'sender_id' => $token->tokenable->id,
                    'sender_name' => $token->tokenable->name,
                ];
                return true;
            }
        }
        return false;
    }

    // private function saveToDB($data, $id)
    // {
    //     $modelData = [
    //         ...$this->authUsers[$id],
    //         ...$data,
    //     ];

    //     // Chat::create($modelData);
    // }

    public function onOpen(ConnectionInterface $conn)
    {
        $query = $conn->httpRequest->getUri()->getQuery();
        // if (!$this->authenticateUser($query, $conn)) {
        //     $conn->send(json_encode(['error' => "User authentication failed"]));
        //     echo "User authentication failed\n";
        //     $conn->close();
        //     return;
        // }

        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
        echo "user " . $conn->resourceId . " connected \r\n";
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected \r\n";
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);

        foreach ($this->user_resources as &$userId) {
            foreach ($userId as $key => $resourceId) {
                if ($resourceId == $conn->resourceId) {
                    unset($userId[$key]);
                }
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \r\n";
        $conn->close();
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $data = json_decode($msg);

        $validationResult = $this->validateMessage($data);
        if ($validationResult !== true) {
            $conn->send(json_encode(['error' => $validationResult]));
            return;
        }

        if (isset($data->command)) {
            switch ($data->command) {
                case "subscribe":
                    $this->subscriptions[$conn->resourceId] = [
                        'channel' => $data->channel,
                        'type' => $data->type, // Expecting 'chat', 'notification', 'ride', etc.
                    ];
                    dump('Subscribed to ' . $data->type . ' on channel ' . $data->channel);
                    break;

                case "chat":
                    $this->handleChatMessage($conn, $data);
                    break;

                case "notification":
                    $this->handleNotification($conn, $data);
                    break;

                case "ride":
                    $this->handleRideMessage($conn, $data);
                    break;

                default:
                    $example = array(
                        'methods' => [
                            "subscribe" => '{command: "subscribe", channel: "global", type: "chat"}',
                            "ride" => '{command: "ride", message: "hello glob", channel: "global"}',
                            "notification" => '{command: "notification", message: "new notification"}',
                            "chat" => '{command: "chat", message: "hello", channel: "chat-room-1"}',
                            "register" => '{command: "register", userId: 9}',
                        ],
                    );
                    $conn->send(json_encode($example));
                    break;
            }
        }
    }

    private function validateMessage($data)
    {
        $rules = [
            'subscribe' => ['channel', 'type'],
            'chat' => ['message', 'channel'],
            'notification' => ['message'],
            'ride' => ['message', 'channel'],
        ];

        if (!isset($data->command) || !array_key_exists($data->command, $rules)) {
            return "Invalid or missing command.";
        }

        $requiredFields = $rules[$data->command];

        foreach ($requiredFields as $field) {
            if (!isset($data->$field)) {
                return "Missing required field: {$field}";
            }
        }

        if (isset($data->message) && !is_string($data->message)) {
            return "The 'message' field must be a string.";
        }

        return true;
    }

    private function handleChatMessage(ConnectionInterface $conn, $data)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId]['channel'];
            foreach ($this->subscriptions as $id => $subscription) {
                if ($subscription['channel'] == $target && $subscription['type'] == 'chat' && $id != $conn->resourceId) {
                    $this->users[$id]->send(json_encode(['type' => 'chat', 'message' => $data->message]));
                }
            }
            dump($data);
        }
    }

    private function handleNotification(ConnectionInterface $conn, $data)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            // Send to all users subscribed to notifications
            foreach ($this->subscriptions as $id => $subscription) {
                if ($subscription['type'] == 'notification') {
                    $this->users[$id]->send(json_encode(['type' => 'notification', 'message' => $data->message]));
                }
            }
            dump($data);
        }
    }

    private function handleRideMessage(ConnectionInterface $conn, $data)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId]['channel'];
            foreach ($this->subscriptions as $id => $subscription) {
                if ($subscription['channel'] == $target && $subscription['type'] == 'ride' && $id != $conn->resourceId) {
                    $this->users[$id]->send(json_encode(['type' => 'ride', 'message' => $data->message]));
                }
            }
            dump($data);
        }
    }

}
