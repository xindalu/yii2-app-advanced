<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'cache' => [
//            'class' => 'yii\caching\MemCache',
//            'servers' => [
//                [
//                    'host' => 'server1',
//                    'port' => 11211,
//                    'weight' => 100,
//                ],
//                [
//                    'host' => 'server2',
//                    'port' => 11211,
//                    'weight' => 50,
//                ],
//            ],

            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => '172.17.0.1',
                'port' => '6379',
                'database' => 0
            ],

        ]
    ],
];
