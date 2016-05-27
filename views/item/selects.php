<?php
$categories= \app\models\Category::find()->all();
$items = [null=>'Не установлена']+\yii\helpers\ArrayHelper::map($categories,'id','label');
foreach ($data as $value){
    echo \yii\helpers\Html::dropDownList('Category[]', $value->category_id,$items, ['class'=>'form-control select-resized', 'onchange'=> 'updateselect(this)']);
}
echo \yii\helpers\Html::dropDownList('Category[]', 0,$items,['class'=>'form-control select-resized','onchange'=> 'updateselect(this)','onfocus'=>'makenew(this)']);
$this->registerJs('
  function updateselect(select) {
      if (!$(select).val()){
            $(select).remove();
      }
      else {
        
         $("select[name^=Category]").not(select).each(function(){
            if ($(this).val()==$(select).val()) {
                $(select).remove();
            }
         });
      }
      }
  function makenew(select) {
        if ($(select).hasClass("added")){
              return false;
          }
          else {
            $(select).parent().append($(select).clone());
            $(select).addClass("added")
          }
      
      }
    ',\yii\web\View::POS_END);
  ?>

