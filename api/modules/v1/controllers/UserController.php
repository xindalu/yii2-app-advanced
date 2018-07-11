<?php

namespace api\modules\v1\controllers;

use Yii;
use common\models\LoginForm;
use api\di\services\UserService;
use api\di\services\UserMenuService;

class UserController extends BaseController
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

    public function actionLogin()
    {
        $model = new LoginForm();
        return $model->load(Yii::$app->request->post()) && $model->login();
    }

    public function actionLogout()
    {

    }

    public function actionUserTest()
    {
        die(json_encode($this->userService->all()));
    }

    public function actionUserMenuTest()
    {
//        return $this->userMenuService->all();
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

}
