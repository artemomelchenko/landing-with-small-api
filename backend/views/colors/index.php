<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ColorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Colors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colors-index">
    <div class="card">
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Create Colors'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
             [
                'attribute' => 'hex',
                'format' => 'html',
                'label' => 'Колір',
                'value' => function ($model) {
                return '<div style = background:'.$model->hex.';width:30px;height:30px;></div>'.$model->hex.'';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>
</div>
