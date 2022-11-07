<?php

namespace CartGateway\Exceptions;

use Exception;

/**
 * Thrown when there is a network error or HTTP response status code that is not okay.
 */
class ApiException extends Exception
{
    public $error;
    public $message;
    public $statusCode;

    public function __construct(string $message = '', $statusCode = 200)
    {
        $this->error = $message;
        $this->message = $message;
        $this->statusCode = $statusCode;
    }
}
