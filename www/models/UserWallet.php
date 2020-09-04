<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_wallet}}".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $sum
 * @property int $commision
 * @property string $created_at
 */
class UserWallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_wallet}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'sum', 'commision', 'created_at'], 'required'],
            [['user_id', 'sum', 'commision'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

}
