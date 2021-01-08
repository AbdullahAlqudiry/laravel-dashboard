<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Spatie\Crypto\Rsa\PrivateKey;

class WebServiceService
{
    public $privateKey;
    public $xAuth;
    public $apiBaseUrl = 'https://development.test';

    public function __construct($apiToken)
    {
        try {
            $this->privateKey = PrivateKey::fromFile(storage_path(config('system.web-service.private_key')));
            $this->xAuth = base64_encode($this->privateKey->encrypt($apiToken));
        } catch (\Throwable $e) {
        }
    }

    public function httpPost($url, $body = [])
    {
        try {
            return Http::withOptions([
                'verify' => false
            ])->withHeaders([
                'X-Auth' => $this->xAuth,
                'Accept' => 'application/json',
            ])->post($url, $body);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function httpResponse($response)
    {
        $status = $response === null ? 0 : $response->status();
        $response = $response === null ? 0 : $response->json();

        return (object) [
            'status' => $status,
            'response' => (object) $response
        ];
    }

    public function encryptData($data)
    {
        try {
            return base64_encode($this->privateKey->encrypt($data));
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function sendMessage($to, $message)
    {
        $to = !is_array($to) ? [$to] : $to;

        $response = $this->httpPost($this->apiBaseUrl . '/web-services/gateway/sms', [
            'to' => $to,
            'message' => $message
        ]);

        return $this->httpResponse($response);
    }
}
