<?php

namespace api\modules\v1\controllers;

use api\controllers\ApiController;

class GroupController extends ApiController
{
    public $modelClass = 'api\modules\v1\models\GroupModel';

//    /**
//     * Remove restful action to rewrite
//     * @return array
//     */
//    public function actions()
//    {
//        $actions = parent::actions();
//        unset($actions['delete'], $actions['update']);
//
//        return $actions;
//    }

    /**
     * Test action
     */
    public function actionTest()
    {
        die('123');
    }

}
