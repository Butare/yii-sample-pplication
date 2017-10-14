<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/14
 * Time: 11:40
 */

namespace common\models;

use Yii;

define("IMAGE_DIRECTORY_NAME", 'images');


//for the general purpose functions and constants
class Utils
{

    public static function getImagePath()
    {

        return Yii::getAlias('@common') . DIRECTORY_SEPARATOR . IMAGE_DIRECTORY_NAME . DIRECTORY_SEPARATOR;
    }


}