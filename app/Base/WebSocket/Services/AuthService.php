<?php

namespace App\Base\WebSocket\Services;

use App\Base\WebSocket\Interfaces\IAuthService;
use Laravel\Passport\TokenRepository;

class AuthService implements IAuthService
{
    private $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function checkApiKey(string $apiKey): bool
    {
        return $apiKey === env('WEBSOCKET_API_KEY');
    }

    public function authenticateUser(string $auth_token, string $user_type): ?array
    {
        $db_token_id = $this->extractTokenId($auth_token);
        if (!$db_token_id) {
            return null;
        }

        $token = $this->tokenRepository->find($db_token_id);
        if ($token && !$token->revoked) {
            return $this->getUserDetails($token, $user_type);
        }

        return null;
    }

    public function extractTokenId(string $accessToken): ?string
    {
        $tokenParts = explode('.', explode(' ', $accessToken)[0]);
        if (count($tokenParts) < 2) {
            return null; // This is valid; returning null.
        }

        $tokenHeader = base64_decode($tokenParts[1]);
        $tokenHeaderArray = json_decode($tokenHeader, true);

        return $tokenHeaderArray['jti'] ?? null; // Also valid; returns string or null.
    }

    public function getUserDetails(object $token, string $user_type) : ?array
    {
        // Custom authentication logic here
        if ($token->client_id == 2 && $user_type == 'customer') {
            return [
                'user_type' => 'customer',
                'user_id' => $token->user_id,
            ];
        }

        if ($token->client_id == 1 && $user_type == 'provider') {
            return [
                'user_type' => 'provider',
                'user_id' => $token->user_id,
            ];
        }

        return null;
    }
}
