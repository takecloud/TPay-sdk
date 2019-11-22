<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 11:20
 */

namespace TPay;


use TPay\AddWeChatConfig\AddWeChatConfigParams;
use TPay\BarcodePay\BarcodePayParams;
use TPay\PreCreate\PreCreateParams;
use TPay\Refund\RefundParams;
use TPay\RefundQuery\RefundQueryParams;
use TPay\TradeCancel\TradeCancelParams;
use TPay\TradeCreate\TradeCreateParams;
use TPay\TradeCreate\TradeCreateResponse;
use TPay\TradeQuery\TradeQueryParams;

class TPayManager
{
    /**
     * 获取新的客户端实例
     * @param $merchantNo
     * @param $secretKey
     * @return Client
     */
    public static function newClient($merchantNo, $secretKey)
    {
        return new Client($merchantNo, $secretKey);
    }

    /**
     * 获取新的条码支付参数对象
     * @param $payType
     * @param $outTradeNo
     * @param $amount
     * @param $authCode
     * @param $subject
     * @param $body
     * @param string $notifyURL
     * @return BarcodePayParams
     */
    public static function newBarcodePayParams($payType, $outTradeNo, $amount, $authCode, $subject, $body, $notifyURL = '')
    {
        $params = new BarcodePayParams();
        $params->setPayType($payType);
        $params->setOutTradeNo($outTradeNo);
        $params->setTotalAmount($amount);
        $params->setAuthCode($authCode);
        $params->setSubject($subject);
        $params->setBody($body);

        if (!empty($notifyURL)) {
            $params->setNotifyUrl($notifyURL);
        }

        return $params;
    }

    /**
     * 条码支付
     * @param Client $client
     * @param $payType
     * @param $outTradeNo
     * @param $amount
     * @param $authCode
     * @param $subject
     * @param $body
     * @param string $notifyURL
     * @return BarcodePay\BarcodePayResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function barcodePay(Client $client, $payType, $outTradeNo, $amount, $authCode, $subject, $body, $notifyURL = '')
    {
        $params = self::newBarcodePayParams($payType, $outTradeNo, $amount, $authCode, $subject, $body, $notifyURL);

        return $client->barcodePay($params);
    }

    /**
     * 获取新的扫码支付参数对象
     * @param $payType
     * @param $outTradeNo
     * @param $amount
     * @param $subject
     * @param $body
     * @param string $notifyURL
     * @return PreCreateParams
     */
    public static function newPreCreateParams($payType, $outTradeNo, $amount, $subject, $body, $notifyURL = '')
    {
        $params = new PreCreateParams();
        $params->setPayType($payType);
        $params->setOutTradeNo($outTradeNo);
        $params->setTotalAmount($amount);
        $params->setSubject($subject);
        $params->setBody($body);
        $params->setNotifyUrl($notifyURL);

        if (!empty($notifyURL)) {
            $params->setNotifyUrl($notifyURL);
        }

        return $params;
    }

    /**
     * 扫码支付
     * @param Client $client
     * @param $payType
     * @param $outTradeNo
     * @param $amount
     * @param $subject
     * @param $body
     * @param string $notifyURL
     * @return PreCreate\PreCreateResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function preCreate(Client $client, $payType, $outTradeNo, $amount, $subject, $body, $notifyURL = '')
    {
        $params = self::newPreCreateParams($payType, $outTradeNo, $amount, $subject, $body, $notifyURL);

        return $client->preCreate($params);
    }

    /**
     * 获取新的统一下单参数对象
     * @param $payType
     * @param $outTradeNo
     * @param $amount
     * @param $subject
     * @param $body
     * @param $buyerId
     * @param string $notifyURL
     * @return TradeCreateParams
     */
    public static function newTradeCreateParams($payType, $outTradeNo, $amount, $subject, $body, $buyerId, $notifyURL = '')
    {
        $params = new TradeCreateParams();
        $params->setPayType($payType);
        $params->setOutTradeNo($outTradeNo);
        $params->setTotalAmount($amount);
        $params->setSubject($subject);
        $params->setBody($body);
        $params->setBuyerId($buyerId);

        if (!empty($notifyURL)) {
            $params->setNotifyUrl($notifyURL);
        }

        return $params;
    }

    /**
     * 统一下单支付
     * @param Client $client
     * @param $payType
     * @param $outTradeNo
     * @param $amount
     * @param $subject
     * @param $body
     * @param $buyerId
     * @param string $notifyURL
     * @return TradeCreateResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function create(Client $client, $payType, $outTradeNo, $amount, $subject, $body, $buyerId, $notifyURL = '')
    {
        $params = self::newTradeCreateParams($payType, $outTradeNo, $amount, $subject, $body, $buyerId, $notifyURL);

        return $client->create($params);
    }

    /**
     * 获取新的订单查询参数对象
     * @param $payType
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @param string $orderId
     * @return TradeQueryParams
     */
    public static function newTradeQueryParams($payType, $outTradeNo = '', $channelTradeNo = '', $orderId = '')
    {
        $params = new TradeQueryParams();
        $params->setPayType($payType);
        $params->setOutTradeNo($outTradeNo);
        $params->setChannelTradeNo($channelTradeNo);
        $params->setOrderId($orderId);
        return $params;
    }

