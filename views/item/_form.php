<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>
    <div class="form-group">
        <?=$this->context->renderpartial('selects',['data'=>$model->itemCategories])?>
    </div>
    <div class="form-group">
        <?php foreach ($model->itemImages as $image) {
          echo '<label><img class="imageitem" src="../'.$image->url.'"><input class="checkimage" onchange="updateimage(this)" type="checkbox" name="Image[]" value="'.$image->id.'"></label>';
        }?>
        <?= $form->field($model, 'images[]')->label('Загрузить новые изображения')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        
    </div>
         
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
   
    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs('
  function updateimage(checkbox) {
        if ($(checkbox).is(":checked")){
          $(checkbox).parent().find("img").css("opacity",0.2);
        }
        else {
            $(checkbox).parent().find("img").css("opacity",1);
        }
        
      }
  
    ',\yii\web\View::POS_END);
?>