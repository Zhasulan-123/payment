<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%paying}}".
 *
 * @property int $id
 * @property string $name
 * @property int $sum
 * @property int $order_number
 * @property int $signature
 * @property datetime $created_ad
 */
class Paying extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%paying}}';
    }

    /**
     * {@inheritdoc}
     * Add session sum & count
     */
    public function addSum($data, $count = 1)
    {
        $_SESSION['paying'][$data['id']] = [
            'count' => $count,
            'name' => $data['name'],
            'sum' => $data['sum'],
            'order_number' => $data['order_number'],
            'signature' => $data['signature'],
        ];

        $_SESSION['paying.count'] = isset($_SESSION['paying.count']) ? $_SESSION['paying.count'] + $count : $count;
        $_SESSION['paying.price'] = isset($_SESSION['paying.price']) ? $_SESSION['paying.price'] + $count * $data['sum'] : $count * $data['sum'];
    }

    /**
     * {@inheritdoc}
     * Calculator sum & count
     */
    public function sumсalc($id){

        if(!isset($_SESSION['paying'][$id])) return false;
        
        $countMinus = $_SESSION['paying'][$id]['count'];

        $sumMinus = $_SESSION['paying'][$id]['count'] * $_SESSION['paying'][$id]['sum'];

        $_SESSION['paying.count'] -= $countMinus;

        $_SESSION['paying.price'] -= $sumMinus;

        unset($_SESSION['paying'][$id]);

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sum', 'order_number', 'created_ad'], 'required'],
            [['sum', 'order_number', 'signature'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

}
