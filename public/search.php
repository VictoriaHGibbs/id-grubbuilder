<?php

require_once('../private/initialize.php');

$page_title = 'Search Results';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<h2 class="text-center fw-bold mb-4 py-4">Search Results</h2>

<form action="<?php echo url_for('/recipes.php'); ?>" method="post">

  <?php include(SHARED_PATH . '/recipe_sort.php'); ?>

</form>

<?php 
  if (is_get_request()) {
  $search_term = $_GET['search'];
  $current_page = $_GET['page'] ?? 1;

  $per_page = 12;
  $total_count = Recipe::search_row_counter($search_term);
  
  $pagination = new Pagination($current_page, $per_page, $total_count);

  $recipes = Recipe::search($search_term, $per_page, $pagination);

  if ($recipes) { ?>

    <section class="card-preview-container">

    <div id="preview" class="container text-center mt-4 p-md-4 p-2 rounded border border-1 border-dark">
      <?php include(SHARED_PATH . '/recipe_card.php'); ?>
    </div>
    </section>

    <?php $url = url_for('/search.php?search=' . urlencode($search_term));
    echo $pagination->page_links($url); ?>

  <?php } else { ?>
          <p>Ooops! There doesn't seem to be any results for <?php echo $search_term ?> at this time!</p>
    <?php } ?>


<?php } ?>


<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
