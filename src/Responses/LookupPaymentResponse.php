<?php

namespace CartGateway\Responses;

use CartGateway\Responses\Response;
use stdClass;

class LookupPaymentResponse extends Response
{
    // the unique reference id
    public $id = '';
    public $data = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->id)) {
            $this->id = $response->id;
        }
        if (isset($response->data)) {
            $this->data = $response->data;
        }
    }
}
