<?php 
require_once('../private/initialize.php');

$page_title = 'Recipes';

include(SHARED_PATH . '/public_header.php');
?>
<h2>All the Recipes</h2>

<!-- <table border=1>
  <tr>
    <th>Recipe ID</th>
    <th>User ID</th>
    <th>Recipe Title</th>
    <th>Prep time</th>
    <th>Cook time</th>
    <th>Description</th>
    <th>Created at</th>
    <th>Yield</th>
    <th>Yield Measurement Id</th>
    <th>Servings</th>
    <th>Visibility Id</th>
  </tr>
</table> -->

<?php

$id = 5;
$recipe = Recipe::find_by_pk($id);
echo $recipe->display();
echo Recipe::user_info($recipe);

echo Recipe::ingredients($id);
echo Recipe::directions($id);

die();

?>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
