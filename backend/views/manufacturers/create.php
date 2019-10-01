<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturers */

$this->title = Yii::t('app', 'Create Manufacturers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Manufacturers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturers-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="card">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
