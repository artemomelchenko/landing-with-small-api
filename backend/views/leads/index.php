<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;
//use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Leads */
$this->title = Yii::t('app', 'Leads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <!--        --><? //= Html::a(Yii::t('app', 'Create Leads'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--    <div class="col-md-12">-->
        <div class="card">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
//                'bootstrap' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    [
                        'attribute'=>'date_create',
                        'format'=>['DateTime','php:H:i:s - d.m.Y ']
                    ],
                    'form_name',
                    'name',
                    'phone',
                    [
                        'label'=>'',
                        'format'=>'html',
                        'content'=> function($model){
                          return  Html::a('<i class="fa fa-eye" aria-hidden="true">',[ '/leads/view','id' => $model->id.'']);
                        },
                    ],

                ]
            ]); ?>
<!--        </div>-->
    </div>
</div>
