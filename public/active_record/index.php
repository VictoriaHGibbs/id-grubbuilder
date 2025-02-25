<?php
require_once('../../private/initialize.php');

require_login();
$id = $_SESSION['user_id'] ?? false;
$recipes = Recipe::find_by_user_id($id);
$profile_image = User::get_user_image($id);

$page_title = 'User Menu/ Main Profile Page';

include(SHARED_PATH . '/user_header.php');
?>

<img src="<?php echo ('../../uploads/') . "$profile_image" . "?" . mt_rand() ; ?>">
<!-- CODE TO UPLOAD AN IMAGE HERE -->
<form action="index.php" method="post" enctype="multipart/form-data">
  <label for="profile_image_url">Upload Profile Image: </label>
  <input type="file" id="profile_image_url"  name="profile_image_url">
  <button type="submit" name="submit">Upload</button>
</form>
<?php
if (is_post_request()) {
  if (isset($_POST['submit'])) {
    User::set_profile_image($id);
  }
}
?>


<!-- CODE TO ADD IN NAME HERE -->

<?php if ($recipes) { ?>
<h2>All Your Recipes</h2>

<section class="card-preview-container">

<?php foreach($recipes as $recipe) { ?>
  <section class="recipe-card-preview">
    <a href="recipes/show.php?id=<?php echo $recipe->id; ?>">
    <h3><?php echo h($recipe->recipe_title); ?></h3>
    <p><?php echo h($recipe->description); ?></p>
    <p><?php echo find_value_from_lookup(h($recipe->visibility_id), 'visibility'); ?></p>
    
    </a>
  </section>

<?php } ?>

</section>
<?php } else { ?>

  <h2>Looks like you haven't added anything yet!</h2>
  <p><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add your first recipe.</a></p>

<?php } ?>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
