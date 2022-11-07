<?php

namespace CartGateway\Models;

class VoidPayment extends Model
{
    private $payment_id;

    public function __construct(array $attributes = null)
    {
        $this->validateExists($attributes, [
            'payment_id',
        ]);

        $this->payment_id = $attributes['payment_id'];
    }

    public function toArray(): array
    {
        return [
            'payment_id' => $this->payment_id,
        ];
    }
}
