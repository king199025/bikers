<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@', '?'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                'identificator_0' => [
                    'baseUrl' => '',
                    'basePath' => '@frontend/web',
                    'path' => 'media/upload',
                    'name' => 'Изображения',
                ],

                'identificator_1' => [
                    'baseUrl'=>'',
                    'basePath'=>'@frontend/web',
                    'path' => 'media/users/' . Yii::$app->user->id . '/' ,
                    'name' => 'Global',
                ],
            ],
            'watermark' => [
                'source' => __DIR__ . '/logo.png', // Path to Water mark image
                'marginRight' => 5, // Margin right pixel
                'marginBottom' => 5, // Margin bottom pixel
                'quality' => 95, // JPEG image save quality
                'transparency' => 70, // Water mark image transparency ( other than PNG )
                'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200 // Target image minimum pixel size
            ]
        ]
    ],

    'modules' => [
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                /*'registration' => '\frontend\controllers\user\RegUserController',*/
                'registration' => [
                    'class' => \frontend\controllers\user\RegUserController::className(),
                    'on ' . \frontend\controllers\user\RegUserController::EVENT_AFTER_REGISTER  => function ($event) {
                        /*$auth = Yii::$app->authManager;
                        $role = $auth->getRole('admin');
                        $user = \dektrium\user\models\User::findOne(['username' => $event->form->username]);
                        $auth->assign($role, $user->id);*/
                        $user = \dektrium\user\models\User::findOne(['username' => $event->form->username]);
                        $warning = new \common\models\db\UserWarning();
                        $warning->user_id = $user->id;
                        $warning->save();

                    }
                ],
                'recovery' => '\frontend\controllers\user\RecoveryController',
                'settings' => '\frontend\controllers\user\SettingsController',
            ],
            'modelMap' => [
                'RegistrationForm' => '\frontend\models\user\RegUserForm',
                'RecoveryForm' => '\frontend\models\user\RecoveryForm',
                'ResendForm' => '\frontend\models\user\ResendForm',
                'User' => '\frontend\models\user\UserDec',
                'SettingsForm' => '\frontend\models\user\SettingsForm',
            ],
            'enableUnconfirmedLogin' => true,
            'enableGeneratingPassword' => true,
            'enableConfirmation' => true,
            'enableFlashMessages' => false,
            'confirmWithin' => 86400,
            'cost' => 12,
            'admins' => ['admin'],
            'mailer' => [
                'sender' => 'kavalar@art-craft.tk', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject' => 'Добро пожаловать',
                'confirmationSubject' => 'Confirmation subject',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject' => 'Recovery subject',
            ],
        ],
    ],
];
