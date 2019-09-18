<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
<body>
<?php $this->beginBody() ?>
<div id="eclipse"></div>
						<div id="gratitude" class="">
							<img src="img/success.svg" alt="">
							<h3>дякуємо</h3>
							<p>вашу заявку успішно <br/> відправлено</p>
						</div>
						<div class="popup">
								<div class="button_close"></div>
							<h3 class="heading_form">отримати знижку</h3>
							<form id="popup_form" class="first_form" method="POST" action="">
								<label for="first_name" class="first_name"> ваше ім'я:</label>
								<input id="firstNname" type="text" name="first_name"  minlength="2" required >
								<label for="phone" class="phone"> ваш номер:</label>
								<input id="phone" class="tel" type="text" name="phone" required>
								<button class="btn_product_discont" type="submit">надіслати</button>
								<div class="decoration">
									<img class="locker" src="img/Frame.png" alt="locker image">
									<span class="saif">ваші данні в безпеці</span>
								</div>
							</form>
						</div>
<main>
    <ul id="section_scroll" class="navigator">
        <li class="nav-item active" data-order="1"><a href="#header">Головна</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="2"><a href="#adventage">Переваги</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="3"><a href="#catalog">Каталог</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="4"><a href="#catalog_product">Каталог</a><span class="nav-line"></span>
        </li>
        <li class="nav-item" data-order="5"><a href="#">Підхід</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="6"><a href="#gallery">Галлерея</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="7"><a href="#reviews">Відгуки</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="8"><a href="#calculator">Розрахунок</a><span class="nav-line"></span></li>
        <li class="nav-item" data-order="9"><a href="footer">Контакти</a><span class="nav-line"></span></li>
    </ul>

    <div class="scroller">
        <div class="background-animation">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <header id="header" class="over_line">
            <div class="header_grid_container grid">
                <div class="logo"><img src="img/logo.png" alt="logo Top_dah"></div>
                <div class="header_location">
                    <ul>
                        <li><img src="img/icon_location.png" alt="icon_location"></li>
                        <li> <span header_location_text>м. Чернівці <br> вул. Головна 115</span></li>
                    </ul>
                </div>
                <div class="header_phone">
                    <ul>
                        <li> <a href="tel:+380000000000"> <img src="img/icon_phone.png" alt="icon_phone"></a></li>
                        <li><span header_location_text>0 50 50 50 255 <br> 0 50 50 50 255</span></li>
                    </ul>
                </div>

        <?= $content ?>
                <footer id="footer">
                <div class="background-animation white">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
                    <div class="vertical_text">
                        <p> контакти</p>
                    </div>
                    <div class="over_line">
                        <h2 class="headihg_advantage pl">завітайте до нас в офіс</h2>
                        <p class="footer_text pl">де представленні зразки продукції
                            та отрімайте детальний  розрахунок усіх елементів безкоштовно
                        </p>
                        <div class="footer_grid_container grid">
                            <div class="img_box grid">
                                <div class="img_item">
                                    <img src="img/roof-1.png" alt="">
                                </div>
                                <div class="img_item">
                                    <img src="img/roof-2.png" alt="">
                                </div>
                                <div class="img_item">
                                    <img src="img/roof-3.png" alt="">
                                </div>
                                <div class="img_item">
                                    <img src="img/roof-4.png" alt="">
                                </div>
                            </div>
                            <div class="contact_info grid">
                                <div class="contact_item">
                                    <div id="map"></div>
                                </div>
                                <div class="contact_item ">
                                    <div class="item_wrapper">
                                        <img src="img/clock.png" alt="clock image">
                                        <span class="padding_top">режим та час роботи</span>
                                    </div>
                                    <span class="center"> Пн-Пт 9:00 - 20:00, Сб-Нд Вихідний</span>
                                </div>
                                <div class="contact_item">
                                    <div class="item_wrapper">
                                        <img src="img/email.png" alt="phone icon">
                                        <span class="contact">пошта</span>
                                    </div>
                                    <div class="center">
                                        <p>topdah@mgail.ua</p>
                                    </div>
                                </div>
                                <div class="contact_item">
                                    <div class="item_wrapper">
                                        <img src="img/phone=1.png" alt="phone icon">
                                        <span class="contact">контакти</span>
                                    </div>
                                    <div class="center">
                                        <span>0 50 50 50 255</span>
                                        <span>0 50 50 50 255</span>
                                    </div>
                                </div>
                                <div class="contact_item">
                                    <div class="item_wrapper">
                                        <img src="img/metca.png" alt="location icon">
                                        <span class="contact">Адреса</span>
                                    </div>
                                    <div class="center">
                                        <span>м. Чернівці,</span>
                                        <span>вул. Головна 115</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
