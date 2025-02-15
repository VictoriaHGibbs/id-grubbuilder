<?php 
require_once('../private/initialize.php');

$page_title = 'Recipes';

include(SHARED_PATH . '/public_header.php');
?>
<h2>All the Recipes</h2>

<table border=1>
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
</table>

<?php

$sql = "SELECT * FROM recipe";
$result = $database->query($sql);
$row = $result->fetch_assoc();
$result->free();

echo "RECIPE: " . $row['recipe_title'];

?>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
