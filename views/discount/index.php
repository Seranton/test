<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Itemdiscounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itemdiscount-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Itemdiscount', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{summary}{items}{pager}',
    'summary' => 'Показаны записи <strong>{begin}-{end}</strong> из <strong>{totalCount}</strong>.',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [                      
            'label' => 'Товар',
            'value' => 'itemName.label',
            ],
        'first_condition',
        'second_condition',
        'discount',
        

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ],
]); ?>
<?php Pjax::end(); ?></div>
