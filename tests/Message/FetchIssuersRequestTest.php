<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Tests\TestCase;

class FetchIssuersRequestTest extends TestCase
{
    /**
     * @var FetchIssuersRequest
     */
    private $request;

    protected function setUp()
    {
        $this->request = new FetchIssuersRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        // No actual response yet
        //$this->setMockHttpResponse('FetchIssuersSuccess.txt');

        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());

        $issuers = $response->getIssuers();
        $this->assertEquals(9, count($issuers));

        /** @var \Omnipay\Common\Issuer $issuer */
        $issuer = $issuers[0];
        $this->assertInstanceOf('\Omnipay\Common\Issuer', $issuer);
        $this->assertEquals('0021', $issuer->getId());
        $this->assertEquals('Rabobank', $issuer->getName());
    }
}
