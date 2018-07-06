<?php

namespace api\modules\v1\controllers;

class UserController extends BaseController
{
    private $userService;

    public $modelClass = 'api\modules\v1\models\User';

    public function init()
    {
        parent::init();
        $this->userService = \Yii::$container->get('userService');
    }

    public function actionTest()
    {
        echo $this->userService->all();
        die(' test user');
    }

}
