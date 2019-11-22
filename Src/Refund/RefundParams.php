<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 15:59
 */

namespace TPay\Refund;


use TPay\BaseParams;

/**
 * @property $pay_type 支付方式
 * @property $refund_amount 退款金额
 * @property $out_refund_no 商户系统退款流水号
 * @property $total_amount 订单总金额
 * @property $out_trade_no 商户订单号
 * @property $channel_trade_no 渠道订单号
 * @property $order_id TPay系统订单号
 * @property $reason 退款原因
 * Class RefundParams
 * @package TPay\Refund
 */
class RefundParams extends BaseParams
{
    protected $mandatoryFields = [
        'pay_type', 'refund_amount', 'out_refund_no', 'total_amount'
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
    public function getRefundAmount()
    {
        return $this->data['refund_amount'];
    }

    /**
     * @param mixed $refund_amount
     */
    public function setRefundAmount($refund_amount): void
    {
        $this->data['refund_amount'] = $refund_amount;
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

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->data['reason'];
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason): void
    {
        $this->data['reason'] = $reason;
    }
}