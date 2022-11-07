<?php

namespace Tests\Unit\Models;

use CartGateway\Exceptions\ApiException;
use CartGateway\Models\CaptureAuthorizedPayment;
use PHPUnit\Framework\TestCase;

class CaptureAuthorizedPaymentTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'amount' => 1025,
            'authorized_payment_id' => 'abcd1234',
        ], $overrides);
    }

    /** @test */
    public function initialize_model()
    {
        $model = new CaptureAuthorizedPayment($this->validParams());

        $productArray = $model->toArray();
        $this->assertEquals(1025, $productArray['amount']);
        $this->assertEquals('abcd1234', $productArray['authorized_payment_id']);
    }

    /** @test */
    public function validate_amount()
    {
        // no amount passed
        try {
            $params = $this->validParams();
            unset($params['amount']);
            $model = new CaptureAuthorizedPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));

        // minimum amount
        try {
            $params = $this->validParams(['amount' => 10]);
            $model = new CaptureAuthorizedPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_authorized_payment_id()
    {
        try {
            $params = $this->validParams();
            unset($params['authorized_payment_id']);
            $model = new CaptureAuthorizedPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }
}
