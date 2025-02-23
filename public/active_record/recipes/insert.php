<?php 

// Transaction to insert rows into multiple tables at once

$database->begin_transaction();

try {
// Insert into RECIPE table
  $stmt1 = $_POST['recipe'];
  $recipe = new Recipe($stmt1);
  $stmt1_result = $recipe->save();

  if (!$stmt1_result) {
    throw new Exception("Recipe insertion failed.");
  }

// Get last inserted recipe_id
  $recipe_id = $recipe->id;
  var_dump($recipe_id);
// For single ingredient testing till I get the JS built for multiples

  // $stmt2 = $_POST['ingredient'];
  // $ingredient = new Ingredient($stmt2);
  // $ingredient->save();
  
// Ingredient Array Loop 
  foreach ($_POST['ingredient'] as $index => $ingredient_data) {
    $ingredient_data['recipe_id'] = $recipe_id;
    $ingredient = new Ingredient($ingredient_data);
    $ingredient->save();
  }


// For single direction testing till I get the JS built for multiples
  // $stmt3 = $_POST['direction'];
  // $direction = new Direction($stmt3);
  // $direction->save();

// Direction Array Loop
  foreach ($_POST['direction'] as $index => $direction_data) {
    $direction_data['recipe_id'] = $recipe_id; 
    $direction = new Direction($direction_data);
    $direction->save();
  }

// Check if image
  if (has_presence($_POST['image'])) {
// Image Array Loop
    foreach ($_POST['image'] as $index => $image_data) {
        $image_data['recipe_id'] = $recipe_id;
        $image = new Image($image_data);
        $image->save();
    }
  }
// Check if video
  if (has_presence($_POST['youtube_url'])) {
// Prepare and bind VIDEO table
  $stmt5 = $database->prepare("INSERT INTO video (recipe_id, youtube_url) VALUES (?,?)");
  $stmt5->bind_param("is", $recipe_id, $_POST['youtube_url']);
  $stmt5->execute();
  }

// Check if meal_type
  if (has_presence($_POST['meal_type_id'])) {
// Prepare and bind RECIPE_MEAL_TYPE table
  $stmt6 = $database->prepare("INSERT INTO recipe_meal_type (meal_type_id, recipe_id) VALUES (?,?)");
  $stmt6->bind_param("ii", $_POST['meal_type_id'], $recipe_id);
  $stmt6->execute();
  }

// Check if diet
  if (has_presence($_POST['diet_id'])) {
// Prepare and bind RECIPE_DIET table
  $stmt7 = $database->prepare("INSERT INTO recipe_diet (diet_id, recipe_id) VALUES (?,?)");
  $stmt7->bind_param("ii", $_POST['diet_id'], $recipe_id);
  $stmt7->execute();
  }

// Check if style
  if (has_presence($_POST['style_id'])) {
// Prepare and bind RECIPE_STYLE table
  $stmt8 = $database->prepare("INSERT INTO recipe_style (style_id, recipe_id) VALUES (?,?)");
  $stmt8->bind_param("ii", $_POST['style_id'], $recipe_id);
  $stmt8->execute();
  }

// Commit transaction
  $database->commit();
  echo "Recipe creation successful!";
  $result = true;
  return $recipe_id;

} catch (Exception $error) {
  // Rollback transaction if error
  $database->rollback();
  $result = false;
  echo "Recipe not created! :( ";
  echo "Error: " . $error->getMessage();
}
