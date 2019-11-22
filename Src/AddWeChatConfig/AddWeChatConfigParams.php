<?php

namespace TPay\AddWeChatConfig;


use TPay\BaseParams;

/**
 * @property $appid
 * @property $path
 * @property $subscribeAppid
 * Class AddWeChatConfigParams
 * @package TPay\addWeChatConfig
 */
class AddWeChatConfigParams extends BaseParams
{
    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->data['appid'];
    }

    /**
     * @param mixed $appid
     */
    public function setAppid($appid): void
    {
        $this->data['appid'] = $appid;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->data['path'];
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->data['path'] = $path;
    }

    /**
     * @return mixed
     */
    public function getSubscribeAppid()
    {
        return $this->data['subscribeAppid'];
    }

    /**
     * @param mixed $subscribeAppid
     */
    public function setSubscribeAppid($subscribeAppid): void
    {
        $this->data['subscribeAppid'] = $subscribeAppid;
    }
}