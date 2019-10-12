<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Items */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="items-view">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?php
            $array = [];
            foreach ($model->itemsImg as $key => $value){

                $array = [
                    'label' => 'Картинка',
                    'format' => 'raw',
                    'value' => 'adf'
                ];
            }

            ?>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'length',
                    'height',
                    'full_weight',
                    'weight',
//                    'id_categories',
                ],
            ]) ?>

            <?php foreach ($model->itemsImg as $key => $value): ?>
                <?= DetailView::widget([
                    'model' => $value,
                    'attributes' => [
                        [
                            'label' => $value->color->name.Html::tag('div', '', ['style' => "background:".$value->color->hex.";width:30px;height:30px;"]).$value->color->hex,
                            'format' => 'html',
                            'value' => Html::img('/img/items/' . $value->img, [
                                'alt' => 'Виробник',
                                'style' => 'width:150px;'
                            ])
                        ]
                    ],
                ]) ?>
            <?php endforeach; ?>
            <?php foreach ($model->itemsSettings as $k => $setting): ?>
                <?= DetailView::widget([
                    'model' => $setting,
                    'attributes' => [
                        [
                            'label' => $setting->manufacturer->name.Html::tag('div', Html::img('/img/manufacturers/' . $setting->manufacturer->img, [
                                    'alt' => 'Виробник',
                                    'style' => 'width:150px;'
                                ])),
                            'format' => 'html',
                            'value' => 'Содержание цинка: '.
                            $setting->zinс.
                            "<br>Цена: ".
                            $setting->price.
                            '<br>Гарантия: '.
                            $setting->garanty
                        ]
                    ],
                ]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
