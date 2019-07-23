<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property int $population
 * @property string $contry_code
 *
 * @property Country $contryCode
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'population', 'contry_code'], 'required'],
            [['population'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['contry_code'], 'string', 'max' => 2],
            [['contry_code'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['contry_code' => 'code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'population' => 'Population',
            'contry_code' => 'Contry Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContryCode()
    {
        return $this->hasOne(Country::className(), ['code' => 'contry_code']);
    }
}