    /**
     * 订单查询
     * @param Client $client
     * @param $payType
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @param string $orderId
     * @return TradeQuery\TradeQueryResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function query(Client $client, $payType, $outTradeNo = '', $channelTradeNo = '', $orderId = '')
    {
        $params = self::newTradeQueryParams($payType, $outTradeNo, $channelTradeNo, $orderId);

        return $client->query($params);
    }

    /**
     * 获取新的订单退款参数对象
     * @param $payType
     * @param $refundAmount
     * @param $totalAmount
     * @param $outRefundNo
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @param string $orderId
     * @return RefundParams
     */
    public static function newRefundParams($payType, $refundAmount, $totalAmount, $outRefundNo, $outTradeNo = '', $channelTradeNo = '', $orderId = '')
    {
        $params = new RefundParams();
        $params->setPayType($payType);
        $params->setRefundAmount($refundAmount);
        $params->setTotalAmount($totalAmount);
        $params->setOutRefundNo($outRefundNo);
        $params->setOutTradeNo($outTradeNo);
        $params->setChannelTradeNo($channelTradeNo);
        $params->setOrderId($orderId);
        return $params;
    }

    /**
     * 订单退款
     * @param Client $client
     * @param $payType
     * @param $refundAmount
     * @param $totalAmount
     * @param $outRefundNo
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @param string $orderId
     * @return Refund\RefundResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function refund(Client $client, $payType, $refundAmount, $totalAmount, $outRefundNo, $outTradeNo = '', $channelTradeNo = '', $orderId = '')
    {
        $params = self::newRefundParams($payType, $refundAmount, $totalAmount, $outRefundNo, $outTradeNo, $channelTradeNo, $orderId);

        return $client->refund($params);
    }

    /**
     * 获取新的退款查询参数对象
     * @param $payType
     * @param $outRefundNo
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @return RefundQueryParams
     */
    public static function newRefundQueryParams($payType, $outRefundNo, $outTradeNo = '', $channelTradeNo = '')
    {
        $params = new RefundQueryParams();
        $params->setPayType($payType);
        $params->setOutRefundNo($outRefundNo);
        $params->setOutTradeNo($outTradeNo);
        $params->setChannelTradeNo($channelTradeNo);
        return $params;
    }

    /**
     * 订单退款查询
     * @param Client $client
     * @param $payType
     * @param $outRefundNo
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @return RefundQuery\RefundQueryResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function refundQuery(Client $client, $payType, $outRefundNo, $outTradeNo = '', $channelTradeNo = '')
    {
        $params = self::newRefundQueryParams($payType, $outRefundNo, $outTradeNo, $channelTradeNo);

        return $client->refundQuery($params);
    }

    /**
     * 获取新的取消订单参数对象
     * @param $payType
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @return TradeCancelParams
     */
    public static function newTradeCancelParams($payType, $outTradeNo = '', $channelTradeNo = '')
    {
        $params = new TradeCancelParams();
        $params->setPayType($payType);
        $params->setOutTradeNo($outTradeNo);
        $params->setChannelTradeNo($channelTradeNo);
        return $params;
    }

    /**
     * 取消订单
     * @param Client $client
     * @param $payType
     * @param string $outTradeNo
     * @param string $channelTradeNo
     * @return TradeCancel\TradeCancelResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function cancel(Client $client, $payType, $outTradeNo = '', $channelTradeNo = '')
    {
        $params = self::newTradeCancelParams($payType, $outTradeNo, $channelTradeNo);

        return $client->cancel($params);
    }

    /**
     * 获取新的添加微信开发配置参数对象
     * @param string $appid
     * @param string $path
     * @param string $subscribeAppid
     * @return AddWeChatConfigParams
     * @throws ParamsException
     */
    public static function newAddWeChatConfigParams($appid = '', $path = '', $subscribeAppid = '')
    {
        $params = new AddWeChatConfigParams();
        $params->setSubscribeAppid($subscribeAppid);
        $params->setAppid($appid);
        $params->setPath($path);

        if (empty($params->getData())) {
            throw new ParamsException('appid,path,subscribeAppid 不能同时为空');
        }

        return $params;
    }

    /**
     * 添加微信开发配置
     * @param Client $client
     * @param string $appid
     * @param string $path
     * @param string $subscribeAppid
     * @return AddWeChatConfig\AddWeChatConfigResponse
     * @throws ParamsException
     * @throws RequestException
     */
    public static function addWeChatConfig(Client $client, $appid = '', $path = '', $subscribeAppid = '')
    {
        $params = self::newAddWeChatConfigParams($appid, $path, $subscribeAppid);

        return $client->addWeChatConfig($params);
    }
}