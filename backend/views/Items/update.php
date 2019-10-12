<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Items */
/* @var $colors common\models\Colors */
/* @var $manufacturers common\models\Manufacturers */
/* @var $itemsSettings common\models\ItemsSettings */
/* @var $itemsImg common\models\ItemsImg */

$this->title = Yii::t('app', 'Update Items: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'colors' => $colors,
        'manufacturers' => $manufacturers,
        'itemsSettings' => $itemsSettings,
        'itemsImg' => $itemsImg,
    ]) ?>

</div>
