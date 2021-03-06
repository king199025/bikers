<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','trace'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'      => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'mainpage/default',
                'login' => '/user/security/login',
                'register'=> 'user/registration/register',
                'forgot' => '/user/recovery/request',
                'resend' => '/user/registration/resend',

                'news' => 'news/default',
                'news/<slug>' => '/news/default/views',

                'garage' => 'garage/garage',

                'bikers' => 'bikers/default',

                'travels' => 'travels/default',
                
                'clubs' => 'clubs/default',
                
                'events' => 'events/default'
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
    ],

    'modules' => [
        'mainpage' => [
            'class' => 'frontend\modules\mainpage\Mainpage',
        ],
        'news' => [
            'class' => 'frontend\modules\news\News',
        ],
        'garage' => [
            'class' => 'frontend\modules\garage\Garage',
        ],
        'bikers' => [
            'class' => 'frontend\modules\bikers\Bikers',
        ],
        'travels' => [
            'class' => 'frontend\modules\travels\Travels',
        ],
        'clubs' => [
            'class' => 'frontend\modules\clubs\Clubs'
        ],
        'events' => [
            'class' => 'frontend\modules\events\Events'
        ],
        'moto_clubs' => [
            'class' => 'frontend\modules\moto_clubs\MotoClubs',
        ],
        'user_album' => [
            'class' => 'frontend\modules\user_album\UserAlbum',
        ],
        'user_photo' => [
            'class' => 'frontend\modules\user_photo\UserPhoto',
        ],
        'user_post' => [
            'class' => 'frontend\modules\user_post\UserPost',
        ],
    ],
    'params' => $params,
];
