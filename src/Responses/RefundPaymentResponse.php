<?php

namespace CartGateway\Responses;

use CartGateway\Responses\Response;
use stdClass;

class RefundPaymentResponse extends Response
{
    // the unique reference id
    public $id = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->id)) {
            $this->id = $response->id;
        }
    }
}
