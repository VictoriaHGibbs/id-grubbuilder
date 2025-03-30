<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/active_record/login.php'));
}
$id = $_GET['id'];
$recipe = Recipe::find_by_id($id);
if($recipe == false) {
  redirect_to(url_for('/active_record/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['recipe'];
  $recipe->merge_attributes($args);
  $result = $recipe->save();

  if($result === true) {
    $session->message('The recipe was updated successfully.');
    redirect_to(url_for('/active_record/recipes/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Recipe'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active_record/index.php'); ?>">Back to List</a>

  <div class="recipe edit">
    <h1>Edit Recipe</h1>

    <?php echo display_errors($recipe->errors); ?>

    <form action="<?php echo url_for('/active_record/recipes/edit.php'); ?>" method="post" enctype="multipart/form-data" class="container mt-4">

      <?php include('form_fields.php'); ?>
      
      <div class="mt-4">
        <input type="submit" value="Create Recipe" class="btn btn-warning">
      </div>
      
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
