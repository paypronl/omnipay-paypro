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
            'custom' => 'f597b4a913dfa8fc355431102a605',
            'type' => 'Verkoop',
            'trackcode' => 'https://www.paypro.nl/betalen/a209daa96392c1e87f65789e278310f',
            'amount' => '1234',
            'product_id' => '12',
            'product_name' => 'Test payment'
        );
        $response = new CompletePurchaseResponse($this->getMockRequest(), $data);

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertEquals('a209daa96392c1e87f65789e278310f', $response->getTransactionReference());
        $this->assertEquals('Verkoop', $response->getType());
        $this->assertEquals('Verkoop', $response->getCode());
        $this->assertEquals(12.34, $response->getAmount());
        $this->assertEquals('f597b4a913dfa8fc355431102a605', $response->getTransactionId());
        $this->assertEquals(12, $response->getProductId());
        $this->assertEquals('Test payment', $response->getDescription());
        $this->assertEquals('Test payment', $response->getProductName());
        $this->assertNull($response->getMessage());
    }
}
