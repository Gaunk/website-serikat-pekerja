<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <?php foreach ($this->Menu_model->get_all() as $menu): ?>
          <li>
            <a href="<?= site_url('home/#' . $menu->slug) ?>">
              <?= htmlspecialchars($menu->title) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
  </header>