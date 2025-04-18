<?php

require_once('../private/initialize.php');

$page_title = 'Popular Recipes';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<h2 class="text-center fw-bold mb-4 py-4">Popular Recipes</h2>

<form action="<?php echo url_for('/recipes.php'); ?>" method="post">

  <?php include(SHARED_PATH . '/recipe_sort.php'); ?>

</form>

<?php 

  $all_recipes = Recipe::find_all();

  $recipes = array_filter($all_recipes, function($recipe) {
    return $recipe->average_rating($recipe->id) >= 3;
    });

  $current_page = $_GET['page'] ?? 1;
  $per_page = 2;
  $total_count = count($recipes);

  $pagination = new Pagination($current_page, $per_page, $total_count);

  usort($recipes, function($a, $b) {
    return $b->average_rating($b->id) <=> $a->average_rating($a->id);
  });


  if ($recipes) { ?>

  <div id="preview" class="container text-center mt-4 p-md-4 p-2 rounded border border-1 border-dark">
    <?php include(SHARED_PATH . '/recipe_card.php'); ?>
  </div>
    <?php $url = url_for('/popular.php');
    echo $pagination->page_links($url); ?>

  <?php } ?>


<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
