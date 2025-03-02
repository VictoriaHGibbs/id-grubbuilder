<?php 

class Video extends DatabaseObject {
  static public $table_name = 'video';
  static public $db_columns = ['id', 'recipe_id', 'youtube_url'];

  public $id;
  public $recipe_id;
  public $youtube_url;

  public function __construct($args = []) {
    $this->recipe_id = $args['recipe_id'] ?? '';
    $this->youtube_url = $args['youtube_url'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    if (empty($this->youtube_url)) {
      $this->errors[] = "URL cannot be empty.";
    }
    
    return $this->errors;
  }
}
