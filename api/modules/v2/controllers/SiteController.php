<?php

namespace api\modules\v2\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `v2` module
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'message' => 'success',
            'code' => 200,
        ];
    }
}
