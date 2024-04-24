<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $client_id
 * @property string|null $photo
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'client_id'], 'required'],
            [['price'], 'number'],
            [['client_id'], 'integer'],
            [['name'], 'string', 'max' => 120],
            [['photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'client_id' => Yii::t('app', 'Client ID'),
            'photo' => Yii::t('app', 'Photo'),
        ];
    }
}
