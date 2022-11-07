<?php

namespace CartGateway\Models;

class ChargePayment extends Model
{
    private $firstname;
    private $lastname;
    private $email;
    private $address;
    private $zip;

    private $amount;
    private $card_number;
    private $card_cvv;
    private $card_expiry_month;
    private $card_expiry_year;

    private $order_id;

    // optional
    private $phone;
    private $city;
    private $state;
    private $country;

    private $source;

    private $threeds_cavv;					
    private $threeds_validated;		 	
    private $threeds_transaction_id;		
    private $threeds_server_transaction_id;
    private $threeds_version;				
    private $threeds_parres_status;		

    public function __construct(array $attributes = null)
    {
        $this->validateExists($attributes, [
            'amount',
            'firstname',
            'lastname',
            'email',
            'address',
            'zip',
            'amount',
            'card_number',
            'card_cvv',
            'card_expiry_month',
            'card_expiry_year',
            'order_id',
        ]);

        $this->firstname = $attributes['firstname'];
        $this->lastname = $attributes['lastname'];
        $this->email = $attributes['email'];
        $this->address = $attributes['address'];
        $this->zip = $attributes['zip'];

        $this->amount = $attributes['amount'];
        $this->card_number = $attributes['card_number'];
        $this->card_cvv = $attributes['card_cvv'];
        $this->card_expiry_month = $attributes['card_expiry_month'];
        $this->card_expiry_year = $attributes['card_expiry_year'];

        $this->order_id = $attributes['order_id'];

        if (isset($attributes['phone'])) {
            $this->phone = $attributes['phone'];
        }
        if (isset($attributes['city'])) {
            $this->city = $attributes['city'];
        }
        if (isset($attributes['state'])) {
            $this->state = $attributes['state'];
        }
        if (isset($attributes['country'])) {
            $this->country = $attributes['country'];
        }
        if (isset($attributes['source']))
        {
            $this->source = $attributes['source'];
        }
    		
		// Set the 3DS data
        if (isset($attributes['threeds_cavv']))
		{
            $this->threeds_cavv	= $attributes['threeds_cavv'];
        }

        if (isset($attributes['threeds_validated']))
		{
            $this->threeds_validated = $attributes['threeds_validated'];
        }

        if (isset($attributes['threeds_transaction_id']))
		{
            $this->threeds_transaction_id = $attributes['threeds_transaction_id'];
        }

        if (isset($attributes['threeds_server_transaction_id']))
		{
            $this->threeds_server_transaction_id = $attributes['threeds_server_transaction_id'];
        }

        if (isset($attributes['threeds_version']))
		{
            $this->threeds_version = $attributes['threeds_version'];
        }

        if (isset($attributes['threeds_parres_status']))
        {
		    $this->threeds_parres_status = $attributes['threeds_parres_status'];    
        }
    }

    public function toArray(): array
    {
        return [
            'is_sale' => true, // to authorize and capture
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'address' => $this->address,
            'zip' => $this->zip,

            'amount' => $this->amount,
            'card_number' => $this->card_number,
            'card_cvv' => $this->card_cvv,
            'card_expiry_month' => $this->card_expiry_month,
            'card_expiry_year' => $this->card_expiry_year,

            'order_id' => $this->order_id,

            // optional
            'phone' => $this->phone,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,

            'source' => $this->source,
			
			'threeds_cavv' => $this->threeds_cavv,
			'threeds_validated' => $this->threeds_validated,
			'threeds_transaction_id' => $this->threeds_transaction_id,
			'threeds_server_transaction_id' => $this->threeds_server_transaction_id,
			'threeds_version' => $this->threeds_version,
			'threeds_parres_status' => $this->threeds_parres_status,			
        ];
    }
}
