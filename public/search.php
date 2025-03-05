<?php

require_once('../private/initialize.php');

$page_title = 'Search Results';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<h2>Search Results</h2>

<?php if (is_post_request()) {
  $search_term = $_POST['search'];
  $recipes = Recipe::search($search_term);
  if ($recipes) {?>

    <section class="card-preview-container">

      <?php foreach($recipes as $recipe) { ?>
        <section class="recipe-card-preview">
          <a href="detail.php?id=<?php echo $recipe->id; ?>">
          <?php Recipe::first_image_only($recipe->id) ?>
          <h3><?php echo h($recipe->recipe_title); ?></h3>
          <p><?php echo ($recipe->user_info($recipe)) ?></p>
          <p><?php echo h($recipe->description); ?></p>
          </a>
        </section>

      <?php } ?>

    </section>
  <?php } else {  // No results?>
          <p>Ooops! There doesn't seem to be any results matching that search at this time!</p>
    <?php } ?>

<?php } ?>




<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
