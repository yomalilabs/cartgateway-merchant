<?php

namespace CartGateway;

/**
 * Default values for the configuration parameters of the client.
 */
class Config
{
    public static $SSL_VERIFY = true;

    public const TIMEOUT = 60;
    public const ADDITIONAL_HEADERS = [];
    public const ENVIRONMENT = 'sandbox';

    public const API_URL = 'https://api.cartgateway.com';    
    public const API_URL_SANDBOX = 'https://api.cartgateway.com';

    public const CARTGATEWAY_VERSION = '2022-11-07';
    public const USER_AGENT = 'CartGateway-PHP/20221107';

    public const IS_DEBUG = false;
    public const TEST_ACCOUNT_ID = 7769;    
    public const TEST_ACCESS_TOKEN = '05bea34479dd7fc488c1ce774400e9a0bfea02b1';                  
}
