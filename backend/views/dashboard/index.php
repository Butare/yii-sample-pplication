<?php
use yii\helpers\Html;

?>

<html>
<head>
    <title>Multi-tenant shop</title>
</head>

<body style="padding-top: 50px;">
    <?php echo "<h1> Welcome to the Multi-tenant shop  </h1>";
    ?>

<div class=".container-fluid">

    <?php

        $arr = new \app\models\Shop();

        foreach( $arr->getShopNames() as $ar) {   ?>

            <?= Html::a($ar['name'], ['//'], ['class' => 'btn btn-primary btn-block']) ?>

        <?php } ?>
</div>


</body>

</html>



