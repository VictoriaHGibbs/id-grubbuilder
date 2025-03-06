<?php 
require_once('../private/initialize.php');

$page_title = 'Recipes';

include(SHARED_PATH . '/public_header.php');
?>
<h2>All the Recipes</h2>

<?php

$recipes = Recipe::find_all();
?>

<section class="card-preview-container">

<?php include(SHARED_PATH . '/recipe_card.php'); ?>

</section>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
