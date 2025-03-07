<?php 
require_once('../../../private/initialize.php');

$recipes = Recipe::find_all();

$page_title = 'All Recipes';


if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>


<h2>All the Recipes</h2>

<?php include(SHARED_PATH . '/recipe_card.php'); ?>


<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
}
?>
