<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Cm2pVvPMwAQrAfN9qF2rgeNfFeyqBwfA',
            'parsers' => [
        'application/json' => 'yii\web\JsonParser',
        ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'enableSession'   => false,
    'loginUrl'        => null
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'alumno'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'asistencia'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'curso'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'entrega'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'estado-asistencia'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'evaluacion'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'participacion'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'profesor'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'usuario-logro'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'tipo-evaluacion'],
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
