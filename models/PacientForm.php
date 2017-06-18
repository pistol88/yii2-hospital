<?php
namespace pistol88\hospital\models;

use yii;
use yii\db\ActiveRecord;

class PacientForm extends ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_READ = 1;
    
    public function getStatuses()
    {
        return [
            self::STATUS_NEW => yii::t('hospital', 'New'),
            self::STATUS_READ => yii::t('hospital', 'Read'),
        ];
    }
    
    public function getStatusName()
    {
        switch($this->status) {
            case self::STATUS_NEW: return yii::t('hospital', 'New');
            case self::STATUS_READ: return yii::t('hospital', 'Read');
        }
        
        return '';
    }
    
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
        ];
    }
    
    public static function tableName()
    {
        return 'hospital_pacient_form_widget';
    }
    
    public function rules()
    {
        return [
            [['name', 'family'], 'required'],
            [['phone', 'email'], 'emailAndPhoneValidation', 'skipOnEmpty' => false],
            ['email', 'email'],
            [['date', 'time'], 'string'],
            [['status'], 'integer'],
        ];
    }

    public function emailAndPhoneValidation($attribute, $params)
    {
        if(empty($this->phone) && empty($this->email)) {
            $this->addError($attribute, yii::t('hospital', 'Phone or email is required'));
        }
    }
    
    public function attributeLabels()
    {
        return [
            'name' => yii::t('hospital', 'Name'),
            'status' => yii::t('hospital', 'Status'),
            'family' => yii::t('hospital', 'Family'),
            'email' => yii::t('hospital', 'E-mail'),
            'phone' => yii::t('hospital', 'Phone'),
            'date' => yii::t('hospital', 'Date'),
            'time' => yii::t('hospital', 'Time'),
        ];
    }
}
