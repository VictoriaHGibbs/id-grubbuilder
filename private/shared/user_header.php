

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grub Builder <?php if (isset($page_title)) {echo '- ' . h($page_title);} ?></title>
  <script src="https://kit.fontawesome.com/11d6778b2f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo url_for('assets/stylesheets/style.css'); ?>">
  <?php
    if ($page_title == 'Create Recipe' ) { ?>
      <script src="<?php echo (JS_PATH . 'recipe_items.js'); ?>" defer></script>
  <?php } ?>
  
</head>

<body>

  <a href="#main-content" id="skip-link">Jump to main content</a>
  <header>
    <section id="header-top">
      <h1><a href="<?php echo url_for('/index.php'); ?>">Grub Builder</a></h1>

      <form action="<?php echo url_for('/search.php'); ?>" method="post" role="form">
        <label for="search"></label>
        <input type="text" id="search" name="search">
        <input id="search-submit" type="submit" value="Search">
      </form>
      
      <ul>
        <?php if($session->is_admin_logged_in()) { ?>
        <li><a href="<?php echo url_for('/active_record/users/index.php'); ?>"><i class="fa-solid fa-users"></i> Admin Dashboard</a></li>
        <?php } ?>

        <li><a href="<?php echo url_for('/active_record/index.php'); ?>"><i class="fa-solid fa-user"></i> <?php echo ($session->username); ?>'s Profile</a></li>
        <li><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>"><i class="fa-solid fa-plus"></i> Add Recipe</a></li>
        <li><a href="<?php echo url_for('/active_record/logout.php'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout <?php echo ($session->username); ?></a></li>
      </ul>
    </section>
    
    <section id="header-lower">
      <nav role="navigation" aria-label="main site">
        <ul>
          <li><a href="<?php echo url_for('/active_record/recipes/index.php'); ?>">All Recipe list</a></li>
          <li><a href="<?php echo url_for('/popular.php') ?>">Popular</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Courses</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Diet</a></li>
          <li><a href="<?php echo url_for('/.php') ?>">Cuisine</a></li>
          <li><a href="<?php echo url_for('/about.php') ?>">About us</a></li>
        </ul>
      </nav>
    </section>

  </header>
  
  <main role="main" id="main-content" tabindex="-1">
    <h2>Welcome back <?php echo h($session->username); ?>!</h2>
