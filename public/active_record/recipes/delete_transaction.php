<?php 

// Transaction to delete rows from multiple tables at once

$database->begin_transaction();

try {
  $recipe_id = $_GET['id'];

  if (!empty(Ingredient::find_by_recipe_id($recipe_id))) {
  Ingredient::delete_all($recipe_id);
  }

  if (!empty(Direction::find_by_recipe_id($recipe_id))) {
  Direction::delete_all($recipe_id);
  }

  if (!empty(Image::find_by_recipe_id($recipe_id))) {
  Image::delete_all($recipe_id);
  }

  if (!empty(Video::find_by_recipe_id($recipe_id))) {
  Video::delete_all($recipe_id);
  }

  if (!empty(RecipeMealType::find_by_recipe_id($recipe_id))) {
  RecipeMealType::delete_all($recipe_id);
  }

  if (!empty(RecipeDiet::find_by_recipe_id($recipe_id))) {
  RecipeDiet::delete_all($recipe_id);
  }

  if (!empty(RecipeStyle::find_by_recipe_id($recipe_id))) {
  RecipeStyle::delete_all($recipe_id);
  }

  if (!empty(Rating::find_by_recipe_id($recipe_id))) {
  Rating::delete_all($recipe_id);
  }

  $recipe->delete();
  if (!$recipe->delete()) {
    throw new Exception("Failed to delete recipe.");
  }



  $database->commit();
  $message = "<p>Recipe and all associated data deleted successfully!</p>";
  $result = true;
  return $message;

} catch (Exception $e) {
  $database->rollback();
  $message =  "<p>Error deleting recipe: " . $e->getMessage() . "</p>";
  $result = false;
  return $message;
}
