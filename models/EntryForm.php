<?php

namespace app\models;

use yii\base\Model;

/**
 * EntryForm is the model behind the entry form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class EntryForm extends Model
{
    public $text_name;
    public $text_email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['text_name', 'text_email'], 'required'],
            ['text_name', 'string', 'length' => [4, 10]],
            ['text_email', 'email', 'message' => 'Неверный емаил!'],
        ];
    }
}