<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php

    $arr = new \common\models\Shop();

    // get shop names and their ids
    foreach( $arr->getShopNames() as $ar) {   ?>

        <?= Html::a($ar['name'], ['/item/list?'.$ar['id']], ['class' => 'btn btn-primary btn-block']) ?>

    <?php } ?>

</div>
