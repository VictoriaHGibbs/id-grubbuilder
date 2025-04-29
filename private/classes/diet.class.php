<?php 

class Diet extends DatabaseObject {
  static public $table_name = 'diet';
  static public $db_columns = ['id', 'diet'];

  public $id;
  public $diet;

  public function __construct($args = []) {
    $this->diet = $args['diet'] ?? '';
  }

  /**
   * Saves the current diet object to the database.
   *
   * This method converts the diet property to lowercase before saving
   * to ensure consistency. It then calls the parent class's save method
   * to perform the actual save operation.
   *
   * @return mixed The result of the parent save method, which could vary
   *               depending on the implementation of the parent class.
   */
  public function save() {
    $this->diet = strtolower($this->diet);
    return parent::save();
  }

  protected function validate()
  {
    $this->errors = [];

    // CHECK FOR DUPLICATES
    
    return $this->errors;
  }
}
