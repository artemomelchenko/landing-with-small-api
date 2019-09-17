<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="<!--hold-transition sidebar-mini-->">
<?php $this->beginBody() ?>
<div class="wrapper">
<?php if(Yii::$app->user->identity):?>
    <?= $this->render('header') ?>
    <?= $this->render('left') ?>
<?php endif;?>

    <!-- Content Wrapper. Contains page content -->
    <?php if(Yii::$app->user->identity):?>
    <div class="content-wrapper">
        <?= $content ?>
    </div>
    <?php endif;?>

    <?php if(Yii::$app->user->isGuest):?>
<!--        <div class="content-wrapper">-->
            <?= $content ?>
<!--        </div>-->
    <?php endif;?>

    <?php if(Yii::$app->user->identity):?>
    <?= $this->render('footer') ?>
<?php endif;?>
<!--    --><?//= $this->render('right') ?>

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
