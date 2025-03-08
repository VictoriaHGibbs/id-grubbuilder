<?php 
require_once('../private/initialize.php');

$page_title = 'Home';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<section class="container text-center my-5">
  <h2 class="display-4 fw-bold text-dark">Welcome to Grub Builder</h2>
  <p class="lead">Find, customize, and enjoy recipes tailored to your taste and dietary needs.</p>
  <a href="<?php echo url_for('/recipes.php') ?>" class="btn btn-lg btn-warning">Explore Recipes</a>
</section>

<div class="container text-center mt-4">
  <img src="<?php echo url_for('assets/images/sushi01.webp');?>" class="img-fluid rounded shadow-lg" alt="A large colorful plate of sushi." >
</div>



<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
