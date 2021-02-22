<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'datetimeFormat' => 'php:d/m/Y - H:i'
        ],
        'urlManager' => [
            'rules' => [
                'categories/<id:\d+>' => 'main/categories',
            ]
        ]
    ],
];
