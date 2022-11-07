<?php

namespace CartGateway\Responses;

use CartGateway\Responses\Response;
use stdClass;

class CaptureAuthorizedPaymentResponse extends Response
{
    // the unique reference id
    public $id = '';
    public $authorized_payment_id = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->id)) {
            $this->id = $response->id;
        }
        if (isset($response->authorized_payment_id)) {
            $this->authorized_payment_id = $response->authorized_payment_id;
        }
    }
}
