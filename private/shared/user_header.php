<?php
$id = $_SESSION['user_id'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grub Builder <?php if (isset($page_title)) {echo '- ' . h($page_title);} ?></title>
  <link rel="stylesheet" href="<?php echo url_for('/stylesheets/style.css'); ?>">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script> -->
  <script src="<?php echo (JS_PATH . 'jquery-3.7.1.js'); ?>"></script>
  <script src="<?php echo (JS_PATH . 'jquery.star_rating.js'); ?>"></script>
  <?php
    if ($page_title == 'Create Recipe') { ?>
      <script src="<?php echo (JS_PATH . 'recipe_items.js'); ?>" defer></script>
  <?php } ?>
  
</head>

<body>

  <header>
    <section id="header-top">
      <h1><a href="<?php echo url_for('/active_record/index.php'); ?>">Grub Builder</a></h1>
      <form action="<?php echo (SHARED_PATH . '/forms/search.php'); ?>" method="post" role="form">
        <label for="search"></label>
        <input type="text" id="search" name="search">
        <input id="search-submit" type="submit" value="Search">
      </form>
        <ul>
          <li><a href="<?php echo url_for('/active_record/users/index.php'); ?>">Manage Users</a></li><!-- will be for admin only  -->
      
          <li><a href="<?php echo url_for('/active_record/index.php'); ?>">My Profile</a></li>
          <li><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add Recipe</a></li>
          <li><a href="<?php echo url_for('/active_record/logout.php'); ?>">Logout</a></li>
        </ul>
    </section>
    
    <section id="header-lower">
      <nav role="navigation" aria-label="main site">
        <ul>
          <li><a href="<?php echo url_for('/active_record/recipes/index.php'); ?>">All Recipe list</a></li>
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
    <h2>Welcome back <?php echo h(User::get_username_by_id($id)); ?>!</h2>
