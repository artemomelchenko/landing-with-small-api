<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ManufacturersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Manufacturers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturers-index">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
    <div class="card">
        <div class="card-body">
            <?= Html::a(Yii::t('app', 'Create Manufacturers'), ['create'], ['class' => 'btn btn-success']) ?>


            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'name',
                    [
                        'attribute' => 'img',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img('/img/manufacturers/' . $data->img, [
                                'alt' => 'Виробник',
                                'style' => 'width:150px;'
                            ]);
                        },
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
