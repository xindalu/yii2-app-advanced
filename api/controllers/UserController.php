<?php

namespace api\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    public function actionLogin()
    {
        echo 'login';die;
    }
}
