<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orderdetails */

$this->title = 'Update Orderdetails: ' . $model->orderNumber;
$this->params['breadcrumbs'][] = ['label' => 'Orderdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orderNumber, 'url' => ['view', 'orderNumber' => $model->orderNumber, 'productCode' => $model->productCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
