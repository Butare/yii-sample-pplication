<?php

namespace frontend\controllers;

use backend\models\ShopInterface;
use Yii;
use common\models\item;
use common\models\shop;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ItemController implements the CRUD actions for item model.
 */
class ItemController extends Controller
{

    private $current_user_shop_id;
    private $access_denied_msg;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $this->current_user_shop_id = Yii::$app->user->identity;

        return [

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete', 'add'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' =>['@'],
                    ],

                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all item models for a shop user.
     * @return mixed
     */
    public function actionIndex($accessErrorMsg = null, $isShopOwner = false)
    {
        if (Yii::$app->user->isGuest || !$this->current_user_shop_id->shopId) {
            return $this->goHome();
        }

        $shopId = $this->current_user_shop_id->shopId;
        $isShopOwner = true;

        $dataProvider = new ActiveDataProvider([
            'query' => item::getItemByShopId($shopId),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider, 'message' => $accessErrorMsg, 'isShopOwner' => $isShopOwner
        ]);

    }

    /**
     * Displays a single item model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        // let only the shop owner be able to create the shop.

        $shopModel = null;

        if ($this->current_user_shop_id->shopId) {
             $shopModel = Shop::findOne(['id' =>$this->current_user_shop_id->shopId]);
         }

        if (!$shopModel){
            return $this->actionIndex("Sorry, Access Permission Denied");
        }

        $model = new item();

        $model ->shopId = $this->current_user_shop_id->shopId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model, 'shopList' => $this->getShop(),
            ]);
        }
    }

    /**
     * Updates an existing item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->shopId)
            Yii::trace($this->current_user_shop_id->shopId, 'debug');

        if (!$model->shopId || $this->current_user_shop_id->shopId != $model->shopId){
            $message = "Sorry, Access Permission Denied, Please try again.";
            return $this->actionIndex($message);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model, 'shopList' => $this->getShop()
            ]);
        }
    }

    /**
     * Deletes an existing item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (!$model->shopId || $this->current_user_shop_id->shopId != $model->shopId){
            return $this->actionIndex("Sorry, Access Permission Denied");
        }
        $this->$model->delete();

        return $this->redirect(['index']);
    }



    // get items list by shop model's id
    public function actionList($message = null) {

        $isShopOwner = false;

        // get shopId from query string
        $shopId = Yii::$app->request->queryString;

        if (!Yii::$app->user->isGuest && $this->current_user_shop_id->shopId) {

            // check whether the shopId of clicked shop and the login user match
            $isShopOwner = ($shopId == $this->current_user_shop_id->shopId) ? true : false;

        }

        $dataProvider = new ActiveDataProvider([
            'query' => item::getItemByShopId($shopId),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider, 'message' => $message, 'isShopOwner' => $isShopOwner
        ]);

    }


    /**
     * Finds the item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
