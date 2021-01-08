<?php

namespace App\Helpers;

use Spatie\Crypto\Rsa\PublicKey;

class WebServiceProvider
{
    public $publicKey;

    public function __construct()
    {
        try {
            $this->publicKey = PublicKey::fromFile(storage_path(config('system.web-service.public_key')));
        } catch (\Throwable $e) {
        }
    }

    public function decryptData($data)
    {
        try {
            $decodedData = json_decode($this->publicKey->decrypt(base64_decode($data)));

            if (json_last_error() === JSON_ERROR_NONE) {
                return $decodedData;
            }

            return $this->publicKey->decrypt(base64_decode($data));
        } catch (\Throwable $e) {
            return null;
        }
    }
}
