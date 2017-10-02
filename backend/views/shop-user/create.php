<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopUser */

$this->title = 'Create Shop User';
$this->params['breadcrumbs'][] = ['label' => 'Shop Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'statusList' => $statusList,
    ]) ?>

</div>
