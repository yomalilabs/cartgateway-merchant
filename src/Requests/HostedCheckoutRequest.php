<?php

namespace CartGateway\Requests;

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\Models\HostedCheckout;
use CartGateway\Responses\HostedCheckoutResponse;

class HostedCheckoutRequest extends BaseRequest
{
    /**
     * Create a hosted checkout session
     *
     * @param HostedCheckout $body
     */
    public function create(HostedCheckout $body): HostedCheckoutResponse
    {
        $url = $this->config->getBaseUrl() . '/hosted/checkout/create';

        $response = $this->post($url, $body);

        return new HostedCheckoutResponse($response);
    }
}
