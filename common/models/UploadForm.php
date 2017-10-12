<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/10
 * Time: 12:24
 */

namespace common\models;


use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }


    /**
     * @param $name  -- new item name formatted as - 'itemId'
     * @return bool
     */
    public function upload($name)
    {
        if ($this->validate()) {

            $this->imageFile->saveAs
            (
                Yii::getAlias('@common') .
                DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR .
                $name . '.' . $this->imageFile->extension
            );

            return true;

        } else {
            return false;
        }
    }

}