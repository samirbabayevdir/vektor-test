<?php
return [
    'language' => 'az',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'components' => [
        'i18n' => [
            'translations' => [
                'samba' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    // 'sourceLanguage' => 'en',
                ],
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'en-US',
                ]
            ],
        ],

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
