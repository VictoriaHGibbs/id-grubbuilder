<?php 

class Style extends DatabaseObject {
  static public $table_name = 'style';
  static public $db_columns = ['id', 'style'];

  public $id;
  public $style;


  public function __construct($args = []) {
    $this->style = $args['style'] ?? '';
  }

  /**
   * Saves the current style object.
   *
   * This method converts the style property to lowercase
   * before calling the parent class's save method to persist
   * the changes.
   *
   * @return mixed The result of the parent save method.
   */
  public function save() {
    $this->style = strtolower($this->style);
    return parent::save();
  }

  protected function validate()
  {
    $this->errors = [];

    // CHECK FOR DUPLICATES
    
    return $this->errors;
  }
}
