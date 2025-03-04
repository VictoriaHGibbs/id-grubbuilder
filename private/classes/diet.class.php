<?php 

class Diet extends DatabaseObject {
  static public $table_name = 'diet';
  static public $db_columns = ['id', 'diet'];

  public $id;
  public $diet;

  public function __construct($args = []) {
    $this->diet = $args['diet'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    // CHECK FOR DUPLICATES
    
    return $this->errors;
  }
}
