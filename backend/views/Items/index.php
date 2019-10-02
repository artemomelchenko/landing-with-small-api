<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::t('app', 'Товари');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a(Yii::t('app', 'Create Items'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card">
    <?=GridView::widget([
        'dataProvider' => $dataProviders,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',

            [
                'label'=>'',
                'format'=>'html',
                'content'=> function($model){
//        VarDumper::dump($model,10,1);
                    return  Html::a('<i class="fa fa-eye" aria-hidden="true">',[ '/items/item','id' => $model->id.'']);
                },
            ],
        ],
    ]); ?>

</div>
</div>
