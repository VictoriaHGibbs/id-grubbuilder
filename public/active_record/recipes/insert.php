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

  
// Ingredient Array Loop 
  foreach ($_POST['ingredient'] as $index => $ingredient_data) {
    $ingredient_data['recipe_id'] = $recipe_id;
    $ingredient_data['ingredient_line_item'] = $index + 1;
    $ingredient = new Ingredient($ingredient_data);
    $ingredient->save();
  }

// Direction Array Loop
  foreach ($_POST['direction'] as $index => $direction_data) {
    $direction_data['recipe_id'] = $recipe_id;
    $direction_data['direction_line_item'] = $index + 1;
    $direction = new Direction($direction_data);
    $direction->save();
  }

// Check if image
  if (!empty($_FILES['image']['name'][0])) {
// Image Array Loop
    foreach ($_FILES['image']['name'] as $index => $file_name) {
      if (empty($file_name)) continue;
        $recipe_id = $recipe_id ?? 0;
        
        $file_tmp_name = $_FILES['image']['tmp_name'][$index];
        $file_size = $_FILES['image']['size'][$index];
        $file_error = $_FILES['image']['error'][$index];

        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($file_ext, $allowed)) { 
          if ($file_error === 0) {
            if ($file_size < 2000000) {
              $file_name_new =  "recipe_" . "$recipe_id" . "_" . "$index" . "." . $file_ext;
              $file_destination = ('../../../uploads/') . $file_name_new;

              if (move_uploaded_file($file_tmp_name, $file_destination)) {
                $image_data = [
                  'recipe_id' => $recipe_id,
                  'image_line_item' => $index + 1,
                  'image_url' => $file_name_new
                ];

                $image = new Image($image_data);
                $image->save();

              } else {
                echo "Failed to move uploaded file.";
              }
            } else {
              echo "Your file is too big!";
            }
          } else {
            echo "There was an error uploading your file.";
          }
        } else {
          echo "You cannot upload images of that type!";
        }

        
        
    }
  }

// Check if video
  if (has_presence($_POST['youtube_url'])) {
// Pull substring out of youtube url for storage
    $youtube_url = $_POST['youtube_url'];
    $storage_link = set_video($youtube_url);
// Prepare and bind VIDEO table
    $stmt5 = $database->prepare("INSERT INTO video (recipe_id, youtube_url) VALUES (?,?)");
    $stmt5->bind_param("is", $recipe_id, $storage_link);
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
