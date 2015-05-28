<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Tests\TestCase;

class FetchPaymentMethodsResponseTest extends TestCase
{
    public function testConstruct()
    {
        // response should keep the array data
        $response = new FetchPaymentMethodsResponse($this->getMockRequest(), array('example' => 'value', 'foo' => 'bar'));
        $this->assertEquals(array('example' => 'value', 'foo' => 'bar'), $response->getData());
    }

    public function testPurchaseSuccess()
    {
        $data = array(
            'foo' => array(
                'methods' => array(),
                'description' => 'Bar',
            )
        );
        $response = new FetchPaymentMethodsResponse($this->getMockRequest(), array('return' => array('data' => $data)));

        $this->assertTrue($response->isSuccessful());

        $methods = $response->getPaymentMethods();
        $this->assertEquals(1, count($methods));

        /** @var \Omnipay\Common\PaymentMethod $method */
        $method = $methods[0];
        $this->assertInstanceOf('\Omnipay\Common\PaymentMethod', $method);
        $this->assertEquals('foo', $method->getId());
        $this->assertEquals('Bar', $method->getName());
    }

    public function testPurchaseFail()
    {
        $response = new FetchPaymentMethodsResponse($this->getMockRequest(), array('return' => 'Error message'));

        $this->assertFalse($response->isSuccessful());

        $methods = $response->getPaymentMethods();
        $this->assertEquals(0, count($methods));
    }
}
