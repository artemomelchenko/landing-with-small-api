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

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <div class="card">
        <?= Html::a(Yii::t('app', 'Create Items'), ['create', 'id' => Yii::$app->request->get('id')], ['class' => 'btn btn-success']) ?>

<?php \yii\helpers\VarDumper::dump(Yii::$app->request->get('id'),10,1) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'length',
            'height',
            'full_weight',
            'weight',
            //'id_categories',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>
</div>