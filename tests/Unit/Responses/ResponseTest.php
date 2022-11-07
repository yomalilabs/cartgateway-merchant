<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\Response;
use PHPUnit\Framework\TestCase;
use stdClass;

class ResponseTest extends TestCase
{
    /** @test */
    public function can_set_success()
    {
        $class = new stdClass;
        $class->success = 1;
        $response = new Response($class);

        $this->assertEquals(1, $response->success);
    }

    /** @test */
    public function can_set_error()
    {
        $class = new stdClass;
        $class->error = 'Something went wrong.';
        $response = new Response($class);

        $this->assertEquals('Something went wrong.', $response->error);
    }
}
