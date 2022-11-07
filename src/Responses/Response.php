<?php

namespace CartGateway\Responses;

use stdClass;

class Response
{
    public $success = 0;
    public $error = null;
    public $message = '';

    public function __construct(stdClass $response = null)
    {
        if (isset($response->success)) {
            $this->success = $response->success;
        }

        if (isset($response->error)) {
            $this->error = $response->error;
        }

        if (isset($response->message)) {
            $this->message = $response->message;
        }
    }
}
