<?php
require __DIR__ . '/custom/container.php';

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'user' => [
            'identityClass' => 'api\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
//            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
//        'session' => [
//            // this is the name of the session cookie used for login on the api
//            'name' => 'advanced-api',
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
//                [
//                    'class' => 'yii\log\FileTarget',
//                    'levels' => ['info', 'error', 'warning'],
//                    'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION'],
//                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'trace'],
//                    'logVars' => ['*'],
                    'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION'],
                    'categories' => ['it'],
                    'logFile' => '@runtime/logs/it.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning', 'error'],
                    'logVars' => ['_GET', '_POST'],
                    'categories' => ['we'],
                    'logFile' => '@runtime/logs/we.log',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'assetManager'=>array(
//            // 设置存放assets的文件目录位置
//            'basePath'=>'/data/www/style/eoa/api/assets',
//            // 设置访问assets目录的url地址
//            'baseUrl'=>'http://eoa.com/style/eoa/api/assets',
//        ),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/v1/auth/<action>' => 'v1/auth/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/user'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET user-test' => 'user-test',
                        'GET user-menu-test' => 'user-menu-test',
                        'POST get-token' => 'get-token',
                        'POST test' => 'test'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/group'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET test' => 'test',
                    ],
                ],
            ],
        ],
    ],
    'container' => $container,
    'params' => $params,
];
