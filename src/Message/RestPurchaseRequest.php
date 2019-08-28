<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseRequest
 */
class RestPurchaseRequest extends AbstractRequest
{
    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $data = [
            'merchantId' => $this->getMerchantId(),
            'returnUrl' => $this->getReturnUrl(),
            'amount' => 100,
            'description' => $this->getDescription()
        ];
        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new RestPurchaseResponse($this, $data);
    }
}
