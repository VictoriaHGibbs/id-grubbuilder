<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/active_record/index.php'));
}
$id = $_GET['id'];
$recipe = Recipe::find_by_id($id);
if($recipe == false) {
  redirect_to(url_for('/active_record/index.php'));
}

if(is_post_request()) {
  include_once('delete_transaction.php');

  if (isset($result) && $result ) {
    $session->message('The recipe was deleted successfully.');
    redirect_to(url_for('/active_record/index.php'));
  } else {
    $session->message('Failed to delete recipe.');
  }


} else {
  // Display form
}

?>

<?php $page_title = 'Delete Recipe'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active_record/index.php'); ?>"> Back to Profile</a>

  <div class="recipe delete">
    <h2 class="text-center fw-bold mb-4">Delete Recipe</h2>
    <p class="text-center mb-4">Are you sure you want to delete this recipe?</p>
    <p class="text-center mb-4"><?php echo h($recipe->recipe_title); ?></p>

    <form action="<?php echo url_for('/active_record/recipes/delete.php?id=' . h(u($id))); ?>" method="post" class="container mt-4">
      <div class="mt-4 text-center">
        <input type="submit" name="delete" value="Delete Recipe" class="btn btn-warning">
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
