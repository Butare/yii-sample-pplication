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

    function rules() {
        return [
            [['imageFile'], 'file' , 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public  function upload() {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@common/images/'. $this->imageFile->baseName . '.' .$this->imageFile->extension));
            Yii::trace("The image instance in saveAs : $this->imageFile", 'debug');
            return true;
        } else {
            return false;
        }
    }

    public static function getImagePath() {
        return '/common/images/Rukacarara.png';
    }
}