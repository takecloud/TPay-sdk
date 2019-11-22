<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 17:14
 */

use \TPay\TPayManager;

require_once 'vendor/autoload.php';

// 初始化TPay客户端
$client = TPayManager::newClient(22, '7f9178acd2b7f34bace1e61c31b95b86');
// 构造请求参数
/*$params = new \TPay\BarcodePay\BarcodePayParams();
$params->setOutTradeNo('FZY2019112101');
$params->setPayType(1);
$params->setTotalAmount(0.01);
$params->setBody('测试订单');
$params->setSubject('测试订单');
$params->setAuthCode('288941175623077385');
// 发起请求
$response = $client->barcodePay($params);*/


// 通过helper直接发起请求
/*$response = TPayManager::barcodePay($client, 1, 'FZY2019112101', 0.01, '288941175623077385',
    '测试订单', '测试订单');*/

//$response = TPayManager::preCreate($client, 1, 'FZY2019112201', 0.01, '测试订单', '测试订单');

//$response = TPayManager::create($client, 1, 'FZY2019112202', 0.01, '测试订单', '测试订单', '2088812940362506');

//$response = TPayManager::query($client, 1, 'FZY2019112202');

//$response = TPayManager::cancel($client, 1, 'FZY2019112202');

//$response = TPayManager::refund($client, 1, 0.01, 0.01, 'FZY2019112201', 'FZY2019112201');

$response = TPayManager::refundQuery($client, 1, 'FZY2019112201', 'FZY2019112201');

echo PHP_EOL;
echo $response;
echo PHP_EOL;