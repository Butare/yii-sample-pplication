<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/10
 * Time: 12:35
 */

use yii\widgets\ActiveForm;
?>

<?php   $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


<?= $form->field($model, 'imageFile')->fileInput() ?>

<p style="color: green">
    <button style="color: #0f0f0f">Submit</button>
    <?=\yii\helpers\Html::encode($message) ?>
</p>


<?php ActiveForm::end() ?>


