<?php

namespace app\components\widgets\tree;

use yii\web\AssetBundle;

class TreeAsset extends AssetBundle
{
    public $sourcePath = '@app/components/widgets/tree/assets';
    public $css = ['css/style.css'];
    public $js = ['js/script.js'];
    public $publishOptions = [
        'forceCopy'=>true,
    ];

}