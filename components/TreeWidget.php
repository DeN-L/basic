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
     * @var string
     */
    public $text_url = '';

    /**
     * All items for tree structure.
     *
     * @var array
     */
    private $a_items_all = [];

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        $this->a_items_all = $this->o_model->find()->asArray()->all();
    }

    /**
     * @param null|string $k_parent_id Primary key of parent category.
     * @return string
     */
    private function _listCreator($k_parent_id = null)
    {
        // Finds child items for $k_parent_id.
        $a_child_items = $this->_getChild($k_parent_id);

        if($a_child_items)
        {
            return Html::ul($a_child_items, ['item' => function ($a_item) {
                // Creates child ul.
                $html_child_ul = $this->_listCreator($a_item['id']);

                // Creates link for parent item.
                $html_parent_link = Html::a($a_item['name'], strtolower($this->text_url) . $a_item['id']);

                return Html::tag('li', $html_parent_link . $html_child_ul);
            }]);
        }
        return '';
    }

    /**
     * Child items for parent id.
     *
     * @param null|string $k_parent_id
     * @return array
     */
    private function _getChild ($k_parent_id = null)
    {
        $a_child = [];
        foreach ($this->a_items_all as $a_item)
        {
            if($a_item['parent_id'] == $k_parent_id)
                $a_child[] = $a_item;
        }
        return $a_child;
    }


    public function run()
    {
        return $this->_listCreator();
    }
}