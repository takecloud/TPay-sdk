<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 15:14
 */

namespace TPay\PreCreate;


use TPay\BaseParams;

/**
 * @property $pay_type
 * @property $out_trade_no
 * @property $total_amount
 * @property $subject
 * @property $body
 * @property $notify_url
 * Class PreCreateParams
 * @package TPay\PreCreate
 */
class PreCreateParams extends BaseParams
{
    protected $mandatoryFields = [
        'pay_type', 'out_trade_no', 'total_amount', 'subject', 'body'
    ];

    /**
     * @return mixed
     */
    public function getPayType()
    {
        return $this->data['pay_type'];
    }

    /**
     * @param mixed $pay_type
     */
    public function setPayType($pay_type): void
    {
        $this->data['pay_type'] = $pay_type;
    }

    /**
     * @return mixed
     */
    public function getOutTradeNo()
    {
        return $this->data['out_trade_no'];
    }

    /**
     * @param mixed $out_trade_no
     */
    public function setOutTradeNo($out_trade_no): void
    {
        $this->data['out_trade_no'] = $out_trade_no;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->data['total_amount'];
    }

    /**
     * @param mixed $total_amount
     */
    public function setTotalAmount($total_amount): void
    {
        $this->data['total_amount'] = $total_amount;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->data['subject'];
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->data['subject'] = $subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->data['body'];
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->data['body'] = $body;
    }

    /**
     * @return mixed
     */
    public function getNotifyUrl()
    {
        return $this->data['notify_url'];
    }

    /**
     * @param mixed $notify_url
     */
    public function setNotifyUrl($notify_url): void
    {
        $this->data['notify_url'] = $notify_url;
    }

}