<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>


            <?= Html::a(Yii::t('app', 'Create Items'), ['create', 'id' => Yii::$app->request->get('id')], ['class' => 'btn btn-success']) ?>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'name',
                    'length',
                    'height',
                    'full_weight',
                    'weight',
                    //'id_categories',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open"></span>',
                                    '/admin/items/view?category_id=' . $model->id_categories . '&id=' . $model->id);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>