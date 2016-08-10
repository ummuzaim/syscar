<?php

use yii\grid\GridView;

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'employeeNumber',
        'firstName',
        'lastName',
        'email',
        // ...
    ],
    
]) ?>