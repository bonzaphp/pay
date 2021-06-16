<?php

declare(strict_types=1);

namespace Yansongda\Pay\Plugin\Wechat\Pay\Jsapi;

use Yansongda\Pay\Plugin\Wechat\GeneralPlugin;
use Yansongda\Pay\Rocket;

class PrepayPlugin extends GeneralPlugin
{
    protected function getUri(Rocket $rocket): string
    {
        return 'v3/pay/transactions/jsapi';
    }

    /**
     * @throws \Yansongda\Pay\Exception\ContainerDependencyException
     * @throws \Yansongda\Pay\Exception\ContainerException
     * @throws \Yansongda\Pay\Exception\ServiceNotFoundException
     */
    protected function checkPayload(Rocket $rocket): void
    {
        $config = get_wechat_config($rocket->getParams());

        $rocket->mergePayload([
            'appid' => $config->get('mp_app_id', ''),
            'mchid' => $config->get('mch_id', ''),
            'notify_url' => $config->get('notify_url'),
        ]);
    }
}