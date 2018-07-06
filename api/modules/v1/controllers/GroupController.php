<?php

namespace api\modules\v1\controllers;

use api\modules\v1\logic\GroupLogic;
use api\modules\v1\models\Group;

class GroupController extends BaseController
{
    public $modelClass = 'api\modules\v1\models\Group';

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
        $groupLogic = new GroupLogic(new Group());
        die($groupLogic->getRootGroup());
    }

}
