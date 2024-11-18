<?php

namespace App\Base\WebSocket;

use App\Base\Traits\Request\SendRequest;
use App\Base\WebSocket\Interfaces\IAuthService;
use App\Base\WebSocket\Interfaces\IEventFactory;
use App\Base\WebSocket\Interfaces\IRequestValidationFactory;
use App\Base\WebSocket\Managers\Interfaces\IConnectionManager;
use App\Base\WebSocket\Managers\Interfaces\IDriverManager;
use App\Base\WebSocket\Managers\Interfaces\IRideManager;
use App\Base\WebSocket\Managers\Interfaces\ISubscriptionManager;
use App\Base\WebSocket\Managers\Interfaces\IUserManager;
use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WebSocketServiceManager implements MessageComponentInterface
{
    use SendRequest;

    private $authService;
    private $eventFactory;
    private $requestValidationFactory;
    private IConnectionManager $connectionManager;
    private ISubscriptionManager $subscriptionManager;
    private IUserManager $userManager;

    public function __construct(
        IAuthService $authService,
        IEventFactory $eventFactory,
        IRequestValidationFactory $requestValidationFactory,
        IConnectionManager $connectionManager,
        ISubscriptionManager $subscriptionManager,
        IUserManager $userManager,
    ) {
        $this->authService = $authService;
        $this->eventFactory = $eventFactory;
        $this->requestValidationFactory = $requestValidationFactory;
        $this->connectionManager = $connectionManager;
        $this->subscriptionManager = $subscriptionManager;
        $this->userManager = $userManager;
        echo "Server Started \r\n";
    }

    public function onOpen(ConnectionInterface $conn)
    {
        if (!$this->connectionManager->validateConnection($conn, $this->authService)) {
            return;
        }

        $this->connectionManager->attach($conn);
        echo "user " . $conn->resourceId . " connected \r\n";
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->connectionManager->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected \r\n";
        $this->userManager->cleanup($conn);
        $this->subscriptionManager->cleanup($conn);
    }

    public function onMessage(ConnectionInterface $conn, $message)
    {
        $data = json_decode($message);

        if (!isset($data->event)) {
            $conn->send(json_encode(['error' => "Event not recognized"]));
            return;
        }
        
        $validation = $this->requestValidationFactory->getEventRequestValidation($data->event)->validate($data);
        if(!empty($validation)){
            $conn->send(json_encode(['error' => $validation]));
            return;
        }

        $event = $this->eventFactory->getEvent($data->event);
        if ($event) {
            $event->execute($conn, $data);
        } else {
            $conn->send(json_encode(['error' => "Invalid Event"]));
        }
    }

    public function onError(ConnectionInterface $conn, Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \r\n";
        $conn->close();
    } 

    public function getSubscriptionManager(): ISubscriptionManager
    {
        return $this->subscriptionManager;
    }

    public function getUserManager(): IUserManager
    {
        return $this->userManager;
    }
}
