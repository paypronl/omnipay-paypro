<?php

namespace Omnipay\PayPro;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->options = array(
          'amount' => 1234,
          'description' => 'Payment test',
          'return_url' => 'omnipay-paypro.fcs/return.php',
        );
    }

    public function testPurcahse()
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');

        /** @var Message\PurchaseResponse $response */
        $response = $this->gateway->purchase($this->options)->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertEquals('4d17eb61649e82d226f69603de8ad', $response->getTransactionReference());
        $this->assertEquals('https://www.paypro.nl/betalen/4d17eb61649e82d226f69603de8ad', $response->getRedirectUrl());
        $this->assertNull($response->getMessage());
    }
}
