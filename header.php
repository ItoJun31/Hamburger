<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  　
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body<?php body_class(); ?>>
  　<?php wp_body_open(); ?>
  <div class="menu-background"></div>
  <main class="l-main">
    <div class="l-article">
      <header class="l-header">
        <div class="p-sidebar_mobile">
          <!--モバイルメニュー -->
          <a href="#">Menu</a>
          <div class="p-header">
            <a href="<?php echo esc_url(home_url('/')); ?>">Hamburger</a>
          </div>
          <?php get_search_form(); ?>