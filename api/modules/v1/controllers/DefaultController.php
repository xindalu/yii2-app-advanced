<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMessage($id = 0, $message = 'default')
    {
        return $this->render('message', [
            'id' => $id,
            'message' => $message,
        ]);
    }

    public function actionJson($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'message' => 'success',
            'code' => 200,
        ];
    }
}
