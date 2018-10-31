<?php

namespace api\modules\v1\controllers;

use Yii;
use api\di\services\UserService;
use api\di\services\UserMenuService;
use api\controllers\ApiController;

class UserController extends ApiController
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var UserMenuService
     */
    private $userMenuService;

    /**
     * @var string
     */
    public $modelClass = 'api\modules\v1\models\UserModel';

    public function init()
    {
        parent::init();
        $this->userService = Yii::$container->get('mainUserService');
        $this->userMenuService = Yii::$container->get('concreteUserMenuService');
    }

    public function actionUserTest()
    {
        die(json_encode($this->userService->all()));
    }

    public function actionUserMenuTest()
    {
        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'message' => 'success',
                'data' => $this->userMenuService->all(),
                'code' => 200,
            ],
        ]);
    }

    public function actionGetToken()
    {
        return Yii::$app->security->generatePasswordHash('123');
    }

    public function actionTest()
    {
        die('user test');
    }

}
