<!-- Recipe specific information -->
<?php

class Recipe extends DatabaseObject {
  
  static public $table_name = 'recipe';
  static public $db_columns = ['recipe_id', 'user_id', 'recipe_title', 'prep_time_minutes', 'cook_time_minutes', 'description', 'created_at', 'yield', 'yield_measurement_id', 'servings', 'visibility_id'];

  public $recipe_id;
  public $user_id;
  public $recipe_title;
  public $prep_time_minutes;
  public $cook_time_minutes;
  public $description;
  public $created_at;
  public $yield;
  public $yield_measurement_id;
  public $servings;
  public $visibility_id;

  public function __construct($args=[]) {
    $this->user_id = $args['user_id'] ?? '';
    $this->recipe_title = $args['recipe_title'] ?? '';
    $this->prep_time_minutes = $args['prep_time_minutes'] ?? '';
    $this->cook_time_minutes = $args['cook_time_minutes'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->created_at = $args['created_at'] ?? '';
    $this->yield = $args['yield'] ?? '';
    $this->yield_measurement_id = $args['yield_measurement_id'] ?? '';
    $this->servings = $args['servings'] ?? '';
    $this->visibility_id = $args['visibility_id'] ?? '';
  }

}
