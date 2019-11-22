<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 16:07
 */

namespace TPay\RefundQuery;


use TPay\BaseParams;

/**
 * @property $pay_type
 * @property $out_refund_no
 * @property $out_trade_no
 * @property $channel_trade_no
 * Class RefundQueryParams
 * @package TPay\RefundQuery
 */
class RefundQueryParams extends BaseParams
{
    protected $mandatoryFields = [
        'pay_type', 'out_refund_no'
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
    public function getOutRefundNo()
    {
        return $this->data['out_refund_no'];
    }

    /**
     * @param mixed $out_refund_no
     */
    public function setOutRefundNo($out_refund_no): void
    {
        $this->data['out_refund_no'] = $out_refund_no;
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
    public function getChannelTradeNo()
    {
        return $this->data['channel_trade_no'];
    }

    /**
     * @param mixed $channel_trade_no
     */
    public function setChannelTradeNo($channel_trade_no): void
    {
        $this->data['channel_trade_no'] = $channel_trade_no;
    }
}