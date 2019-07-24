<?php

use yii\helpers\Html;

?>

<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Name:</label><?= Html::encode($o_model->text_name)?></li>
    <li><label>Email:</label><?= Html::encode($o_model->text_email)?></li>
</ul>
