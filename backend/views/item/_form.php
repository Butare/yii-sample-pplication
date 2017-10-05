<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\Shop;

/* @var $this yii\web\View */
/* @var $model app\models\item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php
    $arr = [
          ['id' => '123', 'name' =>'aab'],
          ['id' => '456', 'name' =>'kigali']
    ];

    $result =ArrayHelper::map($arr, 'id', 'name');
    ?>

    <?php $form = ActiveForm::begin(); ?>

         <!--?= $form->field($model, 'shopId')->dropDownList(
                    //ArrayHelper::map(Shop::find()->all(), 'id', 'name')
            $shopList, ['prompt' => 'Select shop']

            )? -->

    <!--?= $form->field($model, 'shopId')->textarea(['value' => '232', 'readonly' =>true]) ? -->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
