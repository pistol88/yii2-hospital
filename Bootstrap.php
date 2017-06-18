<?php
namespace pistol88\hospital;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if (!isset($app->i18n->translations['hospital']) && !isset($app->i18n->translations['hospital*'])) {
            $app->i18n->translations['hospital'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__.'/messages',
                'forceTranslation' => true
            ];
        }
    }
}