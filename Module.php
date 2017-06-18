<?php
namespace pistol88\hospital;

class Module extends \yii\base\Module
{
    public $captcha = true; //show captcha
    public $adminRoles = ['superadmin', 'administrator', 'admin']; //roles who can see orders
}