<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model common\models\Colors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colors-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'hex')->widget(ColorInput::classname(), [
                'options' => ['placeholder' => 'Выберите цвет ...'],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>