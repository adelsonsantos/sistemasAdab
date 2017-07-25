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
            'class' => 'yii\web\Session'
            //, 'cookieParams' => ['lifetime' => 1]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '200.187.60.110',
                'username' => 'adelson.santos@adab.ba.gov.br',
                'password' => 'LGkp1993',
                'port' => '25',
                'encryption' => 'tls',
                'streamOptions' => [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ],
         /*   'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.envio.ba.gov.br',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'adelson.santos@adab.ba.gov.br',
                'password' => 'LGkp1993',
                'port' => '25', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],*/
        ],
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'plugins' => [
                [
                    'class' => 'Swift_Plugins_ThrottlerPlugin',
                    'constructArgs' => [20],
                ],
            ],
        ],
/*        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class'         => 'Swift_SmtpTransport',
                'host'          => 'envio.ba.gov.br',
                'username'      => 'adelson.santos@adab.ba.gov.br',
                'password'      => 'LGkp1993',
                'port'          => '25',
                'encryption'    => 'ssl',
            ],
        ],*/
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
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'apicomputador'],
            ],
        ],
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
        'allowedIPs' => ['*', '::1'],
    ];
}

return $config;
