<body class="animsition">
    <div class="page-wrapper">

        <!-- HEADER MOBILE -->
        <?php // Header Mobile Section ?>
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?= base_url('user/dashboard') ?>">
                            <img src="<?= base_url('temp_user/images/icon/logo.png') ?>" alt="CoolAdmin">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <?php // Mobile Navigation ?>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li><a class="js-arrow" href="<?= base_url('user/dashboard') ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                        <li><a href="chart.html"><i class="fas fa-chart-bar"></i>Charts</a></li>
                        <li><a href="table.html"><i class="fas fa-table"></i>Tables</a></li>
                        <li><a href="form.html"><i class="far fa-check-square"></i>Forms</a></li>
                        <li><a href="calendar.html"><i class="fas fa-calendar-alt"></i>Calendar</a></li>
                        <li><a href="map.html"><i class="fas fa-map-marker-alt"></i>Maps</a></li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#"><i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="forget-pass.html">Forget Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- SIDEBAR -->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#"><img src="<?= base_url('temp_user/images/icon/logo.png') ?>" alt="CoolAdmin"></a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active"><a class="js-arrow" href="<?= base_url('user/dashboard') ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                        <li><a href="chart.html"><i class="fas fa-chart-bar"></i>Settings</a></li>
                        
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- PAGE CONTAINER -->
        <div class="page-container">

            <!-- HEADER DESKTOP -->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas & reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url($this->session->userdata('avatar')) ?>" alt="Avatar" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $username ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url($this->session->userdata('avatar')) ?>" alt="Avatar" width="100">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name"><a href="#"><?= $username ?></a></h5>
                                                    <span class="email"><?= $email ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#"><i class="zmdi zmdi-account"></i>Biodata</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('user/settings') ?>"><i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('auth/logout') ?>"><i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- header-button -->
                        </div>
                    </div>
                </div>
            </header>
            