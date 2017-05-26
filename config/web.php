<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'NVX7jKedZ1jLvcq1faKXh0PBoVSfC1m9',
            'enableCsrfValidation'=>false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 1
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['lifetime' => 1]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.gmail.com',
                'port'       => '587',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => 'designadelson@gmail.com',
                'password'   => 'h3asantos29',
            ],
        ],*/
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class'         => 'Swift_SmtpTransport',
                'host'          => 'envio.ba.gov.br',
                'username'      => 'adelson.santos@adab.ba.gov.br',
                'password'      => 'LGkp1993',
                'port'          => '25',
                'encryption'    => 'ssl',
            ],
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => [
                        '@app/themes/stargazers',
                        '@app/themes/files'
                    ]
                ],
                'baseUrl'   => '@web/../themes/stargazers'
            ]
        ],








        /*'view'=>[
                'theme' => [
                   'pathMap' => [
                        '@app/views' =>[
                             '@app/themes/dirt',
                             '@app/themes/files'
                        ]
                    ],
                'baseUrl' => '@web/../themes/dirt',
                ],
        ],*/
],
    'params' => $params,
    'defaultRoute' => 'user/login',
    'sourceLanguage'=>'pt-br',
    'language'=>'pt-br',
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
