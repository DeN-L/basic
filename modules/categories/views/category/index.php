<?php

use app\components\widgets\tree\TreeWidget;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\categories\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'description:ntext',
            [
                'attribute' => 'parent_id',
                'value' => 'parent.name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= TreeWidget::widget([
        'o_model' => $searchModel,
        'text_url' => '/categories/category/view?id='
    ]) ?>


</div>
