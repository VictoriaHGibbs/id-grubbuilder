<?php
require_once('../../../private/initialize.php');

$id = $_SESSION['user_id'] ?? false;

$recipe_id = $_GET['id'] ?? false;

$recipe = Recipe::find_by_id($recipe_id);

$page_title = 'Detail: ' . $recipe->recipe_title;


if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<ul>
  <li><a href="<?php echo url_for('/active_record/recipes/index.php'); ?>">All Recipes</a></li>

  <?php if($session->is_logged_in()) { ?>
    <li><a href="<?php echo url_for('/active_record/index.php'); ?>">Your Recipes</a></li>
  <?php } ?>
</ul>

<section>
  <section>
    <h2><?php echo h($recipe->recipe_title); ?></h2>
    <p><?php echo Recipe::user_info($recipe) ?></p>
    <?php echo Recipe::images($recipe_id); ?>
    <?php echo Recipe::display_average_rating($recipe_id); ?>
    <!-- option to leave rating if it is not their own recipe and they haven't already left a rating -->
    <?php if ($session->is_logged_in()) { ?>
      <?php $rating_result = Recipe::check_if_user_submitted_rating($recipe_id, $id) ?>
      <?php if ($recipe->user_id == $id ) { ?>
        <p>This recipe is yours!</p>
      <?php } elseif ($rating_result) { ?>
        <p class="rating-icon">Thanks for rating this recipe <?php echo ($rating_result->rating_level); ?> <i class="fa-solid fa-drumstick-bite"></i>!</p>
      <?php } else { ?>
        <form action="<?php echo url_for('/active_record/recipes/submit_rating.php'); ?>" method="post">
          <?php include('../recipes/rating_form_fields.php'); ?>
          <input type="submit" value="Submit Rating">
        </form>
      <?php } ?>
    <?php } ?>


    <p><?php echo h($recipe->description); ?></p>
    <p>Prep Time: <?php echo h($recipe->prep_time_minutes); ?> minutes</p>
    <p>Cook Time: <?php echo h($recipe->cook_time_minutes); ?> minutes</p>
    <p>Servings: <?php echo h($recipe->servings); ?></p>
    <p>Yield: <?php echo h(abs($recipe->yield)) . " " . h($recipe->get_measurement_name($recipe));
                if ($recipe->yield > 1) echo "s"; ?> </p>
    <!-- PRINTER FRIENDLY LINK -->
    <!-- NUTRITION FACTS -->
    <?php Recipe::video($recipe_id); ?>


  </section>

  <section>
    <h3>Ingredients</h3>
    <?php echo Recipe::ingredients($recipe_id); ?>
  </section>

  <section>
    <h3>Directions</h3>
    <?php echo Recipe::directions($recipe_id); ?>
  </section>

</section>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
