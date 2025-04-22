<?php
require_once('../../private/initialize.php');

require_login();
$id = $_SESSION['user_id'] ?? false;
$profile_image = User::get_user_image($id);

$current_page = $_GET['page'] ?? 1;
$per_page = 3;
$total_count = Recipe::count_all_by_user_id($id);

$pagination = new Pagination($current_page, $per_page, $total_count);

$recipes = Recipe::find_by_user_id_paginated($id, $per_page, $pagination);

$page_title = 'User Profile Page';

include(SHARED_PATH . '/user_header.php');
?>

<div class="styled-container container mt-4 p-md-4 p-2 rounded border border-1 border-dark">
  <div class="row mb-3">
    <img class="w-25 col-md-6 col-12" src="<?php echo ('../../uploads/') . "$profile_image" . "?" . mt_rand() ; ?>" alt="Profile Image">
    <div class="col-md-6 col-12">
      <h2>USER PROFILE INFORMATION HERE </h2>
      <p>DATE JOINED</p>
      <p>NUMBER OF RECIPES CONTRIBUTED</p>
      <p>NUMBER OF RECIPES RATED</p>
    </div>
  </div>

  <div class="row">
    <form action="index.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <label for="profile_image_url" class="form-label">Upload Profile Image: </label>
        <small>File must be smaller than 75mb</small>
        <input type="file" id="profile_image_url" name="profile_image_url" class="form-control rounded border border-1 border-dark mb-3">
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
  
  <h2 class="text-center fw-bold mb-2 py-4">Your Recipes</h2>
  <p class="text-center"><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>" class="btn btn-warning border border-1 border-dark">Add another recipe</a></p>
  <section class="card-preview-container">
    
    <div class="styled-container container text-center mt-4 p-md-4 p-2 rounded border border-1 border-dark">
      <?php include(SHARED_PATH . '/recipe_card.php'); ?>
    </div>

    <?php $url = url_for('active_record/index.php');
    echo $pagination->page_links($url); ?>
  </section>
  
<?php } else { ?>

  <h2>Looks like you haven't added anything yet!</h2>
  <p><a href="<?php echo url_for('/active_record/recipes/new.php'); ?>">Add your first recipe.</a></p>

<?php } ?>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
