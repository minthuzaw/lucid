<?php

namespace App\Helpers;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class SMS
{
    private string $driver;

    private \GuzzleHttp\Client $httpClient;

    /**
     * @throws \Exception
     */
    public function __construct($driver = null)
    {
        $this->setDriver($driver);
        $this->httpClient = new \GuzzleHttp\Client();
    }

    /**
     * @throws Exception
     */
    private function setDriver($driver): void
    {
        if ($driver) {
            if (collect(config('sms.drivers'))->contains($driver)) {
                throw new Exception("Driver for sms, $driver is not currently supported.");
            }
            $this->driver = $driver;
        } else {
            $this->driver = config('sms.default');
        }
    }

    /**
     * @throws GuzzleException
     */
    public function sendViaSMSPOH($to, $message, $sender = null)
    {
        $baseUrl = config("sms.drivers.$this->driver.base_url");
        $token = config("sms.drivers.$this->driver.token");
        $sender = config('sms.sender');

        try {
            $response = $this->httpClient
                ->request('POST', "$baseUrl/send", [
                    'headers' => [
                        'Authorization' => "Bearer $token",
                    ],
                    'json' => [
                        'to' => $to,
                        'message' => $message,
                        'sender' => $sender,
                    ],
                ]);

            return json_decode($response->getBody()->read(1024));
        } catch (GuzzleException $exception) {
            if ($exception->getCode() === 401) {
                info('Unauthorized to send SMS via SMSPOH, please check your smspoh token');
            }
            throw $exception;
        }
    }
}
