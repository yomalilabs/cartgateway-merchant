<?php

namespace CartGateway\Models;

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;

/**
 * Default values for the configuration parameters of the client.
 */
class ApiConfig
{
    private $accountId;
    private $accessToken;

    private $baseUrl = Config::API_URL;
    private $timeout = Config::TIMEOUT;
    private $CartGatewayVersion = Config::CARTGATEWAY_VERSION;
    private $additionalHeaders = Config::ADDITIONAL_HEADERS;
    private $environment = Config::ENVIRONMENT;
    private $userAgent = Config::USER_AGENT;

    public function __construct(array $configOptions = null)
    {
        // validation
        if (!isset($configOptions['account_id'])) {
            throw new ApiException("Please provide the account_id attribute.");
        }
        if (!isset($configOptions['access_token'])) {
            throw new ApiException("Please provide the access_token attribute.");
        }

        if (isset($configOptions['account_id'])) {
            $this->accountId = $configOptions['account_id'];
        }
        if (isset($configOptions['access_token'])) {
            $this->accessToken = $configOptions['access_token'];
        }
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }

        // when sandbox - append _sandbox to the gateway username
        if (isset($configOptions['environment']) && $configOptions['environment'] === 'sandbox') {
            $this->baseUrl = Config::API_URL_SANDBOX;
            $this->environment = 'sandbox';
        }
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
}
