<?php

namespace App\Base\Services;

use App\Base\Traits\Request\SendRequest;
use Exception;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class ChatGatewaySocket implements MessageComponentInterface
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

    private function checkApiKey($apiKey, ConnectionInterface $conn)
    {
        if ($apiKey === env('WEBSOCKET_API_KEY')) {
            return true;
        }

        return false;
    }

    private function authenticateUser($data, $conn)
    {
        try {
            $accessToken = $data->auth_token;
            $tokenId = $this->extractTokenId($accessToken);

            if (!$tokenId) {
                return false;
            }

            $tokenRepository = new TokenRepository();
            $token = $tokenRepository->find($tokenId);

            if ($token && !$token->revoked) {
                return $this->getUserDetails($token, $data->user_type);
            }

            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Extract the token ID from the access token.
     */
    private function extractTokenId($accessToken)
    {
        $tokenParts = explode('.', explode(' ', $accessToken)[0]);

        if (count($tokenParts) < 2) {
            return null;
        }

        $tokenHeader = base64_decode($tokenParts[1]);
        $tokenHeaderArray = json_decode($tokenHeader, true);

        return $tokenHeaderArray['jti'] ?? null;
    }

    /**
     * Get user details based on token client ID and user type.
     */
    private function getUserDetails($token, $userType)
    {
        if ($token->client_id == 2 && $userType == 'customer') {
            return [
                'user_type' => 'customer',
                'user_id' => $token->user_id,
            ];
        }

        if ($token->client_id == 1 && $userType == 'provider') {
            return [
                'user_type' => 'provider',
                'user_id' => $token->user_id,
            ];
        }

        return false;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $query = $conn->httpRequest->getUri()->getQuery();
        parse_str($query, $queryParams);

        if (isset($queryParams['api-key'])) {
            $apiKey = $queryParams['api-key'];

            if (!$this->checkApiKey($apiKey, $conn)) {
                $conn->send(json_encode(['error' => "Invalid API key"]));
                echo "Invalid API key\n";
                $conn->close();
                return;
            }
        } else {
            $conn->send(json_encode(['error' => "API key is required"]));
            echo "API key is required\n";
            $conn->close();
            return;
        }

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

    public function onMessage(ConnectionInterface $conn, $data)
    {
        $data = json_decode($data);
        if (isset($data->command)) {
            switch ($data->command) {
                case "subscribe":
                    // if (!$this->authenticateUser($data->data, $conn)) {
                    //     $conn->send(json_encode(['error' => "Invalid Auth Token"]));
                    //     echo "Invalid Auth Token Key\n";
                    //     $conn->close();
                    //     return;
                    // }
                    $this->subscriptions[$conn->resourceId] = [
                        'channel' => $data->channel,
                        'type' => $data->type, // Expecting 'chat', 'notification', 'ride','rides', etc.
                    ];
                    dump($this->subscriptions);
                    break;

                case "chat":
                    $this->handleChatMessage($conn, $data);
                    break;

                case "notification":
                    $this->handleNotification($conn, $data);
                    break;

                case "ride":
                    $this->handleRideChannel($conn, $data);
                    break;

                case "rides":
                    // $this->handleRidesChannel($conn, $data);
                    break;

                default:
                    $example = array(
                        'methods' => [
                            "subscribe" => '{command: "subscribe", channel: "global"}',
                            "chat" => '{command: "chat", message: "hello chat", channel: "chat"}',
                            "ride" => '{command: "ride", message: "hello ride", channel: "ride"}',
                            "rides" => '{command: "rides", message: "hello rides", channel: "rides"}',
                            "message" => '{command: "message", to: "1", message: "it needs xss protection"}',
                            "register" => '{command: "register", userId: 9}',
                        ],
                    );
                    $conn->send(json_encode($example));
                    break;
            }
        }
    }

    private function handleChatMessage(ConnectionInterface $conn, $data)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId]['channel'];
            dd($this->subscriptions[$conn->resourceId]);
            foreach ($this->subscriptions as $id => $subscription) {
                if ($subscription['channel'] == $target && $subscription['type'] == 'chat' && $id != $conn->resourceId) {
                    $this->users[$id]->send(json_encode(['type' => 'chat', 'data' => $data->data]));
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
                    $this->users[$id]->send(json_encode(['type' => 'notification', 'data' => $data->data]));
                }
            }
            dump($data);
        }
    }

    private function handleRideChannel(ConnectionInterface $conn, $data)
    {
        // if (isset($this->subscriptions[$conn->resourceId])) {
        //     $target = $this->subscriptions[$conn->resourceId]['channel'];
        //     foreach ($this->subscriptions as $id => $subscription) {
        //         if ($subscription['channel'] == $target && $subscription['type'] == 'ride' && $id != $conn->resourceId) {
        //             $this->users[$id]->send(json_encode(['type' => 'ride', 'data' => $data->data]));
        //         }
        //     }
        //     dump($data);
        // }
        $this->broadcastNewRideToNearestProviders($data->ride_id, $data->data);
    }

    private function broadcastNewRideToNearestProviders($ride_id, $data)
    {
        $request = Request::create('/nearest-providers', 'POST', [
            'ride_id' => $ride_id,
            'latitude' => $data->latitude,
            'longitude' => $data->latitude,
            'kilometers' => 2,
        ]);

        $rideController = app()->make('App\Http\Controllers\Ride\RideController');
        $response = $rideController->getNearestProviders($request);
        dd($response);
        // foreach ($this->clients as $client) {
        //     if (isset($this->subscriptions[$client->resourceId]) &&
        //         $this->subscriptions[$client->resourceId]['channel'] === 'rides') {
        //         $client->send(json_encode(['type' => 'ride', 'data' => $data]));
        //     }
        // }
    }

    // private function handleSendRideRequestsToNearestProviders($ride_id, float $latitude, float $longitude, float $kilometers)
    // {

    //     if ($response->isEmpty()) {
    //         sleep(5);
    //         $newKilometers = $kilometers + 5;
    //         $this->handleSendRideRequestsToNearestProviders($ride_id, $latitude, $longitude, $newKilometers);
    //         return;
    //     }

    //     // Loop through providers and send notifications sequentially
    //     foreach ($response as $provider) {
    //         if ($provider->device_token) {
    //             $providerLang = $provider->customers_lang ? $provider->customers_lang : app()->getLocale();
    //             $message = json_encode([
    //                 'type' => 'ride',
    //                 'ride_id' => $ride_id,
    //                 'message' => __('services::lang.new_ride', [], $providerLang),
    //                 'details' => __('services::lang.youHaveNewOfferOnOrder', [], $providerLang)
    //             ]);

    //             // Send the notification via WebSocket to provider
    //             $this->users[$provider->resourceId]->send($message);
    //         }
    //         sleep(2);
    //     }

    //     // Wait for 5 seconds before checking for accepted rides again
    //     sleep(5);

    //     // Check if the ride has been accepted
    //     if ($this->checkRideAccepted($ride_id)) {
    //         return; // Stop if ride is accepted
    //     }

    //     // Increase the kilometers (for example, you can add 5 km) for the next search
    //     $newKilometers = $kilometers + 5; // Increase the search radius

    //     // Recursively call the method to send notifications again
    //     $this->handleSendRideRequestsToNearestProviders($ride_id, $latitude, $longitude, $newKilometers);
    // }

    // private function handleRidesChannel(ConnectionInterface $conn, $data)
    // {
    //     if (isset($data->message) && $data->message) {
    //         $this->broadcastMessageToRiders($data->message);
    //     }
    // }

}
