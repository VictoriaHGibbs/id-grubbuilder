<?php 

class MealType extends DatabaseObject {
  static public $table_name = 'meal_type';
  static public $db_columns = ['id', 'meal_type'];

  public $id;
  public $meal_type;

  public function __construct($args = []) {
    $this->meal_type = $args['meal_type'] ?? '';
  }

  /**
   * Saves the current meal type object to the database.
   *
   * This method converts the `meal_type` property to lowercase
   * before calling the parent `save` method to persist the data.
   *
   * @return mixed The result of the parent `save` method, which
   *               could be a boolean or another type depending
   *               on the implementation of the parent class.
   */
  public function save() {
    $this->meal_type = strtolower($this->meal_type);
    return parent::save();
  }

  protected function validate()
  {
    $this->errors = [];

    // CHECK FOR DUPLICATES
    
    return $this->errors;
  }
}
