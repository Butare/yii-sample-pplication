<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/10
 * Time: 12:40
 */

namespace frontend\controllers;

use Yii;
use common\models\UploadForm;
use yii\web\Controller;
use yii\web\UploadedFile;


class UploadController extends Controller
{
    public function actionUpload()
    {
        $message = null;

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            Yii::trace("The image instance is : $model->imageFile", 'debug');

            if ($model->upload($id = null)) {
                $message = "successfully uploaded";
            } else {
                $message = "Not uploaded";
            }
        }

        return $this->render('@app/views/item/upload', ['model' => $model, 'message' => $message]);
    }

}