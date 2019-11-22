<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 16:14
 */

namespace TPay\RefundQuery;

use TPay\BaseResponse;

/**
 * @property $out_refund_no         商户系统退款单号
 * @property $out_trade_no          商户订单号
 * @property $channel_trade_no      第三方通道订单号
 * @property $refund_amount         退款金额
 * @property $total_amount          订单总金额
 * @property $order_id              TPay系统订单号
 * @property $refund_id             TPay系统退款单号
 * @property $status                退款状态
 * Class RefundQueryResponse
 * @package App\Lib\ThirdPayment
 */
class RefundQueryResponse extends BaseResponse
{
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
    public function setOutRefundNo($out_refund_no)
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
    public function setOutTradeNo($out_trade_no)
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
    public function setChannelTradeNo($channel_trade_no)
    {
        $this->data['channel_trade_no'] = $channel_trade_no;
    }

    /**
     * @return mixed
     */
    public function getRefundAmount()
    {
        return $this->data['refund_amount'];
    }

    /**
     * @param mixed $refund_amount
     */
    public function setRefundAmount($refund_amount)
    {
        $this->data['refund_amount'] = $refund_amount;
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
    public function getOrderId()
    {
        return $this->data['order_id'];
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->data['order_id'] = $order_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->data['status'] = $status;
    }

    /**
     * @return mixed
     */
    public function getRefundId()
    {
        return $this->data['refund_id'];
    }

    /**
     * @param mixed $refund_id
     */
    public function setRefundId($refund_id)
    {
        $this->data['refund_id'] = $refund_id;
    }
}