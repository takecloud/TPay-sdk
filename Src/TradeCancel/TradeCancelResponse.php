<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 16:25
 */

namespace TPay\TradeCancel;

use TPay\BaseResponse;

/**
 * @property $channel_trade_no
 * @property $out_trade_no
 * @property $retry_flag
 * Class TradeCancelResponse
 */
class TradeCancelResponse extends BaseResponse
{
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
    public function getRetryFlag()
    {
        return $this->data['retry_flag'];
    }

    /**
     * @param mixed $retry_flag
     */
    public function setRetryFlag($retry_flag)
    {
        $this->data['retry_flag'] = $retry_flag;
    }

}