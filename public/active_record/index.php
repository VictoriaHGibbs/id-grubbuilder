<?php
require_once('../../private/initialize.php');

require_login();
$id = $_SESSION['user_id'] ?? false;
$recipes = Recipe::find_by_user_id($id);
$profile_image = User::get_user_image($id);

$page_title = 'User Profile Page';

include(SHARED_PATH . '/user_header.php');
?>

<div class="container text-center mt-4 p-md-4 p-2 rounded border border-1 border-dark">
  <div class="">
    <img src="<?php echo ('../../uploads/') . "$profile_image" . "?" . mt_rand() ; ?>">
  
    <form action="index.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend></legend>
        <small>File must be smaller than 75mb</small>
        <br>
        <label for="profile_image_url">Upload Profile Image: </label>
        <input type="file" id="profile_image_url" name="profile_image_url" class="rounded border border-1 border-dark">
        <button type="submit" name="image" class="btn btn-warning border-1 border-dark">Upload</button>
      </fieldset>
    </form>
    <?php
    if (is_post_request()) {
      if (isset($_POST['image'])) {
        User::set_profile_image($id);
      }
    }
    ?>
  </div>
</div>


<!-- CODE TO ADD IN NAME HERE -->

<?php if ($recipes) { ?>
  <p><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add another recipe</a></p>
  
  <h2 class="text-center fw-bold mb-4 py-4">Your Recipes</h2>
  <section class="card-preview-container">
    
    <div id="preview" class="container text-center mt-4 p-md-4 p-2 rounded border border-1 border-dark">
      <?php include(SHARED_PATH . '/recipe_card.php'); ?>
    </div>

  </section>
  
<?php } else { ?>

  <h2>Looks like you haven't added anything yet!</h2>
  <p><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add your first recipe.</a></p>

<?php } ?>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
