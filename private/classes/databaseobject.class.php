<?php

class DatabaseObject
{
  static protected $database;
  static protected $table_name = "";
  static protected $db_columns = [];
  
  public $errors = [];

  /**
   * Sets the database connection for the class.
   *
   * @param object $database The database connection object to be used.
   * @return void
   */
  static public function set_database($database) {
    self::$database = $database;
  }

  /**
   * Executes a given SQL query and returns the results as an array of objects.
   *
   * @param string $sql The SQL query to be executed.
   * @return array An array of objects instantiated from the query results.
   * @throws Exception If the database query fails.
   */
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

  /**
   * Finds all records in the database table and returns them as an array of objects.
   *
   * @return array An array of objects instantiated from the records in the database table.
   */
  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }


  /**
   * Retrieves all records from the database table in a paginated manner.
   *
   * @param int $per_page The number of records to display per page.
   * @param object $pagination An object that provides pagination details, including the offset.
   * @return array An array of objects representing the records retrieved from the database.
   */
  static public function find_all_paginated($per_page, $pagination) {
    $sql = "SELECT * FROM " . static::$table_name;
    $sql .= " LIMIT " . $pagination->offset() . ", " . $per_page . ";";
    return static::find_by_sql($sql);
  }

  /**
   * Counts the total number of records in the database table.
   *
   * @return int The total number of records in the database table.
   */
  static public function count_all() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  /**
   * Finds all records in the database table and sorts them by ID.
   *
   * @return array An array of objects instantiated from the records in the database table, sorted by ID.
   */
  static public function find_all_sort() {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "ORDER BY id";
    return static::find_by_sql($sql);
  }

  
  /**
   * Finds a record in the database by its ID.
   *
   * This method constructs a SQL query to select a record from the database
   * table defined by the static property `$table_name`, where the `id` column
   * matches the provided ID. If a matching record is 
   * found, it is returned as an object; otherwise, `false` is returned.
   *
   * @param mixed $id The ID of the record to find. It is typically an integer or string.
   * @return static|false Returns an instance of the class if a record is found, or `false` if no record is found.
   */
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

  /**
   * Finds a record in the database by its recipe ID.
   *
   * This method constructs a SQL query to select records from the database
   * table defined by the static property `$table_name`, where the `recipe_id` column
   * matches the provided ID. The results are sorted by `sort_order` if applicable.
   *
   * @param mixed $id The recipe ID of the records to find. It is typically an integer or string.
   * @return array An array of objects representing the records found, or an empty array if no records are found.
   */
  static public function find_by_recipe_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE recipe_id='" . self::$database->escape_string($id) . "'";
    if (static::$table_name == 'direction' || static::$table_name == 'ingredient' || static::$table_name == 'image') {
      $sql .= "ORDER BY sort_order";
    }
    $result = static::find_by_sql($sql);
    return $result;
  }

  /**
   * Finds a record in the database by its user ID.
   *
   * This method constructs a SQL query to select records from the database
   * table defined by the static property `$table_name`, where the `user_id` column
   * matches the provided ID. 
   *
   * @param mixed $id The user ID of the records to find. It is typically an integer or string.
   * @return array An array of objects representing the records found, or an empty array if no records are found.
   */
  static public function find_by_user_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE user_id='" . self::$database->escape_string($id) . "'";
    $result = static::find_by_sql($sql);
    return $result;
  }

  /**
   * Finds a record in the database by its user ID with pagination.
   *
   * This method constructs a SQL query to select records from the database
   * table defined by the static property `$table_name`, where the `user_id` column
   * matches the provided ID. The results are limited by the specified pagination parameters.
   *
   * @param mixed $id The user ID of the records to find. It is typically an integer or string.
   * @param int $per_page The number of records to display per page.
   * @param object $pagination An object that provides pagination details, including the offset.
   * @return array An array of objects representing the records found, or an empty array if no records are found.
   */
  static public function find_by_user_id_paginated($id, $per_page, $pagination) {
    $sql = "SELECT * FROM " . static::$table_name;
    $sql .= " WHERE user_id='" . self::$database->escape_string($id) . "'";
    $sql .= " LIMIT " . $pagination->offset() . ", " . $per_page . ";";
    return static::find_by_sql($sql);
  }

  /**
   * Finds a record in the database by its rater user ID.
   *
   * This method constructs a SQL query to select records from the database
   * table defined by the static property `$table_name`, where the `rater_user_id` column
   * matches the provided ID. 
   *
   * @param mixed $id The rater user ID of the records to find. It is typically an integer or string.
   * @return array An array of objects representing the records found, or an empty array if no records are found.
   */
  static public function find_rating_by_user_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE rater_user_id='" . self::$database->escape_string($id) . "'";
    $result = static::find_by_sql($sql);
    return $result;
  }

  /**
   * Counts the total number of records in the database table for a specific user ID.
   *
   * @param mixed $id The user ID to count records for. It is typically an integer or string.
   * @return int The total number of records for the specified user ID.
   */
  static public function count_all_by_user_id($id) {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $sql .= " WHERE user_id='" . self::$database->escape_string($id) . "'";
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  /**
   * Finds a record in the database by its role ID.
   *
   * This method constructs a SQL query to select records from the database
   * table defined by the static property `$table_name`, where the `role_id` column
   * matches the provided ID. 
   *
   * @param mixed $role_id The role ID of the records to find. It is typically an integer or string.
   * @return array An array of objects representing the records found, or an empty array if no records are found.
   */
  static public function find_by_user_role($role_id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE role_id='" . self::$database->escape_string($role_id) . "'";
    $result = static::find_by_sql($sql);
    return $result;
  }


  /**
   * Instantiates an object of the calling class and assigns property values from a given record.
   *
   * @param array $record An associative array where keys correspond to property names
   *                      and values correspond to the values to be assigned to those properties.
   * 
   * @return static An instance of the calling class with properties populated from the record.
   */
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

  /**
   * Validates the object before saving it to the database.
   *
   * This method is intended to be overridden in subclasses to provide custom validation logic.
   * It should return an array of error messages if validation fails, or an empty array if validation passes.
   *
   * @return array An array of error messages, or an empty array if validation passes.
   */
  protected function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }

  /**
   * Creates a new record in the database for the current object.
   *
   * This method validates the object, sanitizes its attributes, and constructs
   * an SQL `INSERT` statement to add the object to the database. If the operation
   * is successful, the object's `id` property is updated with the newly generated
   * database ID.
   *
   * @return bool Returns `true` if the record was successfully created, or `false`
   *              if validation fails or the database query is unsuccessful.
   */
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

  /**
   * Updates the current record in the database with the object's attributes.
   *
   * This method validates the object's attributes before updating the record.
   * If validation fails, the method returns false. Otherwise, it constructs
   * an SQL `UPDATE` query using the sanitized attributes and executes it.
   *
   * @return bool True if the update was successful, false otherwise.
   */
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

  /**
   * Saves the current object to the database.
   *
   * If the object has an ID, it updates the existing record in the database.
   * Otherwise, it creates a new record.
   *
   * @return bool Returns true on success, false on failure.
   */
  public function save() {
    // A new record will not have an ID yet
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  /**
   * Merges the provided attributes into the current object.
   *
   * This method iterates over the given associative array of attributes
   * and assigns the values to the corresponding properties of the object,
   * but only if the property exists in the object and the value is not null.
   *
   * @param array $args An associative array of attributes to merge, 
   *                    where the keys are property names and the values 
   *                    are the values to assign.
   * @return void
   */
  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  /**
   * Retrieves an associative array of object properties that correspond to 
   * database columns, excluding the 'id' column.
   *
   * @return array An associative array where the keys are the database column 
   *               names (excluding 'id') and the values are the corresponding 
   *               property values of the object.
   */
  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }


  /**
   * Sanitizes the attributes of the object by escaping special characters
   * to prevent SQL injection or other security vulnerabilities.
   *
   * This method iterates through the object's attributes, escapes each value
   * using the database's `escape_string` method, and returns the sanitized
   * attributes as an associative array.
   *
   * @return array An associative array of sanitized attributes where the keys
   *               are attribute names and the values are the escaped values.
   */
  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  /**
   * Deletes the current record from the database.
   *
   * Constructs and executes a SQL DELETE statement to remove the record
   * associated with the current object's `id` property from the database table
   * defined by the static `$table_name` property. The `id` value is escaped
   * to prevent SQL injection. The query is limited to one record.
   *
   * @return bool|mysqli_result Returns the result of the query execution. 
   *                            Typically `true` on success or `false` on failure.
   */
  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  /**
   * Deletes all records from the database table for a specific recipe ID.
   *
   * Constructs and executes a SQL DELETE statement to remove all records
   * associated with the provided `recipe_id` from the database table defined
   * by the static `$table_name` property. The `recipe_id` value is escaped
   * to prevent SQL injection.
   *
   * @param mixed $recipe_id The recipe ID of the records to delete. It is typically an integer or string.
   * @return bool|mysqli_result Returns the result of the query execution. 
   *                            Typically `true` on success or `false` on failure.
   */
  public static function delete_all($recipe_id) {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE recipe_id='" . self::$database->escape_string($recipe_id) . "' ";
    $result = self::$database->query($sql);
    return $result;
  }

  /**
   * Retrieves the measurement ID associated with the object.
   *
   * @return mixed The measurement ID of the object.
   */
  public function get_measurement_id() {
    return $this->measurement_id;
  }

  /**
   * Retrieves the measurement name associated with the object.
   *
   * @param object $object The object for which to retrieve the measurement name.
   * @return string The measurement name associated with the object.
   */
  static public function get_measurement_name($object) {
    $measurement_id = $object->get_measurement_id();
    $sql = "SELECT measurement FROM measurement WHERE id='" . $measurement_id . "'";
    $result = self::$database->query($sql);
    $row = $result->fetch_assoc();
      return $row["measurement"];
  }


  /**
   * Searches for recipes in the database based on a search term.
   *
   * This method performs a full-text search on the `recipe` table using the
   * `MATCH ... AGAINST` SQL syntax in natural language mode. It retrieves
   * results that match the given search term and applies pagination.
   *
   * @param string $search_term The term to search for in the `recipe_title` and `description` fields.
   * @param int $per_page The number of results to display per page.
   * @param object $pagination An object that provides the offset for pagination.
   * 
   * @return array An array of search results as objects of the calling class.
   */
  static public function search($search_term, $per_page, $pagination) {
    $sql = "SELECT * FROM recipe WHERE MATCH (recipe_title, description) ";
    $sql .= "AGAINST ('" . self::$database->escape_string((string)$search_term) . "' IN NATURAL LANGUAGE MODE)";
    $sql .= " LIMIT " . $pagination->offset() . ", " . $per_page . ";";
    $search_results = static::find_by_sql($sql);
    return $search_results;
  }
  
  /**
   * Counts the number of rows that match a search term in the `recipe` table.
   *
   * This method performs a full-text search on the `recipe` table using the
   * `MATCH ... AGAINST` SQL syntax in natural language mode. It counts the
   * number of results that match the given search term.
   *
   * @param string $search_term The term to search for in the `recipe_title` and `description` fields.
   * 
   * @return int The count of rows that match the search term.
   */
  static public function search_row_counter($search_term) {
    $sql = "SELECT COUNT(*) FROM recipe WHERE MATCH (recipe_title, description) ";
    $sql .= "AGAINST ('" . self::$database->escape_string((string)$search_term) . "' IN NATURAL LANGUAGE MODE)";
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

}
