<?php

namespace app\components;

use yii\base\Widget;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * Class TreeWidget can be used for make tree of some parent-child items.
 * @package app\components
 */
class TreeWidget extends Widget
{
    /**
     * @var ActiveRecord
     */
    public $o_model;

    /**
     * @param $k_parent_id int Primary key of parent category.
     * @return string
     */
    private function listCreator($k_parent_id = null)
    {
        $a_parent_items = $this->o_model->find()->where(['parent_id' => $k_parent_id])->asArray()->all();
        return Html::ul($a_parent_items, ['item' => function($a_item) {
            // Checks if parent item has child.
            $k_item = $a_item['id'];
            $o_child_item = $this->o_model->find()->where(['parent_id' => $k_item])->one();

            // Creates child ul if it need.
            $text_child_ul = '';
            if($o_child_item)
                $text_child_ul = $this->listCreator($k_item);

            return Html::tag('li', $a_item['name'].$text_child_ul);
        }]);
    }

    public function run()
    {
        return $this->listCreator();
    }
}