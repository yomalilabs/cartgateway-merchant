<?php

namespace CartGateway\Requests;

use CartGateway\Models\HostedCheckout;
use CartGateway\Models\ValidateHostedCheckout;
use CartGateway\Responses\ValidateHostedCheckoutResponse;

class ValidateHostedCheckoutRequest extends BaseRequest
{
    /**
     * Create a hosted checkout session
     *
     * @param HostedCheckout $body
     */
    public function validate(ValidateHostedCheckout $body): ValidateHostedCheckoutResponse
    {
        $url = $this->config->getBaseUrl() . '/hosted/checkout/validate';


        $response = $this->post($url, $body);

        return new ValidateHostedCheckoutResponse($response);
    }
}
