<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leads */

$this->title =Yii::$app->formatter->asDate( $model->date_create);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//VarDumper::dump($model,10,1);
?>
<div class="leads-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<div class="card">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'attribute'=>'date_create',
                'format'=>['DateTime','php:H:i:s - d.m.Y ']
            ],
            'form_name',
            'name',
            'phone',
            'leadsSettings.manufacturer',
            'leadsSettings.thickness',
            'leadsSettings.square',
            'leadsSettings.comment',


        ],
    ]) ?>
</div>
</div>