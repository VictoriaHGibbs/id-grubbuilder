<?php 

class MealType extends DatabaseObject {
  static public $table_name = 'recipe_meal_type';
  static public $db_columns = ['id', 'meal_type_id', 'recipe_id'];

  public $id;
  public $meal_type_id;
  public $recipe_id;

  public function __construct($args = []) {
    $this->meal_type_id = $args['meal_type_id'] ?? '';
    $this->recipe_id = $args['recipe_id'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    if (empty($this->meal_type_id)) {
      $this->errors[] = "URL cannot be empty.";
    }
    
    return $this->errors;
  }
}
