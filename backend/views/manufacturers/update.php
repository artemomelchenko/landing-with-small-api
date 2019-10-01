<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturers */

$this->title = Yii::t('app', 'Update Manufacturers: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Manufacturers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="manufacturers-form">

    <div class="card">
        <?php $form = ActiveForm::begin(['id' => 'saving']); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'img')->widget(FileInput::classname(), [
            'options' => ['accept' => 'web/img/manufactures/'],
            'pluginOptions' => [
                'initialPreview'=>[
                    isset($model->img) ? Html::img('/img/manufacturers/' . $model->img, ['style' => 'width:200px;']) : ''
                ],
                'showRemove' => false,
                'overwriteInitial'=>true
            ]
        ]); ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
