<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Itemdiscount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itemdiscount-form">

    <?php $form = ActiveForm::begin(); 
    $items= \app\models\Item::find()->all();
    $items =\yii\helpers\ArrayHelper::map($items,'id','label');
    echo $form->field($model, 'item_id')->dropDownList($items) ?>

    <?= $form->field($model, 'first_condition')->textInput() ?>

    <?= $form->field($model, 'second_condition')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
