<?php
/**
 * User: weeki
 * Date: 2019/11/21
 * Time: 15:51
 */

namespace TPay\TradeQuery;


use TPay\BaseParams;

/**
 * @property $pay_type 支付方式
 * @property $out_trade_no 商户订单号
 * @property $channel_trade_no 渠道订单号
 * @property $order_id TPay订单id
 * Class TradeQueryParams
 * @package TPay\TradeQuery
 */
class TradeQueryParams extends BaseParams
{
    protected $mandatoryFields = [
        'pay_type'
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

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->data['order_id'];
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->data['order_id'] = $order_id;
    }
}