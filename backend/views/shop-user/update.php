<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopUser */

$this->title = 'Update Shop User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shop Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>