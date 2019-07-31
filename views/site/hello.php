<?php

/* @var $this yii\web\View */
/* @var $text_msg string */

use app\components\HelloWidget;
use yii\helpers\Html;

$this->title = 'Hello';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::encode($text_msg) ?>
    </p>

    <?= HelloWidget::widget(['message' => 'Good morning', 'url' => 'http://yandex.ru']) ?>
    <br>
    <br>
    <br>
    <?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>

</div>
