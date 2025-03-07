<?php 
require_once('../private/initialize.php');

$page_title = 'Recipes';

$recipes = Recipe::find_all();

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

  <h2 class="text-center fw-bold mb-4">All the Recipes</h2>
  
  <?php include(SHARED_PATH . '/recipe_card.php'); ?>


<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
