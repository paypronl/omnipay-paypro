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
        $this->setMockHttpResponse('FetchPaymentMethodsSuccess.txt');

        /** @var FetchIssuersResponse $response */
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());

        $issuers = $response->getIssuers();
        $this->assertEquals(21, count($issuers));

        /** @var \Omnipay\Common\Issuer $issuer */
        $issuer = $issuers[0];
        $this->assertInstanceOf('\Omnipay\Common\Issuer', $issuer);
        $this->assertEquals('sofort/digital', $issuer->getId());
        $this->assertEquals('Sofort', $issuer->getName());
        $this->assertEquals('sofort', $issuer->getPaymentMethod());
    }
}
