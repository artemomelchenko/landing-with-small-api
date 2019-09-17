<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
$fieldOptions1 = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-male"></span></div></div>'
];

$fieldOptions2 = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>'
];
?>
<!--<div class="site-login">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-lg-5">-->
<!--            -->
<!---->
<!--                -->
<!---->
<!--
<?//= $form->field($model, 'rememberMe')->checkbox() ?>

<!-                <div class="form-group">-->
<!--                    -->
<!--                </div>-->
<!---->
<!--            -->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Адмін</b>ТопДах</a>
    </div>
    <!-- /.login-logo -->
<!--    <div class="card">-->
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="input-group mb-3">
            <?= $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            </div>
            <div class="input-group mb-3">
            <?= $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
            </div>

            <div class="col-xs-4">
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
            <div class="social-auth-links text-center mb-3">

        <!-- /.login-card-body -->
<!--    </div>-->
</div>