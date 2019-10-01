<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Colors */

$this->title = Yii::t('app', 'Create Colors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colors-create">
    <div class="card">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
