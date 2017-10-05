<?php
use yii\helpers\Html;

?>

<html>
<head>
    <title>Multi-tenant shop</title>
</head>

    <?php echo "<h1> Welcome to the Multi-tenant shop  </h1>";
    ?>

<div class=".container-fluid">

    <?php

        $arr = new \app\models\Shop();

        // get shop names and their ids
        foreach( $arr->getShopNames() as $ar) {   ?>

            <?= Html::a($ar['name'], ['/item/list?'.$ar['id']], ['class' => 'btn btn-primary btn-block']) ?>

        <?php } ?>
</div>

</html>



