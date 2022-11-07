<?php

namespace Tests\Unit\Models;

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\ApiConfig;
use PHPUnit\Framework\TestCase;

class ApiConfigTest extends TestCase
{
    /** @test */
    public function can_set_the_environment()
    {
        $model = new ApiConfig([
            'account_id' => 1234,
            'access_token' => 'access-token',
            'environment' => 'sandbox'
        ]);
        $this->assertEquals('sandbox', $model->getEnvironment());
    }

    /** @test */
    public function can_set_the_access_token()
    {
        $model = new ApiConfig([
            'account_id' => 1234,
            'access_token' => 'access-token',
        ]);
        $this->assertEquals('access-token', $model->getAccessToken());
    }

    /** @test */
    public function can_not_set_the_api_url()
    {
        $model = new ApiConfig([
            'account_id' => 1234,
            'access_token' => 'access-token',
            'base_url' => 'http://example.com'
        ]);
        $this->assertEquals(Config::API_URL, $model->getBaseUrl());
    }

    /** @test */
    public function can_set_account_id()
    {
        $model = new ApiConfig([
            'account_id' => 1234,
            'access_token' => 'access-token',
        ]);
        $this->assertEquals(1234, $model->getAccountId());
    }

    /** @test */
    public function validate_account_id_is_required()
    {
        try {
            $model = new ApiConfig();
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new ApiConfig(['account_id' => 1234]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new ApiConfig(['access_token' => 'access-token']);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));
    }
}
