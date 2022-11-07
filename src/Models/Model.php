<?php

namespace CartGateway\Models;

use CartGateway\Exceptions\ApiException;

class Model
{
    public function toArray(): array
    {
        return [];
    }

    public function validateExists(array $attributes, array $keys)
    {
        foreach ($keys as $key) {
            if (!isset($attributes[$key])) {
                throw new ApiException("Please provide the {$key} attribute.");
            }

            if ($key === 'amount') {
                // amount must be in cents and bigger than 100
                if (!isset($attributes['amount']) || (!is_integer($attributes['amount']) || $attributes['amount'] < 100)) {
                    throw new ApiException("The minimum amount is 100 cents.");
                }
            }
        }
    }
}
