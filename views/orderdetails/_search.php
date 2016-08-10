<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderdetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderNumber') ?>

    <?= $form->field($model, 'productCode') ?>

    <?= $form->field($model, 'quantityOrdered') ?>

    <?= $form->field($model, 'priceEach') ?>

    <?= $form->field($model, 'orderLineNumber') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
