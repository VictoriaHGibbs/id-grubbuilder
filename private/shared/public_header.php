<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grub Builder <?php if (isset($page_title)) {echo '- ' . htmlspecialchars($page_title);} ?></title>
  <link rel="stylesheet" href="<?php echo url_for('/stylesheets/style.css'); ?>">
</head>

<body>

  <a href="#main-content" id="skip-link">Jump to main content</a>
  <header>
    <h1><a href="<?php echo url_for('/index.php'); ?>">Grub Builder</a></h1>

    <form action="../search.php" method="post" role="form">
      <label for="search"></label>
      <input type="text" id="search" name="search">
      <input id="search-submit" type="submit" value="Search">
    </form>

    <ul>
      <li><a href="<?php echo url_for('/active_record/login.php') ?>">user login</a></li>
      <li><a href="<?php echo url_for('/active_record/signup.php') ?>">new user sign up</a></li>
    </ul>

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
  </header>

  <main role="main" id="main-content" tabindex="-1">

  