<?php

namespace TPay\Refund;


use TPay\BaseResponse;

/**
 * @property int $status 退款状态
 * @property $refund_amount 退款金额
 * @property string $out_refund_no 商户退款流水号
 * @property int $refund_id TPay系统退款单号
 * @property int $order_id TPay系统订单号
 * @property string
 * Class RefundResponse
 */
class RefundResponse extends BaseResponse
{
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
     * @return string
     */
    public function getOutRefundNo()
    {
        return $this->data['out_refund_no'];
    }

    /**
     * @param string $out_refund_no
     */
    public function setOutRefundNo(string $out_refund_no)
    {
        $this->data['out_refund_no'] = $out_refund_no;
    }

    /**
     * @return int
     */
    public function getRefundId()
    {
        return $this->data['refund_id'];
    }

    /**
     * @param int $refund_id
     */
    public function setRefundId(int $refund_id)
    {
        $this->data['refund_id'] = $refund_id;
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

}