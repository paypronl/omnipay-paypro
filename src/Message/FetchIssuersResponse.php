<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\Issuer;
use Omnipay\Common\Message\FetchIssuersResponseInterface;

class FetchIssuersResponse extends AbstractResponse implements FetchIssuersResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return isset($this->data['return']) && is_array($this->data['return']) && isset($this->data['return']['data']);
    }

    /**
     * {@inheritdoc}
     */
    public function getIssuers()
    {
        if ( ! $this->isSuccessful()) {
            return array();
        }

        $issuers = array();
        foreach ($this->data['return']['data'] as $methodId => $method) {
            foreach ($method['methods'] as $issuer) {
                $issuers[] = new Issuer($issuer['id'], $issuer['name'], $methodId);
            }
        }

        return $issuers;
    }
}
