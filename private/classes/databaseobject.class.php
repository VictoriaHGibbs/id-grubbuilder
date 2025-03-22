<?php

class DatabaseObject
{
  static protected $database;
  static protected $table_name = "";
  static protected $db_columns = [];
  
  public $errors = [];

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }

  static public function find_all_paginated($per_page, $pagination) {
    $sql = "SELECT * FROM " . static::$table_name;
    $sql .= " LIMIT " . $pagination->offset() . ", " . $per_page . ";";
    return static::find_by_sql($sql);
  }

  static public function count_all() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  static public function find_all_sort() {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "ORDER BY id";
    return static::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_recipe_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE recipe_id='" . self::$database->escape_string($id) . "'";
    if (static::$table_name == 'direction' || static::$table_name == 'ingredient' || static::$table_name == 'image') {
      $sql .= "ORDER BY sort_order";
    }
    $result = static::find_by_sql($sql);
    return $result;
  }

  static public function find_by_user_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE user_id='" . self::$database->escape_string($id) . "'";
    $result = static::find_by_sql($sql);
    return $result;
  }

  static public function find_by_user_role($role_id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE role_id='" . self::$database->escape_string($role_id) . "'";
    $result = static::find_by_sql($sql);
    return $result;
  }

  static protected function instantiate($record) {
    $object = new static;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  protected function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }

  protected function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  protected function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function save() {
    // A new record will not have an ID yet
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  // Properties which have database columns, excluding ID
  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;

    // After deleting, the instance of the object will still
    // exist, even though the database record does not.
    // This can be useful, as in:
    //   echo $user->first_name . " was deleted.";
    // but, for example, we can't call $user->update() after
    // calling $user->delete().
  }

  public static function delete_all($recipe_id) {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE recipe_id='" . self::$database->escape_string($recipe_id) . "' ";
    $result = self::$database->query($sql);
    return $result;
  }

  // Retrieve measurement id
  public function get_measurement_id() {
    return $this->measurement_id;
  }

  // Retrieves measurement name, takes object
  static public function get_measurement_name($object) {
    $measurement_id = $object->get_measurement_id();
    $sql = "SELECT measurement FROM measurement WHERE id='" . $measurement_id . "'";
    $result = self::$database->query($sql);
    $row = $result->fetch_assoc();
      return $row["measurement"];
  }

  // Search function
  static public function search($search_term, $per_page, $pagination) {
    $sql = "SELECT * FROM recipe WHERE MATCH (recipe_title, description) ";
    $sql .= "AGAINST ('" . self::$database->escape_string((string)$search_term) . "' IN NATURAL LANGUAGE MODE)";
    $sql .= " LIMIT " . $pagination->offset() . ", " . $per_page . ";";
    $search_results = static::find_by_sql($sql);
    return $search_results;
  }
  
  // Affected rows counter
  static public function search_row_counter($search_term) {
    $sql = "SELECT COUNT(*) FROM recipe WHERE MATCH (recipe_title, description) ";
    $sql .= "AGAINST ('" . self::$database->escape_string((string)$search_term) . "' IN NATURAL LANGUAGE MODE)";
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

}

