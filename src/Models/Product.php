<?php

namespace CartGateway\Models;

use CartGateway\Exceptions\ApiException;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Product extends Model
{
    private $name;
    private $imageUrl;
    private $amount;
    private $codename;
    private $quantity = 1;

    public function __construct(array $options = null)
    {
        // the codename OR the amount must be provided
        if (!isset($options['codename']) && !isset($options['amount'])) {
            throw new ApiException("Please provide the amount or the codename.");
        }

        // amount must be in cents and bigger than 100
        if (isset($options['amount']) && (!is_integer($options['amount']) || $options['amount'] < 100)) {
            throw new ApiException("The minimum amount is 100 cents.");
        }

        // codename can not contain hyphen
        if (isset($options['codename'])) {
            if (strpos($options['codename'], '-') !== false) {
                throw new ApiException("Product codename can not contain a hyphen.");
            }

            $this->codename = $options['codename'];
        }
        if (isset($options['amount'])) {
            $this->amount = $options['amount'];
        }
        if (isset($options['quantity'])) {
            $this->quantity = $options['quantity'];
        }
        if (isset($options['name'])) {
            $this->name = $options['name'];
        }
        if (isset($options['image_url'])) {
            $this->imageUrl = $options['image_url'];
        }


    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->amount,
            'codename' => $this->codename,
            'quantity' => $this->quantity,
            'image_url' => $this->imageUrl,
        ];
    }
}
