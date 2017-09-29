<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/09/26
 * Time: 17:03
 */

namespace backend\controllers;


use yii\web\Controller;

class SayController extends Controller
{

    public function actionSay() {
        $message = "This is my first message from the controller class!";

        return $this->render('say', array('message' => $message));
    }

}