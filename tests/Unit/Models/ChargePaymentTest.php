<?php

namespace Tests\Unit\Models;

use CartGateway\Exceptions\ApiException;
use CartGateway\Models\ChargePayment;
use CartGateway\Models\HostedCheckout;
use CartGateway\Models\Product;
use Tests\TestCase;

class ChargePaymentTest extends TestCase
{
    /** @test */
    public function initialize_model()
    {
        $model = new ChargePayment($this->validParamsForAuthOrChargeModel());

        $productArray = $model->toArray();
        $this->assertEquals('Test', $productArray['firstname']);
        $this->assertEquals('User', $productArray['lastname']);
        $this->assertEquals('user3@example.com', $productArray['email']);
        $this->assertEquals('6 Pheasant Run', $productArray['address']);
        $this->assertEquals('07733', $productArray['zip']);
        $this->assertEquals(2000, $productArray['amount']);
        $this->assertEquals(6011111111111117, $productArray['card_number']);
        $this->assertEquals(123, $productArray['card_cvv']);
        $this->assertEquals(10, $productArray['card_expiry_month']);
        $this->assertEquals(2025, $productArray['card_expiry_year']);
    }

    /** @test */
    public function initialize_model_with_optional_params()
    {
        $model = new ChargePayment($this->validParamsForAuthOrChargeModel([
            'phone' => 123456789,
            'city' => 'Holmdel',
            'state' => 'NJ',
            'country' => 'United States',
        ]));

        $productArray = $model->toArray();
        $this->assertEquals(123456789, $productArray['phone']);
        $this->assertEquals('Holmdel', $productArray['city']);
        $this->assertEquals('NJ', $productArray['state']);
        $this->assertEquals('United States', $productArray['country']);
    }

    /** @test */
    public function validate_amount()
    {
        // no amount passed
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['amount']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));

        // minimum amount
        try {
            $params = $this->validParamsForAuthOrChargeModel(['amount' => 10]);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_firstname()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['firstname']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_lastname()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['lastname']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_email()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['email']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_address()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['address']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_zip()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['zip']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_number()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['card_number']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_cvv()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['card_cvv']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_expiry_month()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['card_expiry_month']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_expiry_year()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['card_expiry_year']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_order_id()
    {
        try {
            $params = $this->validParamsForAuthOrChargeModel();
            unset($params['order_id']);
            $model = new ChargePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }
}
