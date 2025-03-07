<?php 
require_once('../../../private/initialize.php');

$recipes = Recipe::find_all();

$page_title = 'All Recipes';
require_login();

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<a href="<?php echo url_for('/active_record/recipes/new.php') ?>">Add Recipe</a>

<h2>All the Recipes</h2>


<section class="card-preview-container">

<?php include(SHARED_PATH . '/recipe_card.php'); ?>

</section>

<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
}
?>
