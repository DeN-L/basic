<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;

    public $url;

    public $title;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }

        if ($this->url === null) {
            $this->url = '#';
        }

        if ($this->title === null) {
            $this->title = 'Mega title && new_branch';
        }
    }

    public function run()
    {
        return Html::a($this->message, $this->url, [
            'class' => 'btn btn-primary',
            'target' => '_blank',
            'title' => $this->title
        ]);
    }
}