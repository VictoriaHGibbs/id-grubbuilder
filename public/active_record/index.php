<?php
require_once('../../private/initialize.php');

require_login();
$id = $_SESSION['user_id'] ?? false;
$recipes = Recipe::find_by_user_id($id);
$profile_image = User::get_user_image($id);

$page_title = 'User Profile Page';

include(SHARED_PATH . '/user_header.php');
?>

<img src="<?php echo ('../../uploads/') . "$profile_image" . "?" . mt_rand() ; ?>">

<form action="index.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend></legend>
    <small>File must be smaller than 75mb</small>
    <br>
    <label for="profile_image_url">Upload Profile Image: </label>
    <input type="file" id="profile_image_url"  name="profile_image_url">
    <button type="submit" name="image">Upload</button>
  </fieldset>
</form>
<?php
if (is_post_request()) {
  if (isset($_POST['image'])) {
    User::set_profile_image($id);
  }
}
?>


<!-- CODE TO ADD IN NAME HERE -->

<?php if ($recipes) { ?>
  <h2>Your Recipes</h2>
  <p><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add another recipe</a></p>

  <section class="card-preview-container">
    
    <?php include(SHARED_PATH . '/recipe_card.php'); ?>

  </section>
  
<?php } else { ?>

  <h2>Looks like you haven't added anything yet!</h2>
  <p><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add your first recipe.</a></p>

<?php } ?>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
