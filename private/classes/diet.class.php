<?php 

class Diet extends DatabaseObject {
  static public $table_name = 'recipe_diet';
  static public $db_columns = ['id', 'diet_id', 'recipe_id'];

  public $id;
  public $diet_id;
  public $recipe_id;

  public function __construct($args = []) {
    $this->diet_id = $args['diet_id'] ?? '';
    $this->recipe_id = $args['recipe_id'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    if (empty($this->diet_id)) {
      $this->errors[] = "URL cannot be empty.";
    }
    
    return $this->errors;
  }
}
