<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/09/27
 * Time: 11:20
 */

namespace backend\controllers;


use app\models\SearchItemForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;
use app\models\item;



class SearchController extends Controller
{


    public function actionItem() {
        $model = new SearchItemForm();

        $model->load(Yii::$app->request->post());   // populate the model with submitted model attributes values

        if (Yii::$app->request->isPost && $model->validate()){

            switch(Yii::$app->request->post('submit')){
                case 'btnSearch' :
                    $dataProvider = new ActiveDataProvider([
                        'query' => item::find()->where(['name' => $model->itemName]),
                    ]);
                    return $this->render('item-list',['dataProvider' => $dataProvider]);
                 break;

                case 'btnSend' :
                    return $this->render('item-detail', ['model' => $model]);
                    break;

                default:
                    return $this->render('name', ['model' => $model]);
                    break;
            }

        }else{
            return $this->render('name', ['model' => $model]);
        }

    }

}