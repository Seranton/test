<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Itemdiscount */

$this->title = 'Update Itemdiscount: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Itemdiscounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="itemdiscount-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
