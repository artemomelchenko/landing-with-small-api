<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Leads */
$this->title = Yii::t('app', 'Leads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-index">
    <div class="card">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'date_create',
                        'format' => ['DateTime', 'php:H:i:s - d.m.Y ']
                    ],
                    'form_name',
                    'name',
                    'phone',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                    ],
                ]
            ]); ?>
        </div>
    </div>
</div>
