<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/09/27
 * Time: 12:52
 */

namespace app\models;


use yii\db\ActiveRecord;

class SearchItem extends ActiveRecord
{
    public $itemName;

    public static function tableName()
    {
        return 'items';
    }
}