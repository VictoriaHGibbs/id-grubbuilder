<?php 

class MealType extends DatabaseObject {
  static public $table_name = 'meal_type';
  static public $db_columns = ['id', 'meal_type'];

  public $id;
  public $meal_type;

  public function __construct($args = []) {
    $this->meal_type = $args['meal_type'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    // CHECK FOR DUPLICATES
    
    return $this->errors;
  }
}
