Yii2-cart
==========

It's module provide few widgets for hospital's site. Today there have only one widget with form who connect doctor and pacient.

Installation
---------------------------------

Run at project root folder:

```
php composer require pistol88/yii2-hospital "@dev"
```

```
php yii migrate/up --migrationPath=vendor/pistol88/yii2-hospital/migrations
```

And add this to modules section of config:

```
    'hospital' => [
        'class' => 'pistol88\hospital\Module',
        'adminRoles' => ['superadmin', 'administrator', 'admin'],
    ],
```

Now you can use a widget at some view:

```
    <?=\pistol88\hospital\widgets\PacientForm::widget(['pjax' => true]); ?>
```

Admin panel at route: /hospital/pacient/index
