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
        <div class="card-body">
            <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->


            <?= Html::a(Yii::t('app', 'Create Colors'), ['create'], ['class' => 'btn btn-success']) ?>


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
                        'value' => function ($model) {
                            return Html::tag('div', '', ['style' => "background:".$model->hex.";width:30px;height:30px;"]).$model->hex;
                        },
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
