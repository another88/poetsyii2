<?php
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
    'modules' => ['gii' => [
      'class' => 'yii\gii\Module',
      'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'] // adjust this to your needs
    ]
      ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'db' => [
          'class' => 'yii\db\Connection',
          'dsn' => 'mysql:host=bb827abd400c0f:0bedfd56@eu-cdbr-west-01.cleardb.com;dbname=heroku_90658a476471586',
          'username' => 'bb827abd400c0f',
          'password' => '0bedfd56',
          'charset' => 'utf8',
        ],
    ],
    'params' => $params,
];
