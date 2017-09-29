<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/09/27
 * Time: 11:15
 */

namespace app\models;


use yii\base\Model;

class SearchItemForm extends Model
{
    public $itemName;


    public function rules()
    {
        return [
            ['itemName', 'required']
        ];
    }

}