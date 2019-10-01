<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufacturers-form">

    <div class="card">
    <?php $form = ActiveForm::begin(['id' => 'saving']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
    <?=$form->field($model, 'img')->widget(FileInput::classname(), [
        'options' => ['accept' => 'web/img/manufactures/'],
    ]);
//            VarDumper::dump($model,10,1);?>
        <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
