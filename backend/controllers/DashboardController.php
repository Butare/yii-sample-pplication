<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/01
 * Time: 11:44
 */

namespace backend\controllers;


use yii\web\Controller;

class DashboardController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        return $this->render('login');
    }

}