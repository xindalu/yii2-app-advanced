<?php

namespace api\di\data\db;

use Yii;
use yii\db\Connection;

abstract class BaseDb
{
    protected $db;

    /**
     * @return Connection
     * @throws \yii\base\InvalidConfigException
     */
    protected function getMainDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @return Connection
     * @throws \yii\base\InvalidConfigException
     */
    protected function getConcreteDb()
    {
        return Yii::$app->get('concrete');
    }
}
