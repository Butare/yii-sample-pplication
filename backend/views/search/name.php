<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/09/27
 * Time: 11:53
 */

use \yii\helpers\Html;
use \yii\widgets\ActiveForm;

?>

<?php
echo "<br>";
echo "<br>";
echo "<br>";

?>



<?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'itemName')?>

   <?= Html::submitButton('Search IT', ['name'=>'submit', 'value'=>'btnSearch','class' => 'btn btn-primary']) ?>
   <?= Html::submitButton('Send', ['name'=>'submit', 'value'=>'btnSend','class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>

