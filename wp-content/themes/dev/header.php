<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(get_option('is_landing_page') === 'on') : ?>
        <meta title="<?= get_option('meta_title_landing') ?>">
        <meta name="description" content="<?= get_option('meta_desc_landing') ?>">
        <meta property="og:url" content="<?= get_option('meta_og_url_landing') ?>">
        <meta property="og:image" content="<?= get_option('meta_og_image_landing') ?>">
    <?php endif; ?>
    <?php wp_head() ?> 
</head>
<body>
    
<?php if(!(get_option('is_landing_page') === 'on')) : ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: <?= get_theme_mod('header_background') ?>!important ;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <?php  wp_nav_menu([
            'theme_support' => 'header',
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'menu_class' => 'navbar-nav mr-auto dropdown'
        ]); ?>
</nav>
<?php endif ; ?>


<div id="app">
    
<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div> -->