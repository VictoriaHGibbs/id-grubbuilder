<?php

require_once('../../../private/initialize.php');
require_login();

$id = $_SESSION['user_id'] ?? false;

if(is_post_request()) {
  include_once('insert.php');

  if (isset($result) && $result ) {
    $session->message('The recipe was added successfully.');
    redirect_to(url_for('/active_record/recipes/show.php?id=' . $recipe_id));
  } else {
    $session->message('Failed to add recipe.');
  }

} else {
  // display the form
  $recipe = new Recipe;
  $ingredient = new Ingredient;
  $direction = new Direction;
}

?>

<?php $page_title = 'Create Recipe'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>



  <a class="back-link" href="<?php echo url_for('/active_record/index.php'); ?>">Back to Profile</a>

    <h2 class="text-center fs-1 mb-4">Create Recipe</h2>
    <p class="text-center mb-4">Fields marked with * required</p>

    <?php // echo display_errors($recipe->errors); ?>
    <?php // echo display_errors($ingredient->errors); ?>
    <?php // echo display_errors($direction->errors); ?>

    <form action="<?php echo url_for('/active_record/recipes/new.php'); ?>" method="post" enctype="multipart/form-data" class="container mt-4">

      <?php include('form_fields.php'); ?>
      
      <div class="mt-4">
        <input type="submit" value="Create Recipe" class="btn btn-warning border-1 border-dark mt-2">
      </div>
      
    </form>

  



<?php include(SHARED_PATH . '/user_footer.php'); ?>
