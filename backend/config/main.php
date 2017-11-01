<?php
$baseUrl = str_replace('/web', '', (new \yii\web\Request())->getBaseUrl());
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],

    'timeZone'   => 'Asia/Ho_Chi_Minh',
    'language'   => 'vi',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl'   => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix'          => '.html',
            'rules'           => require(__DIR__ . '/route.php'),
        ],
        'view'         => [
            'class' => 'backend\components\View',
            'theme' => [
                'pathMap'  => [
                    '@dektrium/user/views' => '@backend/views/user',
                ],
                'basePath' => '@backend',
                'baseUrl'  => '@web',
            ],
        ],

    ],
    'modules' => [
        'roxymce' => [
            'class' => 'navatech\roxymce\Module',
            'uploadFolder' => '@frontend/web/uploads/images',
            'uploadUrl' => '/uploads/images',
        ],
        'gridview'    => [
            'class' => '\kartik\grid\Module',
        ],
        'user'        => [
            'class'              => 'dektrium\user\Module',
            'enableRegistration' => false,
            'enableConfirmation' => false,
            'admins'             => ['admin'],
            'modelMap'           => [
                'User'      => 'navatech\role\models\User',
                'LoginForm' => 'navatech\role\models\LoginForm',
            ],
            'controllerMap'      => [
                'security' => 'backend\controllers\UserController',
                'admin' => 'backend\controllers\user\AdminController'
            ],
        ],
        'role'        => [
            'class'       => 'navatech\role\Module',
            'controllers' => [
                'backend\controllers',
                'navatech\role\controllers',
            ],
        ],
        'datecontrol' => [
            'class'           => 'kartik\datecontrol\Module',
            'displaySettings' => [
                'date'     => 'php:d-m-Y',
                'time'     => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],
            'saveSettings'    => [
                'date'     => 'php:Y-m-d',
                'time'     => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
            'autoWidget'      => true,
        ],

    ],
    'params' => $params,
];
