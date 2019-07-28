<?php

use app\modules\categories\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\categories\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php
        $form = ActiveForm::begin();
        /** @var $categories array */
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_category')->dropDownList($categories) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
