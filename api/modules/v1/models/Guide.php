<?php

namespace api\modules\v1\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "guide".
 *
 * @property int $id
 * @property string $imgurl
 * @property int $status 1: active 0: inactive
 * @property int $flag 1: android 2:apple
 */
class Guide extends ActiveRecord implements IdentityInterface
{
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne([
            'access_token' => $token
        ]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guide';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imgurl', 'status', 'flag'], 'required'],
            [['status', 'flag'], 'integer'],
            [['imgurl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imgurl' => 'Imgurl',
            'status' => 'Status',
            'flag' => 'Flag',
        ];
    }
}
