<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

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
            'imagename',
            'created_at',
            'updated_at',
            [
                'attribute' => 'Image name',
                'format' => 'raw',
                'value' => function(\common\models\item $item) {
                    return '<img src="image?filename='.$item->imagename.'" width="50x" height="50px" >';
                },
            ],
        ],
    ]) ?>

</div>
