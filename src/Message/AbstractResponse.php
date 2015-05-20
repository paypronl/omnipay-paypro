<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Response
 */
abstract class AbstractResponse extends BaseAbstractResponse
{
    public function __construct(RequestInterface $request, array $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }
}
