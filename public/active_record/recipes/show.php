<?php 
require_once('../../../private/initialize.php');

$id = $_GET['recipe_id'] ?? false;

$recipe = Recipe::find_by_pk($id);

$page_title = 'Detail: ' . $recipe->recipe_title;


include(SHARED_PATH . '/user_header.php');
?>

<a href="index.php">Return to List</a>

<section>
  <section>
    <h2><?php echo h($recipe->recipe_title); ?></h2>
    <p><?php echo h($recipe->user_info($recipe)) ?></p>
    <!-- RECIPE IMAGES -->
    <!-- RATING  -->
    <p><?php echo h($recipe->description); ?></p>
    <p>Prep Time: <?php echo h($recipe->prep_time_minutes); ?> minutes</p>
    <p>Cook Time: <?php echo h($recipe->cook_time_minutes); ?> minutes</p>
    <p>Servings: <?php echo h($recipe->servings); ?></p>
    <p>Yield: <?php echo h(abs($recipe->yield)) . " " . h($recipe->find_value($recipe));
    if ($recipe->yield > 1) echo "s"; ?> </p>
    <!-- PRINTER FRIENDLY LINK -->
    <!-- ADD TO FAVORITES -->
    <!-- NUTRITION FACTS -->
    <?php $link = $recipe->get_video($id); 
      if ($link) { ?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo h($link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <?php } ?>
      
     
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


<?php include(SHARED_PATH . '/user_footer.php'); ?>
