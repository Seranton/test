<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ;
    $items= \app\models\Category::find();
    if (!empty($model->id)) $items->andWhere('id<>'.$model->id);
    $items =[null=>'Нет родителя']+\yii\helpers\ArrayHelper::map($items->all(),'id','label');
    echo $form->field($model, 'parent_id')->textInput()->dropDownList($items); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
