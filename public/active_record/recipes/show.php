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

<div class="container m-3">
  <div class="row">
    <ul class="breadcrumb">
      <li><a href="<?php echo url_for('/recipes.php'); ?>">All Recipes</a></li>
    
      <?php if($session->is_logged_in()) { ?>
        <li><a href="<?php echo url_for('/active_record/index.php'); ?>">Your Recipes</a></li>
      <?php } ?>
    </ul>
  </div>
</div>

<div class="container my-4">
  <div class="row justify-items-center">
    <div class="col-lg-8 col-12 mx-auto">
      <h2 class="mb-2"><?php echo ucwords(h($recipe->recipe_title)); ?></h2>
      <p class="text-muted"><?php echo Recipe::user_info($recipe) ?></p>
      
      <div class="recipe-image">
        <?php echo Recipe::images($recipe_id); ?>
      </div>

      <div class="styled-container p-3 my-4 border rounded border-1 border-dark">
        <p class="lead"><?php echo ucfirst(h($recipe->description)); ?></p>
      </div>
      
      <div class="container styled-container  p-4 my-4 border rounded border-1 border-dark text-center">
        <div class="row">
          <div class="col-12 col-md-12">
            <?php echo Recipe::display_average_rating($recipe_id); ?>
            <?php echo Recipe::display_total_raters($recipe_id); ?>
          </div>
            <!-- option to leave rating if it is not their own recipe and they haven't already left a rating -->
            <?php if ($session->is_logged_in()) { ?>
              <?php $rating_result = Recipe::check_if_user_submitted_rating($recipe_id, $id) ?>
              <?php if ($recipe->user_id == $id ) { ?>
                <div class="col-12 col-md-12">
                  <p>This recipe is yours!</p>
                  <!-- DELETE BUTTON  -->
                  <a class="btn btn-warning border-1 border-dark" href="<?php echo url_for('/active_record/recipes/delete.php?id=' . h(u($recipe->id))); ?>">Delete Recipe</a>
                </div>
              <?php } elseif ($rating_result) { ?>
                <div class="col-12 col-md-12">
                  <p class="rating-icon">Thanks for rating this recipe <?php echo ($rating_result->rating_level); ?> <i class="fa-solid fa-drumstick-bite"></i>!</p>
                  <form action="<?php echo url_for('/active_record/ratings/delete_rating.php'); ?>" method="post" class="my-2">
                  <input type="hidden" name="rating_id" value="<?php echo $rating_result->id ?>" >
                    <input type="submit" class="btn btn-warning border-1 border-dark mt-2" value="Change Rating">
                  </form>
                </div>
              <?php } else { ?>
                <div class="col-12 col-md-12">
                  <form action="<?php echo url_for('/active_record/ratings/submit_rating.php'); ?>" method="post" class="my-2">
                    <?php include_once('../ratings/rating_form_fields.php'); ?>
                    <input type="submit" class="btn btn-warning border-1 border-dark mt-2" value="Submit Rating">
                  </form>
                </div>
              <?php } ?>
            <?php } ?>
          
          <!-- Printing button -->
          <div class="col-12 col-md-12 align-self-end mt-2">
            <a href="<?php echo url_for('/active_record/recipes/generate_pdf.php?id=' . h($recipe_id)); ?>" class="btn btn-warning border-1 border-dark" target="_blank">Print Recipe</a>
          </div>
        </div>
      </div>


      <div class="container styled-container p-3 mb-4 border rounded border-1 border-dark">
        <div class="row">
          <div class="col-md-6">
            <p>Prep Time: <?php echo h($recipe->prep_time_minutes); ?> minutes</p>
            <p>Cook Time: <?php echo h($recipe->cook_time_minutes); ?> minutes</p>
            <p>Servings: <span class="quantity"><?php echo h($recipe->servings); ?></span></p>
            <p>Yield: <span class="quantity"><?php echo h(abs($recipe->yield));?> </span>
            <?php if ($recipe->yield > 1) {
              h($recipe->get_measurement_name($recipe)) . "s" ;
            } else {
              h($recipe->get_measurement_name($recipe));
            }
             ;"</p>" ?>
          </div>
          <div class="col-md-6">
            <?php echo Recipe::recipe_categories($recipe->id) ?>
          </div>
        </div>
      </div>

      <div>
        <section class="mb-4">
          <h3 class="">Ingredients</h3>
          <?php include_once('../recipes/recipe_size_fields.php'); ?>
          <div class="styled-container mt-4 p-3 border rounded border-1 border-dark">
            <?php echo Recipe::ingredients($recipe_id); ?>
          </div>
        </section>
        
        <section class="mb-4">
          <h3>Directions</h3>
          <div class="styled-container mt-4 p-3 border rounded border-1 border-dark">
            <?php echo Recipe::directions($recipe_id); ?>
          </div>
        </section>
      </div>

      
      <!-- <div class="nutrition">
      NUTRITION FACTS
      </div> -->
      
      <div>
        <?php Recipe::video($recipe_id); ?>
      </div>
    </div>

  </div>
</div>


<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
}
?>
