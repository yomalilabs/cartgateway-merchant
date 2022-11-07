<?php

namespace Tests\Unit;

use CartGateway\Config;
use CartGateway\CartGateway;
use PHPUnit\Framework\TestCase;

class CartGatewayTest extends TestCase
{
    /** @test */
    public function can_get_config()
    {
        $client = new CartGateway([
            'account_id' => 1234,

            
            'access_token' => 'access-token',
        ]);
        $this->assertNotNull($client->getConfig());
    }

    /** @test */
    public function can_set_config_options()
    {
        $config = new CartGateway([
            'account_id' => 1234,
            'access_token' => 'access-token',
            'environment' => 'sandbox',
        ]);

        $this->assertEquals('sandbox', $config->getConfig()->getEnvironment());
    }
}
