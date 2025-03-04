<?php 

class Style extends DatabaseObject {
  static public $table_name = 'style';
  static public $db_columns = ['id', 'style'];

  public $id;
  public $style;


  public function __construct($args = []) {
    $this->style = $args['style'] ?? '';

  }

  protected function validate()
  {
    $this->errors = [];

    // CHECK FOR DUPLICATES
    
    return $this->errors;
  }
}
