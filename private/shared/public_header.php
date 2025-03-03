<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grub Builder <?php if (isset($page_title)) {echo '- ' . h($page_title);} ?></title>
  <script src="https://kit.fontawesome.com/11d6778b2f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo url_for('/stylesheets/style.css'); ?>">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script> -->
  <!-- <script src="<?php //echo url_for('/js/jquery-3.7.1.js'); ?>"></script> -->
  <!-- <script src="<?php //echo url_for('/js/jquery.star_rating.js'); ?>"></script> -->
  <!-- <script src="<?php //echo url_for('/js/star_rating.js'); ?>" defer></script> -->
</head>

<body>

  <a href="#main-content" id="skip-link">Jump to main content</a>
  <header>
    <section id="header-top">
      <h1><a href="<?php echo url_for('/index.php'); ?>">Grub Builder</a></h1>
      <form action="<?php echo (SHARED_PATH . '/forms/search.php'); ?>" method="post" role="form">
        <input type="text" id="search" name="search">
        <input id="search-submit" type="submit" value="Search">
      </form>
      <ul>
        <li><a href="<?php echo url_for('/active_record/login.php') ?>">User Login</a></li>
        <li><a href="<?php echo url_for('/active_record/signup.php') ?>">No account? Sign-up here!</a></li>
      </ul>
    </section>

    <section id="header-lower">
      <nav role="navigation" aria-label="main site">
        <ul>
          <li><a href="<?php echo url_for('/recipes.php') ?>">All Recipes</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Popular</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Courses</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Diet</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Cuisine</a></li>
          <li><a href="<?php echo url_for('/about.php') ?>">About us</a></li>
        </ul>
      </nav>
    </section>
  </header>

  <main role="main" id="main-content" tabindex="-1">

  