<?php

class Recipe extends DatabaseObject {

  static public $table_name = 'recipe';
  static public $primary_key = 'recipe_id';
  static public $db_columns = ['recipe_id', 'user_id', 'recipe_title', 'prep_time_minutes', 'cook_time_minutes', 'description', 'created_at', 'yield', 'yield_measurement_id', 'servings', 'visibility_id'];

  public $recipe_id;
  public $user_id;
  public $recipe_title;
  public $prep_time_minutes;
  public $cook_time_minutes;
  public $description;
  public $created_at;
  public $yield;
  public $measurement_id;
  public $servings;
  public $visibility_id;

  public $video_link;


  public function __construct($args = []) {
    $this->user_id = $args['user_id'] ?? '';
    $this->recipe_title = $args['recipe_title'] ?? '';
    $this->prep_time_minutes = $args['prep_time_minutes'] ?? '';
    $this->cook_time_minutes = $args['cook_time_minutes'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->created_at = $args['created_at'] ?? '';
    $this->yield = $args['yield'] ?? '';
    $this->measurement_id = $args['yield_measurement_id'] ?? '';
    $this->servings = $args['servings'] ?? '';
    $this->visibility_id = $args['visibility_id'] ?? '';
  }

// Display recipe info, TESTING PURPOSES
  public function display() {
    return ("Recipe ID: " . $this->recipe_id . "<br>" . $this->recipe_title . "<br>" . $this->description . "<br>User ID:" . $this->user_id);
  }

// Retrieve associated ingredients
  static public function get_ingredients($recipe_id) {
    return Ingredient::find_by_recipe($recipe_id);
  }

// Display ingredients
  static public function ingredients($recipe_id) {
    global $database;
    $ingredients = Recipe::get_ingredients($recipe_id);
    echo "<ul>";
    foreach ($ingredients as $ingredient) {
      $measurement = $ingredient->find_value($ingredient);
      if ($ingredient->quantity > 1) $measurement .= "s";
      echo  "<li>" . abs($ingredient->quantity) . " " . $measurement . " " . $ingredient->ingredient_name . "</li>";
    };
    echo "</ul>";
  }
  
// Retrieve associated directions
  static public function get_directions($recipe_id) {
    return Direction::find_by_recipe($recipe_id);
  }

// Display directions
  static public function directions($recipe_id) {
    $directions = Recipe::get_directions($recipe_id);
    echo "<ol>";
    foreach ($directions as $direction) {
      echo "<li>" . $direction->direction_text . "</li>";
    };
    echo "</ol>";
  }

// Retrieve user info
  public function get_user_id() {
    return $this->user_id;
  }

// Display user info, takes recipe object
  static public function user_info($recipe) {
      $user_id = $recipe->get_user_id();
      $username = User::get_username_by_id($user_id);
      echo "Created by: " . $username;
  }
  
  public function get_video($recipe_id) {
    global $database;
    $sql = "SELECT youtube_url FROM video WHERE recipe_id='" . $recipe_id . "'";
    $result = $database->query($sql);
    if ($database->affected_rows > 0) {
      $row = $result->fetch_assoc();
      return $row["youtube_url"];
    }
  }

}
