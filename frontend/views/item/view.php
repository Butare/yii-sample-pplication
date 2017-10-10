<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\item */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'shopId',
            [
                    'class' => '\yii\grid\DataColumn',
                    'attribute' => 'shopName',
                    'format' => 'text',
                    'value' => function(\common\models\item $item){
                        return $item->getShopName();
                    }
            ],
            'name',
            'price',
            'quantity',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
