<?php
namespace pistol88\hospital\traits;

use yii;

trait Module
{
    private $_module;

    public function getModule()
    {
        if ($this->_module === null) {
            $this->_module = Yii::$app->getModule('hospital');
        }
        return $this->_module;
    }
}
