<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Tests\TestCase;

class CompletePurchaseResponseTest extends TestCase
{
    public function testConstruct()
    {
        // response should keep the array data
        $response = new CompletePurchaseResponse($this->getMockRequest(), array('example' => 'value', 'foo' => 'bar'));
        $this->assertEquals(array('example' => 'value', 'foo' => 'bar'), $response->getData());
    }

    public function testPurchaseSuccess()
    {
        $data = array(
            'custom' => 'abc12345',
            'type' => 'Verkoop',
            'payment_hash' => 'a209daa963929e278310f',
            'amount' => '1234',
            'product_id' => '12',
            'product_name' => 'Test payment',
        );
        $response = new CompletePurchaseResponse($this->getMockRequest(), $data);

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertEquals('a209daa963929e278310f', $response->getTransactionReference());
        $this->assertEquals('Verkoop', $response->getType());
        $this->assertEquals('Verkoop', $response->getCode());
        $this->assertEquals(12.34, $response->getAmount());
        $this->assertEquals('abc12345', $response->getTransactionId());
        $this->assertEquals(12, $response->getProductId());
        $this->assertEquals('Test payment', $response->getDescription());
        $this->assertEquals('Test payment', $response->getProductName());
        $this->assertNull($response->getMessage());
    }
}
