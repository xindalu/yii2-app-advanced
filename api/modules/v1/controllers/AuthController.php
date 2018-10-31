<?php
/**
 * Created by PhpStorm.
 * User: leon
 * Date: 2018/10/30
 * Time: 14:56
 */
namespace api\modules\v1\controllers;

use api\models\LoginForm;
use yii\web\Response;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionLogin()
    {
//        var_dump(Yii::$app->params['tokenExpire']);
//        die;
        if (!Yii::$app->user->isGuest) {
            die('已登录');
        }

        $model = new LoginForm();
        if ($model->load(['LoginForm' => Yii::$app->request->post()]) && $token = $model->login()) {
            return Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => Response::FORMAT_JSON,
                'data' => [
                    'message' => 'success',
                    'access_token' => $token,
                    'cache_test' => Yii::$app->cache->get($token),
                    'code' => 200,
                ],
            ]);
        } else {
            $model->password = '';

            die('222');
        }
    }

    public function actionTest()
    {
        var_dump(Yii::$app->cache->get(Yii::$app->request->post('token')));
        die;
    }

    private function generateToken()
    {
        $token = md5(Yii::$app->security->generateRandomString());
        Yii::$app->cache->set($token, Yii::$app->user->getId(), 15);
        return $token;
    }
}
