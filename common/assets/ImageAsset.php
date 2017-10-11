<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/11
 * Time: 10:32
 */

namespace common\assets;


use yii\web\AssetBundle;

class ImageAsset extends AssetBundle
{
    public $sourcePath = '@common/images';

    public $publishOptions = [
        'only' => [
            'images/',
        ]
    ];

}