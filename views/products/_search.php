<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'productCode') ?>

    <?= $form->field($model, 'productName') ?>

    <?= $form->field($model, 'productLine') ?>

    <?= $form->field($model, 'productScale') ?>

    <?= $form->field($model, 'productVendor') ?>

    <?php // echo $form->field($model, 'productDescription') ?>

    <?php // echo $form->field($model, 'quantityInStock') ?>

    <?php // echo $form->field($model, 'buyPrice') ?>

    <?php // echo $form->field($model, 'MSRP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
