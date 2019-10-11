<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Товари');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <!--        --><? //= Html::a(Yii::t('app', 'Create Items'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviders,

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'name',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        'buttons' => [
                            'view' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open"></span>',
                                    '/admin/items/item?id='.$model->id);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
