<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orderdetails */

$this->title = $model->orderNumber;
$this->params['breadcrumbs'][] = ['label' => 'Orderdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'orderNumber' => $model->orderNumber, 'productCode' => $model->productCode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'orderNumber' => $model->orderNumber, 'productCode' => $model->productCode], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'orderNumber',
            'productCode',
            'productCode0.productName',
            'quantityOrdered',
            'priceEach',
            'orderLineNumber',
        ],
    ]) ?>

</div>
