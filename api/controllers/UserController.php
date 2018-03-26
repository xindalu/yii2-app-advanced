<?php

namespace api\controllers;

use Yii;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\UnauthorizedHttpException;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'login' => ['post'],
                    'logout' => ['post'],
                    'accessToken' => ['post'],
                ],
            ],
        ]); // TODO: Change the autogenerated stub
    }

    public function actions()
    {
        return parent::actions(); // TODO: Change the autogenerated stub
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return [
                'status' => 200,
                'message' => 'success',
            ];
        } else {
            throw new UnauthorizedHttpException();
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return [
            'status' => 200,
            'message' => 'success',
        ];
    }

    public function actionAccessToken()
    {
        $expire = time() + Yii::$app->params['user.passwordResetTokenExpire'];
        return [
            'access_token' => Yii::$app->security->generateRandomString() . '_' . $expire,
            'status' => 200,
        ];
    }
}
