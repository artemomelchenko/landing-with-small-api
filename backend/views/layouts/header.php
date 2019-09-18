<?php

use yii\helpers\Html;

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
        <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <?= Html::beginForm(['/site/logout'], 'post'); ?>
        <?= Html::submitButton(
        '<i class="fa fa-sign-out-alt" aria-hidden="true"></i>',
        ['class' => 'btn btn-link logout']
        ); ?>
        <?php Html::endForm() ?>
<!--        <a class="nav-link" href="/site"></a>-->
    </li>
    </ul>
</nav>