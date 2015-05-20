<?php
namespace Omnipay\PayPro\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Purchase Request
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    public function getTransactionReference()
    {
        if (isset($this->data['return']) && isset($this->data['return']['payment_hash'])) {
            return $this->data['return']['payment_hash'];
        }

        return null;
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return isset($this->data['return']) && isset($this->data['return']['payment_url']);
    }

    /**
     * Gets the redirect target url.
     */
    public function getRedirectUrl()
    {
        return $this->data['return']['payment_url'];
    }

    /**
     * Get the required redirect method (either GET or POST).
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     */
    public function getRedirectData()
    {
        return;
    }
}
