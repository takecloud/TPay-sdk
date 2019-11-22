<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 11:23
 */

namespace TPay;


use TPay\AddWeChatConfig\AddWeChatConfigParams;
use TPay\AddWeChatConfig\AddWeChatConfigResponse;
use TPay\BarcodePay\BarcodePayParams;
use TPay\BarcodePay\BarcodePayResponse;
use TPay\PreCreate\PreCreateParams;
use TPay\PreCreate\PreCreateResponse;
use TPay\Refund\RefundParams;
use TPay\Refund\RefundResponse;
use TPay\RefundQuery\RefundQueryParams;
use TPay\RefundQuery\RefundQueryResponse;
use TPay\TradeCancel\TradeCancelParams;
use TPay\TradeCancel\TradeCancelResponse;
use TPay\TradeCreate\TradeCreateParams;
use TPay\TradeCreate\TradeCreateResponse;
use TPay\TradeQuery\TradeQueryParams;
use TPay\TradeQuery\TradeQueryResponse;

class Client
{
    protected $domain = 'https://tpdev.takewind.cn/';

    // 商户号
    protected $merchantNo;
    // 秘钥
    protected $secretKey;

    public function __construct($merchantNo, $secretKey)
    {
        $this->merchantNo = $merchantNo;
        $this->secretKey = $secretKey;
    }

    /**
     * 条码支付
     * @param BarcodePayParams $params
     * @return BarcodePayResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function barcodePay(BarcodePayParams $params)
    {
        $response = new BarcodePayResponse();

        $this->request('open/pay/barcodePay', $params, $response);

        return $response;
    }

    /**
     * 扫码支付
     * @param PreCreateParams $params
     * @return PreCreateResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function preCreate(PreCreateParams $params)
    {
        $response = new PreCreateResponse();

        $this->request('open/pay/preCreate', $params, $response);

        return $response;
    }

    /**
     * 统一下单支付
     * @param TradeCreateParams $params
     * @return TradeCreateResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function create(TradeCreateParams $params)
    {
        $response = new TradeCreateResponse();

        $this->request('open/pay/create', $params, $response);

        return $response;
    }

    /**
     * 订单查询
     * @param TradeQueryParams $params
     * @return TradeQueryResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function query(TradeQueryParams $params)
    {
        $response = new TradeQueryResponse();

        $this->request('open/pay/query', $params, $response);

        return $response;
    }

    /**
     * 订单退款
     * @param RefundParams $params
     * @return RefundResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function refund(RefundParams $params)
    {
        $response = new RefundResponse();

        $this->request('open/pay/refund', $params, $response);

        return $response;
    }

    /**
     * 订单退款查询
     * @param RefundQueryParams $params
     * @return RefundQueryResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function refundQuery(RefundQueryParams $params)
    {
        $response = new RefundQueryResponse();

        $this->request('open/pay/refundQuery', $params, $response);

        return $response;
    }

    /**
     * 撤销订单
     * @param TradeCancelParams $params
     * @return TradeCancelResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function cancel(TradeCancelParams $params)
    {
        $response = new TradeCancelResponse();

        $this->request('open/pay/cancel', $params, $response);

        return $response;
    }

    /**
     * 添加微信开发配置
     * @param AddWeChatConfigParams $params
     * @return AddWeChatConfigResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function addWeChatConfig(AddWeChatConfigParams $params)
    {
        $response = new AddWeChatConfigResponse();

        $this->request('open/merchant/addWeChatConfig', $params, $response);

        return $response;
    }

    /**
     * 发起请求
     * @param $api
     * @param BaseParams $params
     * @param BaseResponse|null $response response对象，传null则返回原生数组结果
     * @return mixed|BaseResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public function request($api, BaseParams $params, BaseResponse $response = null)
    {
        // 校验必填参数
        $params->validateMandatoryFields();

        $rawData = $params->getData();
        $rawData['merchant_no'] = $this->merchantNo;
        $rawData['timestamp'] = time();
        $rawData['nonce'] = $this->generateRandStr(8, 'NUMBER');
        $rawData['sign'] = $this->generateSign($rawData);

        $result = json_decode($this->curlPOST($this->domain . $api, $rawData), true);

        // 转为response对象
        if (!is_null($response)) {
            if (array_key_exists('data', $result)) {
                $response->setData($result['data']);
            }
            $response->setCode($result['code']);
            $response->setMsg($result['msg']);

            return $response;
        }

        // 返回数组结果
        return $result;
    }

    protected function generateSign($params)
    {
        // 对参数字典序排序
        ksort($params,SORT_STRING);
        // 拼接原文字符串
        $paramStr = '';
        foreach ($params as $key => $value) {
            // 把 参数中的 _ 替换成 .
            if (strpos($key, '_'))
            {
                $key = str_replace('_', '.', $key);
            }

            if (!empty($paramStr)) {
                $paramStr .= '&';
            }
            $paramStr .= $key . '=' . $value;
        }
        $signature = base64_encode(hash_hmac('sha1', $paramStr, $this->secretKey));

        return $signature;
    }

    public function generateRandStr($length, $format = 'ALL')
    {
        switch($format) {
            case 'ALL':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
            case 'CHAR':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                break;
            case 'NUMBER':
                $chars = '0123456789';
                break;
            default :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
        }
        mt_srand((double)microtime() * 1000000 * getmypid());
        $randStr = '';
        while(strlen($randStr) < $length)
            $randStr .= substr($chars, (mt_rand() % strlen($chars)),1);
        return $randStr;
    }

    /**
     * 通过curl发起post请求
     * @param $url
     * @param $data
     * @param string $header
     * @return mixed
     * @throws RequestException
     */
    protected function curlPOST($url, $data, $header = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if (!empty($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);

        $err = curl_error($ch);
        curl_close($ch);

        if (!empty($err)) {
            throw new RequestException('curl error: ' . $err);
        }

        return $response;
    }

    /**
     * 通过curl发起get请求
     * @param $url
     * @param string $header
     * @return mixed
     * @throws RequestException
     */
    protected function curlGET($url, $header = '')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        if (!empty($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        $response = curl_exec($ch);

        $err = curl_error($ch);
        curl_close($ch);

        if (!empty($err)) {
            throw new RequestException('curl error: ' . $err);
        }

        return $response;
    }
}