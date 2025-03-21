<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;


class EstadoAsistenciaController extends ActiveController
{
    public $modelClass = 'app\models\EstadoAsistencias';
    public function behaviors()
{
    $behaviors = parent::behaviors();

    unset($behaviors['authenticator']);

    $behaviors['corsFilter'] = [
        'class' => \yii\filters\Cors::className(),
        'cors' => [
            'Origin'                           => ['http://localhost:8100','http://localhost:8101'],
            'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'DELETE'],
            'Access-Control-Request-Headers'   => ['*'],
            'Access-Control-Allow-Credentials' => true,
            'Access-Control-Max-Age'           => 600
        ]
    ];
    //unset($behaviors['authenticator']);
    $behaviors['authenticator'] = [
        'class' => CompositeAuth::className(),
        'authMethods' => [
            HttpBearerAuth::className(),
        ],
        'except' => ['index', 'view']
    ];

    return $behaviors;
}
public $enableCsrfValidation = false;


}