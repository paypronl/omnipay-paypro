<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class CompletePurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    private $request;

    /** @var  HttpRequest */
    private $httpRequest;

    public function setUp()
    {
        parent::setUp();

        $post = array('amount' => '1234', 'type' => 'Verkoop');
        $server = array('REMOTE_ADDR' => '178.22.62.12');
        $this->httpRequest = new HttpRequest(array(), $post, array(), array(), array(), $server);

        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $this->httpRequest);
        $this->request->initialize(
            array(
              'apiKey' => 'YOUR API KEY',
              'amount' => 12.34,
              'description' => 'Payment test',
              'returnUrl' => 'omnipay-paypro.fcs/return.php',
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame(1234,  $this->request->getAmountInteger());
        $this->assertSame(1234, $data['amount']);
    }

    public function testSendData()
    {
        $response = $this->request->send();

        $this->assertInstanceOf('\Omnipay\PayPro\Message\CompletePurchaseResponse', $response);
        $this->assertTrue($response->isSuccessful());
    }

    public function testSendDataFail()
    {
        $this->httpRequest->request->set('type', 'Termijn');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Amount doesn't match original amount
     */
    public function testSendDataInvalidAmount()
    {
        $this->httpRequest->request->set('amount', '999');

        $this->request->send();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid remote IP
     */
    public function testSendDataInvalidIp()
    {
        $this->httpRequest->server->set('REMOTE_ADDR', '127.0.0.1');

        $this->request->send();
    }

}
