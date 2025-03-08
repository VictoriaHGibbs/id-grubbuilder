<?php

require_once('../private/initialize.php');

$page_title = 'Popular Recipes';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<h2 class="text-center fw-bold mb-4">Popular Recipes</h2>
<?php 
  $recipes = Recipe::find_all();

  usort($recipes, function($a, $b) {
    return $b->average_rating($b->id) <=> $a->average_rating($a->id);
  });


  if ($recipes) { ?>

    <?php include(SHARED_PATH . '/recipe_card.php'); ?>

  <?php } ?>


<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
