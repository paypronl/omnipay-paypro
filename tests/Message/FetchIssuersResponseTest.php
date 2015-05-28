<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Tests\TestCase;

class FetchIssuersResponseTest extends TestCase
{
    public function testConstruct()
    {
        // response should keep the array data
        $response = new FetchIssuersResponse($this->getMockRequest(), array('example' => 'value', 'foo' => 'bar'));
        $this->assertEquals(array('example' => 'value', 'foo' => 'bar'), $response->getData());
    }

    public function testPurchaseSuccess()
    {
        $data = array(
            'foo' => array(
                'methods' => array(
                    array(
                      'order' => 1,
                      'name' => 'Foo Bar',
                      'id' => 'foo/bar',
                    ),
                ),
                'description' => 'Bar',
            )
        );
        $response = new FetchIssuersResponse($this->getMockRequest(), array('return' => array('data' => $data)));

        $this->assertTrue($response->isSuccessful());

        $issuers = $response->getIssuers();
        $this->assertEquals(1, count($issuers));

        /** @var \Omnipay\Common\Issuer $issuer */
        $issuer = $issuers[0];
        $this->assertInstanceOf('\Omnipay\Common\Issuer', $issuer);
        $this->assertEquals('foo/bar', $issuer->getId());
        $this->assertEquals('Foo Bar', $issuer->getName());
        $this->assertEquals('foo', $issuer->getPaymentMethod());
    }

    public function testPurchaseFail()
    {
        $response = new FetchIssuersResponse($this->getMockRequest(), array('return' => 'Error message'));

        $this->assertFalse($response->isSuccessful());

        $methods = $response->getIssuers();
        $this->assertEquals(0, count($methods));
    }
}
