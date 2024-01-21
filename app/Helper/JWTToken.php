<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function CreateToken ($userEmail, $userID): string
    {
        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'login-token',
            'iat' => time(),
            'exp' => time()+(60*60),
            'userEmail' => $userEmail,
            'userID' => $userID
        ];

        return JWT::encode($payload,$key,"HS256");

    }

    public static function CreateOTPToken ($userEmail): string{

        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'otp-token',
            'iat' => time(),
            'exp' => time()+(60*20),
            'userEmail' => $userEmail,
            'userID' => '0'
        ];

        return JWT::encode($payload, $key, "HS256");

    }

    public static function VerifyToken ($token):string|object
    {
        try
        {
            if ($token == null)
            {
                return 'unauthorized';
            }
            else
            {

            $key = env('JWT_KEY');
            return JWT::decode($token, new Key($key,'HS256'));

            }
        }
        catch (Exception)
        {
            return 'unauthorized';
        }

    }
}
