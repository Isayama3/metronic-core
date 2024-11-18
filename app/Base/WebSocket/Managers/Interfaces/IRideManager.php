<?php
namespace App\Base\WebSocket\Managers\Interfaces;

use Ratchet\ConnectionInterface;

interface IRideManager
{
    public function getRide();
    public function setRide(int $ride_id);
    public function getRideRequests(): array;
    public function setRideRequest(
        int $customer_database_id,
        int $customer_socket_id,
        float $pickup_latitude,
        float $pickup_longitude,
        string $pickup_address,
        float $destination_latitude,
        float $destination_longitude,
        string $destination_address,
        float $kilometers,
        float $ride_expected_time
    ): void;
    public function getRideRequestsDrivers(int $customer_id): array;
    public function setRideRequestsDriver(int $customer_id, int $driver_id): void;
    public function cleanupRide(ConnectionInterface $conn): void;
    public function cleanupRideRequest(ConnectionInterface $conn): void;
}
