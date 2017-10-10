<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h4><?=Html::a('Upload', '/upload/upload') ?></h4>

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
//               [
//                   'class' => 'yii\grid\ActionColumn',
//                    'visible' => $isShopOwner
//               ],

        [
                'attribute' => 'Image',
                'format' => 'raw',
                'value' => function() {
                    return '<img src=" '.Yii::getAlias('/images/Rukacarara.png').' " width="50px" height="auto"/>';

                },
        ],

        [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                        'view' => function( $url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'title' => Yii::t('yii', 'view'),
                            ]);
                        }
                ]
        ],
        ],
        ];
    ?>

        <?= GridView::widget($options) ?>
</div>

