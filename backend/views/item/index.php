<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="color: red">
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::encode($message)?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'shopId',
            ['class' => 'yii\grid\DataColumn',
                'attribute' => 'shopName',
                'format' => 'text',
                'value' => function(\app\models\item $item){
                    return  $item->getShopName();
                },
            ],
            'name',
            'price',
            //'quantity',
            ['class' => 'yii\grid\DataColumn',
                'attribute' => 'quantity',
                'format' => 'text',
                'value' => function(\app\models\item $item){
                    return  number_format($item->quantity);
                },
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
