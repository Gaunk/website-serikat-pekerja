<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title><?= isset($profile['site_name']) ? $profile['site_name'] : 'Default Title' ?></title>
    <meta name="description" content="<?= isset($profile['site_desc']) ? $profile['site_desc'] : '' ?>">
    <meta name="keywords" content="<?= isset($profile['keywords_wesbite']) ? $profile['keywords_wesbite'] : '' ?>">

  <!-- Favicons -->
  <?php if (!empty($logo->image)): ?>
    <link rel="icon" type="image/png" href="<?= base_url($logo->image) ?>">
<?php else: ?>
    <!-- Fallback jika logo tidak ada -->
    <link rel="icon" href="<?= base_url('favicon.png') ?>">
<?php endif; ?>


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('temp_home/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('temp_home/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('temp_home/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('temp_home/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url('temp_home/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= base_url('temp_home/') ?>assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Updated: Jun 23 2025 with Bootstrap v5.3.6
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>