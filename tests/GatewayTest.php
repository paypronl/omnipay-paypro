<?php

namespace Omnipay\PayPro;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    /** @var  Gateway */
    protected $gateway;

    /** @var  array */
    protected $options;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->initialize(array(
            'apiKey' => 'YOUR API KEY',
        ));

        $this->options = array(
          'amount' => 12.34,
          'description' => 'Payment test',
          'return_url' => 'omnipay-paypro.fcs/return.php',
        );
    }

    public function testPurchase()
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

    public function testFetchIssuers()
    {
        //$this->setMockHttpResponse('FetchIssuersSuccess.txt');

        /** @var Message\FetchIssuersResponse $response */
        $response = $this->gateway->fetchIssuers($this->options)->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPaymentMethods()
    {
        //$this->setMockHttpResponse('FetchIssuersSuccess.txt');

        /** @var Message\FetchPaymentMethodsResponse $response */
        $response = $this->gateway->fetchPaymentMethods($this->options)->send();

        $this->assertTrue($response->isSuccessful());
    }
}
