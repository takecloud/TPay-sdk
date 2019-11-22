<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 15:26
 */

namespace TPay\TradeCreate;


use TPay\BaseParams;

/**
 * @property $pay_type 支付类型
 * @property $out_trade_no 商户订单号
 * @property $total_amount 订单总金额
 * @property $auth_code 条码内容
 * @property $subject 订单标题
 * @property $body 订单内容
 * @property $buyer_id 买家身份标识
 * @property $notify_url 接收通知url
 * Class TradeCreateParams
 * @package TPay\TradeCreate
 */
class TradeCreateParams extends BaseParams
{
    protected $mandatoryFields = [
        'pay_type', 'out_trade_no', 'total_amount', 'subject', 'body', 'buyer_id'
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
    public function getAuthCode()
    {
        return $this->data['auth_code'];
    }

    /**
     * @param mixed $auth_code
     */
    public function setAuthCode($auth_code): void
    {
        $this->data['auth_code'] = $auth_code;
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
    public function getBuyerId()
    {
        return $this->data['buyer_id'];
    }

    /**
     * @param mixed $buyer_id
     */
    public function setBuyerId($buyer_id): void
    {
        $this->data['buyer_id'] = $buyer_id;
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