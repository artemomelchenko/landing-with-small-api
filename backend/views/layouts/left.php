<?php

use common\models\Leads;

?>
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="/admin/leads" class="brand-link">
<!--        <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image">-->
        <span class="brand-text font-weight-light">ТопДах Админ панель</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item" >
                    <a  href="/admin/leads" class="nav-link <?= Yii::$app->controller->id == 'leads' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Заявки
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>