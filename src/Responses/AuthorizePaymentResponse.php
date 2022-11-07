<?php

namespace CartGateway\Responses;

use CartGateway\Responses\Response;
use stdClass;

class AuthorizePaymentResponse extends Response
{
    // the unique reference id
    public $id = '';
    public $cvv_code;
    public $cvv_message;
    public $avs_code;
    public $avs_message;

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->id)) {
            $this->id = $response->id;
        }

        if (isset($response->cvv_code)) {
            $this->cvv_code = $response->cvv_code;
        }

        if (isset($response->cvv_message)) {
            $this->cvv_message = $response->cvv_message;
        }

        if (isset($response->avs_code)) {
            $this->avs_code = $response->avs_code;
        }

        if (isset($response->avs_message)) {
            $this->avs_message = $response->avs_message;
        }
    }
}
