<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Items */
/* @var $colors common\models\Colors */
/* @var $form yii\widgets\ActiveForm */
/* @var $manufacturers common\models\Manufacturers */
/* @var $itemsSettings common\models\ItemsSettings */
/* @var $itemsImg common\models\ItemsImg */
?>

<div class="container-fluid">
    <div class="card">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>
        <div class="card-body">
            <div class="row border-bottom callout callout-info">
                <div class="col-md-12">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($colors as $k => $color): ?>
                    <div class="row border-bottom callout callout-info">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $color->name ?>
                                    <?= $form->field($color, 'boolean['.$color->id.']')->checkbox()->label(false) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= Html::tag('div', '', ['style' => "background:".$color->hex.";width:50px;height:50px;"]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <?= $form->field($itemsImg[$k], 'img['.$color->id.']')->widget(FileInput::classname(), [
                              'options' => ['accept' => 'image/*'],
                                'pluginOptions' => [
                                    'initialPreview'=>[
                                        isset($itemsImg[$k]->img) ? Html::img("/img/items/" . $itemsImg[$k]->img, ['style' => 'width:200px;']) : ''
                                    ],
                                    'showPreview' => true,
                                    'showCaption' => false,
                                    'showRemove' => false,
                                    'showUpload' => true
                                ]
                            ]); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-12  border-bottom callout callout-info">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'full_weight')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $counter = 0 ?>
            <?php foreach ($manufacturers as $key => $manufacturer): ?>
                <div class="row border-bottom callout callout-info">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <?= ++$counter ?>. <?= $manufacturer->name ?>
                                <?= Html::img('/img/manufacturers/' . $manufacturer->img, [
                                    'alt' => 'Виробник',
                                    'style' => 'width:150px;'
                                ]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2">
                                <?= $form->field($itemsSettings[$key], 'zinс['.$manufacturer->id.']')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $form->field($itemsSettings[$key], 'price['.$manufacturer->id.']')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $form->field($itemsSettings[$key], 'garanty['.$manufacturer->id.']')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-1">
                                <?= $form->field($itemsSettings[$key], 'premium['.$manufacturer->id.']')->checkbox() ?>
                            </div>
                            <div class="col-md-5">
                                <?= $form->field($itemsSettings[$key], 'premium_text['.$manufacturer->id.']')->textarea() ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="row border-bottom callout callout-info">
                <div class="col-md-12">
                    Заполнять, если не заполнены Производители
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'garanty')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
