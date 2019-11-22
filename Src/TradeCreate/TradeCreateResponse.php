<?php

namespace TPay\TradeCreate;

use TPay\BaseResponse;

/**
 * @property int $order_id TPay系统订单号
 * @property string $out_trade_no 商户订单号
 * @property string $channel_trade_no 第三方通道订单号
 * @property string $app_id 公众号id
 * @property string $nonce_str 随机字符串
 * @property string $package 统一下单接口返回的prepay_id参数值，提交格式如：prepay_id=***
 * @property string $pay_sign 签名
 * @property string $sign_type 签名方式
 * @property int $time_stamp
 * Class TradeCreateResponse
 */
class TradeCreateResponse extends BaseResponse
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
    public function getChannelTradeNo()
    {
        return $this->data['channel_trade_no'];
    }

    /**
     * @param string $channel_trade_no
     */
    public function setChannelTradeNo(string $channel_trade_no)
    {
        $this->data['channel_trade_no'] = $channel_trade_no;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->data['app_id'];
    }

    /**
     * @param string $app_id
     */
    public function setAppId(string $app_id)
    {
        $this->data['app_id'] = $app_id;
    }

    /**
     * @return string
     */
    public function getNonceStr()
    {
        return $this->data['nonce_str'];
    }

    /**
     * @param string $nonce_str
     */
    public function setNonceStr(string $nonce_str)
    {
        $this->data['nonce_str'] = $nonce_str;
    }

    /**
     * @return string
     */
    public function getPackage()
    {
        return $this->data['package'];
    }

    /**
     * @param string $package
     */
    public function setPackage(string $package)
    {
        $this->data['package'] = $package;
    }

    /**
     * @return string
     */
    public function getPaySign()
    {
        return $this->data['pay_sign'];
    }

    /**
     * @param string $pay_sign
     */
    public function setPaySign(string $pay_sign)
    {
        $this->data['pay_sign'] = $pay_sign;
    }

    /**
     * @return string
     */
    public function getSignType()
    {
        return $this->data['sign_type'];
    }

    /**
     * @param string $sign_type
     */
    public function setSignType(string $sign_type)
    {
        $this->data['sign_type'] = $sign_type;
    }

    /**
     * @return int
     */
    public function getTimeStamp()
    {
        return $this->data['time_stamp'];
    }

    /**
     * @param int $time_stamp
     */
    public function setTimeStamp(int $time_stamp)
    {
        $this->data['time_stamp'] = $time_stamp;
    }

}