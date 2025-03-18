<?php

require_once('../private/initialize.php');

$page_title = 'Search Results';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<h2 class="text-center fw-bold mb-4">Search Results</h2>

<?php if (is_post_request()) {
  $search_term = $_POST['search'];
  $recipes = Recipe::search($search_term);

  $current_page = $_GET['page'] ?? 1;
  $per_page = 1;
  $total_count = Recipe::row_counter();
  var_dump($total_count);

  $pagination = new Pagination($current_page, $per_page, $total_count);

  if ($recipes) { ?>

    <section class="card-preview-container">

    <?php include(SHARED_PATH . '/recipe_card.php'); ?>

    </section>

    <?php  
    $url = url_for('/search.php');
    echo $pagination->page_links($url);
    ?>

  <?php } else { ?>
          <p>Ooops! There doesn't seem to be any results for <?php echo $search_term ?> at this time!</p>
    <?php } ?>


<?php } ?>




<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
