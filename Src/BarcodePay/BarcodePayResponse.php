<?php

namespace TPay\BarcodePay;

use TPay\BaseResponse;

/**
 * 条码支付response规范
 * @property int $order_id TPay系统订单号
 * @property string $channel_trade_no 第三方通道订单号
 * @property string $out_trade_no 商户订单号
 * @property string $buyer_user_id 买家身份标识
 * @property $total_amount 总金额
 * @property $receipt_amount 实收金额
 * @property int $status 订单状态
 * Class BarcodePayResponse
 */
class BarcodePayResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getChannelTradeNo()
    {
        return $this->data['channel_trade_no'];
    }

    /**
     * @param string $channel_trade_no
     */
    public function setChannelTradeNo($channel_trade_no)
    {
        $this->data['channel_trade_no'] = $channel_trade_no;
    }

    /**
     * @return string
     */
    public function getOutTradeNo()
    {
        return $this->data['out_trade_no'];
    }

    /**
     * @param string $out_trade_no
     */
    public function setOutTradeNo($out_trade_no)
    {
        $this->data['out_trade_no'] = $out_trade_no;
    }

    /**
     * @return string
     */
    public function getBuyerUserId()
    {
        return $this->data['buyer_user_id'];
    }

    /**
     * @param string $buyer_user_id
     */
    public function setBuyerUserId($buyer_user_id)
    {
        $this->data['buyer_user_id'] = $buyer_user_id;
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
    public function setTotalAmount($total_amount)
    {
        $this->data['total_amount'] = $total_amount;
    }

    /**
     * @return mixed
     */
    public function getReceiptAmount()
    {
        return $this->data['receipt_amount'];
    }

    /**
     * @param mixed $receipt_amount
     */
    public function setReceiptAmount($receipt_amount)
    {
        $this->data['receipt_amount'] = $receipt_amount;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->data['order_id'];
    }

    /**
     * @param int $order_id
     */
    public function setOrderId(int $order_id)
    {
        $this->data['order_id'] = $order_id;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->data['status'] = $status;
    }


}