<?php 
require_once('../private/initialize.php');

$current_page = $_GET['page'] ?? 1;
$per_page = 12;
$total_count = Recipe::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

$recipes = Recipe::find_all_paginated($per_page, $pagination);

$page_title = 'All Recipes';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

  <h2 class="text-center fw-bold mb-4">All the Recipes</h2>
  
  <div id="preview" class="container text-center mt-4 p-4 rounded border border-1 border-dark">
    <?php include(SHARED_PATH . '/recipe_card.php'); ?>
  </div>

  <?php $url = url_for('/recipes.php');
  echo $pagination->page_links($url); ?>

<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
