<?php
namespace pistol88\hospital\widgets;

use yii\base\Widget;
use pistol88\hospital\models\PacientForm as Model;
use pistol88\hospital\traits\Module;

class PacientForm extends Widget
{
    use Module;
    
    public $pjax = true;
    public $model = null;
    
    public function run()
    {
        if(!$model = $this->model) {
            $model = new Model;
        }
        
        return $this->render('pacient-form', [
            'pjax' => $this->pjax,
            'model' => $model,
            'captcha' => $this->module->captcha,
        ]);
    }
}