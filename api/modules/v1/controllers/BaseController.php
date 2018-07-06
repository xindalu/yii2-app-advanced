<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Response;

class BaseController extends ActiveController
{
    // Serialize response data
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * GET http://api.eoa.com/v1/users?access-token=123
     */
    public function behaviors() {
        return ArrayHelper::merge (parent::behaviors(), [
            'authenticator' => [
                // CompositeAuth is an action filter that supports multiple authentication methods at the same time
                'class' => CompositeAuth::className(),
                'authMethods' => [
                    HttpBasicAuth::className(),
                    HttpBearerAuth::className(),
                    QueryParamAuth::className(),
                ],
            ],
            'contentNegotiator' => [
                'formats' => [
                    'text/html' => Response::FORMAT_JSON,
                ],
            ],
        ]);
    }

    public function actionVersion()
    {
        die('V 1.0.0');
    }
}
