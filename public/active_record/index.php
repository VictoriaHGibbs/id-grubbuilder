<?php
require_once('../../private/initialize.php');

// require_login();
$id = $_SESSION['user_id'] ?? false;
$recipes = Recipe::find_by_user_id($id);


$page_title = 'User Menu/ Main Profile Page';

include(SHARED_PATH . '/user_header.php');
?>




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

<?php } ?>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
