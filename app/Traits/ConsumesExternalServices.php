<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

trait ConsumesExternalServices
{
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $isJsonRequest = false)
    {
        $client = new Client();

        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formParams, $headers);
        }

        try {
            $response = $client->request($method, $requestUrl, [
                $isJsonRequest ? 'json' : 'form_params' => $formParams,
                'headers' => $headers,
                'query' => $queryParams,
            ]);

            $response = $response->getBody()->getContents();

            if (method_exists($this, 'decodeResponse')) {
                $response = $this->decodeResponse($response);
            }

            return $response;
        } catch (GuzzleException $e) {
            // Handle Guzzle HTTP request exceptions here
            // You can log the error or throw a custom exception if needed
            throw new Exception('HTTP Request Failed: ' . $e->getMessage());
        }
    }
}
