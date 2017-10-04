<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/01
 * Time: 11:44
 */

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class DashboardController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'index'],
                        'allow' => true
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


//    public function actions()
//    {
//        return [
//            'error' => ['yii\web\ErrorAction'],
//        ];
//    }

    public function actionError() {
        return $this->render('error');
    }


    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goBack();
        }else {
            return $this->render('login',['model' => $model]);
        }
    }


    /**
     * @return \yii\web\Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}