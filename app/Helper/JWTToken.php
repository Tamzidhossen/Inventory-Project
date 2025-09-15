<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {
    public static function CreateToken($userEmail):string {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',   // Issuer of the token
            'iat' => time(),            // Time when JWT was issued.
            'exp' => time() + 60*60,    // Expiration time (1 Hour from now)
            'userEmail' => $userEmail   // Subject of the token (user's email)
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateTokenForSetFassword($userEmail):string {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',   // Issuer of the token
            'iat' => time(),            // Time when JWT was issued.
            'exp' => time() + 60*2,    // Expiration time (2 min from now)
            'userEmail' => $userEmail   // Subject of the token (user's email)
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($token): string {
        try {
            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode->userEmail;

        } catch (Exception $e) {
            return 'unauthorized';
        }
    }
}