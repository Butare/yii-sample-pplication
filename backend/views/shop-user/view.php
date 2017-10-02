<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ShopUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shop Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'shop_id',
            [
                'class' => '\yii\grid\DataColumn',
                'attribute' => 'shopName',
                'format' => 'text',
                'value' => function(\app\models\ShopUser $s_user){
                    return $s_user->getShopNames();
                }
            ],
            'first_name',
            'last_name',
            'username',
            'password',
            'status',
        ],
    ]) ?>

</div>
