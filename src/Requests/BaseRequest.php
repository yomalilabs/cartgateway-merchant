<?php

namespace CartGateway\Requests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\Models\ApiConfig;
use CartGateway\Models\Model;
use Psr\Http\Message\ResponseInterface;

class BaseRequest
{
    /**
     * @var ApiConfig
     */
    protected $config;

    /**
     * Constructor that sets the timeout of requests
     */
    public function __construct(ApiConfig $config)
    {
        $this->config = $config;
    }

    /**
     * Post the body to the given url
     *
     * @param string $url
     * @param Model $body
     */
    protected function post(string $url, Model $body)
    {
        $client = new Client(['verify' => Config::$SSL_VERIFY]);
        $headers = [
            'user-agent'    => Config::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'CARTGATEWAY-VERSION' => Config::CARTGATEWAY_VERSION,
            'CARTGATEWAY-ACCOUNT-ID' => $this->config->getAccountId(),
            'CARTGATEWAY-ENVIRONMENT' => $this->config->getEnvironment(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];

        if (Config::IS_DEBUG) {
            echo "\r\n" . "URL: {$url}" . "\r\n";
            print_r($headers);
            print_r($body->toArray());
        }

        try {
            $response = $client->post($url, [
                'json' => $body->toArray(),
                'headers' => $headers
            ]);
        } catch (ClientException $e) {
            if (Config::IS_DEBUG) {
                echo "\r\n" . "\r\n";
                echo "RESPONSE" . "\r\n";
                var_dump("Status Code: " . $e->getCode());
                echo "\r\n";
                var_dump((string) $e->getResponse()->getBody());
                echo "\r\n--------------" . "\r\n";
            }

            // handle and format the exception and return the error message
            if ($e->hasResponse() && $e->getResponse()->getBody()) {
                $data = json_decode((string) $e->getResponse()->getBody());
                if ($data && isset($data->error)) {
                    throw new ApiException($data->error, $e->getCode());
                }
            }

            throw new ApiException($e->getMessage(), $e->getCode());
        }

        if (Config::IS_DEBUG) {
            echo "\r\n" . "\r\n";
            echo "RESPONSE" . "\n";
            echo "Status Code: " . $response->getStatusCode();
            echo "\n";
            var_dump((string) $response->getBody());
            echo "\n--------------" . "\r";
        }
        if ($this->isValidResponse($response)) {
            return $this->formatResponse($response);
        }

        throw new ApiException("401 - Unauthorized", $response->getStatusCode());
    }

    /**
     * Is the response valid?
     */
    protected function isValidResponse(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }

    /**
     * Format the response
     *
     * @param ResponseInterface $response
     */
    protected function formatResponse(ResponseInterface $response)
    {
        if ($response->getBody() && (string) $response->getBody()) {
            $data = json_decode((string) $response->getBody());
            if ($data && isset($data->success) && (int) $data->success === 1) {
                return $data;
            }

            // var_dump("ERROR: formatResponse - formatResponse");
            // var_dump((string) $response->getBody());

            if ($data && isset($data->error)) {
                throw new ApiException($data->error, $response->getStatusCode());
            }
        }

        throw new ApiException("400 - Bad Request. The request was unacceptable, often due to missing a required parameter.", $response->getStatusCode());
    }
}
