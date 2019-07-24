<?php

use app\models\EntryForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$o_form = ActiveForm::begin();
?>

<?=
    /** @var EntryForm $o_model**/
    $o_form->field($o_model, 'text_name')->label('Имя');
?>
<?= $o_form->field($o_model, 'text_email')->label('Емаил'); ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary'])?>
</div>

<?php ActiveForm::end(); ?>