<?php
?>
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <a href="/admin/" class="brand-link">
        <span class="brand-text font-weight-light">ТопДах Админ панель</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/admin/leads" class="nav-link <?= Yii::$app->controller->id == 'leads' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Заявки
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/categories" class="nav-link <?= Yii::$app->controller->id == 'categories' ? 'active' : '' ?>">
                        <i class="fas fa-exchange-alt"></i>
                        <p>
                            Категории
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/manufacturers" class="nav-link <?= Yii::$app->controller->id == 'manufacturers' ? 'active' : '' ?>">
                        <i class="fas fa-tools"></i>
                        <p>
                            Производители
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/colors" class="nav-link <?= Yii::$app->controller->id == 'colors' ? 'active' : '' ?>">
                        <i class="fas fa-palette"></i>
                        <p>
                            Цвета
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/items" class="nav-link <?= Yii::$app->controller->id == 'items' ? 'active' : '' ?>">
                        <i class="fas fa-sitemap"></i>
                        <p>
                            Товары
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>