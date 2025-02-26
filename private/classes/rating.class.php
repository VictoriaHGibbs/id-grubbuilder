<?php 

class Rating extends DatabaseObject {

  static public $table_name = 'rating';
  static public $db_columns = ['id', 'recipe_id', 'rater_user_id', 'rating_level', 'created_at'];

  public $id;
  public $recipe_id;
  public $rater_user_id;
  public $rating_level;
  public $created_at;

  public function __construct($args = []) {
    $this->recipe_id = $args['recipe_id'] ?? '';
    $this->rater_user_id = $args['rater_user_id'] ?? '';
    $this->rating_level = $args['rating_level'] ?? '';
    $this->created_at = $args['created_at'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    if (empty($this->rating_level)) {
      $this->errors[] = "Rating cannot be empty.";
    }
    
    return $this->errors;
  }
}
