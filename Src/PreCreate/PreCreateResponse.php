<?php

namespace TPay\PreCreate;

use TPay\BaseResponse;

/**
 * @property int $order_id TPay系统订单号
 * @property string $out_trade_no 商户订单号
 * @property string $qr_code 二维码码串
 * Class PreCreateResponse
 */
class PreCreateResponse extends BaseResponse
{
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
     * @return string
     */
    public function getOutTradeNo()
    {
        return $this->data['out_trade_no'];
    }

    /**
     * @param string $out_trade_no
     */
    public function setOutTradeNo(string $out_trade_no)
    {
        $this->data['out_trade_no'] = $out_trade_no;
    }

    /**
     * @return string
     */
    public function getQrCode()
    {
        return $this->data['qr_code'];
    }

    /**
     * @param string $qr_code
     */
    public function setQrCode(string $qr_code)
    {
        $this->data['qr_code'] = $qr_code;
    }

}