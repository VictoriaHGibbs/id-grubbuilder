<?php 
require_once('../private/initialize.php');

$id = $_GET['id'] ?? false;

$recipe = Recipe::find_by_id($id);

$page_title = 'Detail: ' . $recipe->recipe_title;


if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}

?>

<a href="recipes.php">Return to List</a>

<section>
  <section>
    <h2><?php echo h($recipe->recipe_title); ?></h2>
    <p><?php echo Recipe::user_info($recipe) ?></p>
    <?php echo Recipe::images($id); ?>
    <?php echo Recipe::average_rating($id); ?>
    <p><?php echo h($recipe->description); ?></p>
    <p>Prep Time: <?php echo h($recipe->prep_time_minutes); ?> minutes</p>
    <p>Cook Time: <?php echo h($recipe->cook_time_minutes); ?> minutes</p>
    <p>Servings: <?php echo h($recipe->servings); ?></p>
    <p>Yield: <?php echo h(abs($recipe->yield)) . " " . h($recipe->get_measurement_name($recipe));
    if ($recipe->yield > 1) echo "s"; ?> </p>


    <?php $link = Recipe::video($id); ?>
      
     
  </section>

  <section>
    <h3>Ingredients</h3>
      <?php echo Recipe::ingredients($id); ?>
  </section>

  <section>
    <h3>Directions</h3>
      <?php echo Recipe::directions($id); ?>
  </section>

</section>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
