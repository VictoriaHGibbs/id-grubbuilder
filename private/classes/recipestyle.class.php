<?php 

class RecipeStyle extends DatabaseObject {
  static public $table_name = 'recipe_style';
  static public $db_columns = ['id', 'style_id', 'recipe_id'];

  public $id;
  public $style_id;
  public $recipe_id;

  public function __construct($args = []) {
    $this->style_id = $args['style_id'] ?? '';
    $this->recipe_id = $args['recipe_id'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    if (empty($this->style_id)) {
      $this->errors[] = "Choose at least one style.";
    }
    
    return $this->errors;
  }
}
