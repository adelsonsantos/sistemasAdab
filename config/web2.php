<?php

use kartik\mpdf\Pdf;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'pt_BR',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7YQHks_vG2K8kM8q5iiVUEY4RApae9jH',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
       // 'db' => [require(__DIR__ . '/db.php'),
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'pgsql:host=localhost;port=5434;dbname=diaria', // Maybe other DBMS such as psql (PostgreSQL),...
                'username' => 'postgres',
                'password' => 'adab123',
                'charset' => 'utf8',
                'schemaMap' => [
                    'pgsql' => [
                        'class' => 'yii\db\pgsql\Schema',
                        'defaultSchema' => 'public'
                    ],
                ]
            ],

            /*'db2' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'sqlsrv:Server=10.2.8.86;Database=BD_ADAB_REDA', //maybe other dbms such as psql,...
                'username' => 'usr_adab_reda',
                'password' => '%sr_@d@b_rd@',
                'charset' => 'utf8',
            ],*/


        'view'=>[
            'theme' => [
                'pathMap' => [
                    '@app/views' =>[
                        '@app/themes/dirt',
                        '@app/themes/files'
                    ]
                ],
                'baseUrl' => '@web/../themes/dirt',
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],

    ],
    'modules' => [
        'gridview' => ['class' => 'kartik\grid\Module']
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
