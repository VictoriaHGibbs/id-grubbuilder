

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grub Builder <?php if (isset($page_title)) {echo '- ' . h($page_title);} ?></title>
  <script src="https://kit.fontawesome.com/11d6778b2f.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo url_for('assets/stylesheets/style.css'); ?>">
  <script src="<?php echo (JS_PATH . 'recipe_size.js'); ?>" defer></script>
  <?php
    if ($page_title == 'Create Recipe' ) { ?>
      <script src="<?php echo (JS_PATH . 'recipe_items.js'); ?>" defer></script>
    <?php } ?>
      

  <meta
      name="description"
      content="A recipe sharing site.">
  
</head>

<body>

  <a href="#main-content" id="skip-link">Jump to main content</a>
  <div class="sticky-top">
    <nav class="py-2 bg-body-tertiary border-bottom">
      <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
          <li class="nav-item"><a href="<?php echo url_for('/recipes.php') ?>" class="nav-link link-body-emphasis px-2 active" aria-current="page">All Recipes</a></li>
          <li class="nav-item"><a href="<?php echo url_for('/popular.php') ?>" class="nav-link link-body-emphasis px-2">Most Popular</a></li>
          <li class="nav-item"><a href="<?php echo url_for('/about.php') ?>" class="nav-link link-body-emphasis px-2">About</a></li>
        </ul>
        <div class="flex-shrink-0 dropdown">
            <a href="#" class="btn btn-warning d-block border border-1 border-dark link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <span><i class="fa-solid fa-user"></i> <?php echo ($session->username); ?></span>
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="<?php echo url_for('/active_record/index.php'); ?>"><i class="fa-solid fa-user"></i> Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo url_for('/active_record/recipes/new.php'); ?>"><i class="fa-solid fa-plus"></i> Add Recipe</a></li>
              <li><a class="dropdown-item" href="<?php echo url_for('/active_record/logout.php'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout <?php echo ($session->username); ?></a></li>
              <?php if($session->is_admin_logged_in()) { ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo url_for('/active_record/users/index.php'); ?>"><i class="fa-solid fa-users"></i> Admin Dashboard</a></li>
              <?php } ?>
            </ul>
          </div>
      </div>
    </nav>
    
    <header class="py-3 mb-4 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <a href="<?php echo url_for('/index.php'); ?>" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none"><h1 class="fs-1">Grub Builder</h1></a>
        <form action="<?php echo url_for('/search.php'); ?>" method="get" class="col-12 col-lg-4 mb-3 mb-lg-0 align-self-center" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search" id="search" name="search">
        </form>
      </div>
    </header>
  </div>
  
  <main role="main" id="main-content" tabindex="-1">
    <h2 class="text-center fs-3">Welcome back <?php echo ($session->username); ?>!</h2>
