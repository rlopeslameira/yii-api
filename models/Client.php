<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name
 * @property string $cpf
 * @property string $zip_code
 * @property string $address
 * @property string $number
 * @property string $city
 * @property string $state
 * @property string|null $complement
 * @property string|null $photo
 * @property string $gender
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cpf', 'zip_code', 'address', 'number', 'city', 'state', 'gender'], 'required'],
            [['name', 'address'], 'string', 'max' => 120],
            [['cpf'], 'string', 'max' => 14],
            [['zip_code'], 'string', 'max' => 8],
            [['number'], 'string', 'max' => 20],
            [['city', 'complement'], 'string', 'max' => 60],
            [['state'], 'string', 'max' => 2],
            [['photo'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
            [['cpf'], 'unique'],
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
            'cpf' => Yii::t('app', 'Cpf'),
            'zip_code' => Yii::t('app', 'Cep'),
            'address' => Yii::t('app', 'Logradouro'),
            'number' => Yii::t('app', 'Numero'),
            'city' => Yii::t('app', 'Cidade'),
            'state' => Yii::t('app', 'Estado'),
            'complement' => Yii::t('app', 'Complemento'),
            'photo' => Yii::t('app', 'Photo'),
            'gender' => Yii::t('app', 'Gender'),
        ];
    }
}
