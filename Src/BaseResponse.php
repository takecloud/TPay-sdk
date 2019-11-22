<?php

namespace TPay;

/**
 * 对外开放的API统一 response 规范
 * @property string $merchant_no 商户号
 * @property int $pay_type 支付方式
 * Class BaseResponse
 */
class BaseResponse
{
    protected $code = 100;

    protected $msg = 'success';

    protected $data = [];

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getMerchantNo()
    {
        return $this->data['merchant_no'];
    }

    /**
     * @param string $merchant_no
     */
    public function setMerchantNo($merchant_no)
    {
        $this->data['merchant_no'] = $merchant_no;
    }

    /**
     * @return int
     */
    public function getPayType()
    {
        return $this->data['pay_type'];
    }

    /**
     * @param int $pay_type
     */
    public function setPayType($pay_type)
    {
        $this->data['pay_type'] = $pay_type;
    }



    public function __toString()
    {
        return json_encode([
            'code' => $this->code,
            'msg' => $this->msg,
            'data' => $this->data
        ], JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES);
    }
}