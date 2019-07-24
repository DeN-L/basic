<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property int $population
 * @property string $country_code
 *
 * @property Country $countryCode
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
            [['name', 'population', 'country_code'], 'required'],
            [['population'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['country_code'], 'string', 'max' => 2],
            [['country_code'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_code' => 'code']],
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
            'country_code' => 'Contry Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getcountryCode()
    {
        return $this->hasOne(Country::className(), ['code' => 'country_code']);
    }
}
