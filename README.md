# TPay-skd
帮助开发者快速对接 TPay 系统

## composer 安装
```
composer require takecloud/tpay-sdk
```

## 使用

### 初始化客户端
```php
<?php
use \TPay\TPayManager;

$client = TPayManager::newClient('your merchantNo', 'your secretKey');
```

### 通过Manner使用
```php
<?php
use \TPay\TPayManager;

$client = TPayManager::newClient('your merchantNo', 'your secretKey');
$response = TPayManager::barcodePay($client, 1, 'FZY2019112204', 0.03, 'xxxxxxxxxxxxxxx', '测试订单', '测试订单');
```

### 直接使用Client对象
```php
<?php
use \TPay\TPayManager;

$client = TPayManager::newClient('your merchantNo', 'your secretKey');
// 构造请求参数
$params = new \TPay\BarcodePay\BarcodePayParams();
$params->setOutTradeNo('FZY2019112101');
$params->setPayType(1);
$params->setTotalAmount(0.01);
$params->setBody('测试订单');
$params->setSubject('测试订单');
$params->setAuthCode('xxxxxxxxxxxxxxxxxxxxxxxx');
// 发起请求
$response = $client->barcodePay($params);
```

### 生成签名(可用于接收回调时校验参数中的签名)
```php
<?php
use \TPay\TPayManager;

// 回调的请求参数
$params = $_POST;
// 回调的签名
$sign = $params['sign'];
unset($params['sign']);

$client = TPayManager::newClient('your merchantNo', 'your secretKey');

// 比对服务端和客户端签名
if ($sign === $client->generateSign($params)) {
    // 有效签名
}

```