<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    if ($isShopOwner) {?>
    <p style="color: red">
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::encode($message)?>
    </p>
    <?php } ?>

    <?php
        $options = [
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'shopId',
            ['class' => 'yii\grid\DataColumn',
                'attribute' => 'shopName',
                'format' => 'text',
                'value' => function(\common\models\item $item){
                    return  $item->getShopName();
                },
            ],
            'name',
            'price',
            //'quantity',
            ['class' => 'yii\grid\DataColumn',
                'attribute' => 'quantity',
                'format' => 'text',
                'value' => function(\common\models\item $item){
                    return  number_format($item->quantity);
                },
            ],
            'imagename',
            [
                'attribute' => 'Image name',
                'format' => 'raw',
                'value' => function(\common\models\item $item) {
                    return '<img src="image?filename='.$item->imagename.'" width="50x" height="50px" >';
                },
            ],
               [
                   'class' => 'yii\grid\ActionColumn',
                   'visible' => $isShopOwner,
               ],

        ],
        ];
    ?>

        <?= GridView::widget($options) ?>
</div>