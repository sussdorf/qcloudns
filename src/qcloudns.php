<?php
declare(strict_types=1);

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

namespace QCloudns;

class Client {
    private string $authId;
    private string $authPassword;
    private string $baseUrl = 'https://api.cloudns.net/dns/';
    private HttpClient $httpClient;

    public function __construct(string $authId, string $authPassword) {
        $this->authId = $authId;
        $this->authPassword = $authPassword;
        $this->httpClient = new HttpClient(['base_uri' => $this->baseUrl]);
    }

    public function request(string $endpoint, array $params = [], string $method = 'GET'): array {
        $params['auth-id'] = $this->authId;
        $params['auth-password'] = $this->authPassword;

        try {
            $options = [
                'query' => $method === 'GET' ? $params : [],
                'form_params' => $method === 'POST' ? $params : [],
            ];

            $response = $this->httpClient->request($method, $endpoint, $options);
            $decodedResponse = json_decode($response->getBody()->getContents(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('JSON decode error: ' . json_last_error_msg());
            }

            return $decodedResponse;
        } catch (GuzzleException $e) {
            throw new \Exception('HTTP request error: ' . $e->getMessage());
        }
    }
}

