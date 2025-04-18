<?php 
require_once('../private/initialize.php');

$current_page = $_GET['page'] ?? 1;
$per_page = 6;
$total_count = Recipe::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

$recipes = Recipe::find_all_paginated($per_page, $pagination);

$page_title = 'Home';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<section id="welcome" class="container text-center my-5 p-4 rounded border border-1 border-dark">
  <h2 class="display-4 fw-bold text-dark ">Welcome to Grub Builder</h2>
  <p class="lead">Find, customize, and enjoy recipes tailored to your taste and dietary needs.</p>
  <a href="<?php echo url_for('/recipes.php') ?>" class="btn btn-lg btn-warning border-dark">Explore Recipes</a>
</section>

<div id="preview" class="container text-center mt-4 p-md-4 p-2 rounded border border-1 border-dark">
  <?php include(SHARED_PATH . '/recipe_card.php'); ?>
</div>

<?php $url = url_for('/index.php');
  echo $pagination->page_links($url); ?>

<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
