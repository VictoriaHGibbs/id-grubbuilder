<?php
$id = $_SESSION['user_id'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grub Builder <?php if (isset($page_title)) {echo '- ' . htmlspecialchars($page_title);} ?></title>
  <link rel="stylesheet" href="<?php echo url_for('/stylesheets/style.css'); ?>">
</head>

<body>

  <header>
    <h1><a href="<?php echo url_for('/active_record/index.php'); ?>">Grub Builder</a></h1>

    <form action="../search.php" method="post" role="form">
      <label for="search"></label>
      <input type="text" id="search" name="search">
      <input id="search-submit" type="submit" value="Search">
    </form>

    <h2>Welcome back <?php echo h(User::get_username_by_id($id)); ?></h2>


    <nav role="navigation" aria-label="">
      <ul>
        <li><a href="<?php echo url_for('/active_record/users/index.php'); ?>">Users</a></li><!-- will be for admin only  -->
        
        <li><a href="<?php echo url_for('/active_record/index.php'); ?>">My Profile</a></li>
        <li><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add Recipe</a></li>
        <li><a href="<?php echo url_for('/active_record/logout.php'); ?>">Logout</a></li>
      </ul>
    </nav>

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
  </header>
  
  <main role="main" id="main-content" tabindex="-1">
