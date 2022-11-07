<?php

namespace CartGateway\Responses;

use CartGateway\Responses\Response;
use stdClass;

class ValidateHostedCheckoutResponse extends Response
{
    // the total amount in cents for what the checkout was created for
    public $amount = 0;
    // the url the client will be redirected to view the checkout page
    public $status = ''; // valid | validated

    public $reference = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->status)) {
            $this->status = $response->status;
        }

        if (isset($response->amount)) {
            $this->amount = $response->amount;
        }

        // merchant reference when checkout was created
        if (isset($response->reference)) {
            $this->reference = $response->reference;
        }
    }
}
