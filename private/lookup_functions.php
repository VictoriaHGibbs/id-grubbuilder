<?php

// Takes a lookup table name and creates the options for a dynamic drop down list
function all_from_lookup($table) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ";
  $sql .= "ORDER BY " . $table . " ASC";
  $result = mysqli_query($database, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row[$table . "_id"] . '">'  . $row[$table] . '</option>';
  }
}


// This one isnt working yet
// function find_value_by_id($id, $table) {
//   global $database;
//   $sql = "SELECT * FROM " . $table . " ";
//   $sql .=  "WHERE id='" . $id . "'";
//   $result = mysqli_query($database, $sql);
//   return $result;
// }

// Set measurement value from lookup table
// function set_measurement($recipe) {
//   global $database;
//   $measurement_id = $recipe->get_measurement_id();
//   $sql = "SELECT measurement FROM measurement WHERE measurement_id='" . $measurement_id . "'";
//   $measurement = mysqli_query($database, $sql);
//   return $measurement;
// }

// function find_value($id, $table) {
//   global $database;
//   $sql = "SELECT " . $table . " FROM " . $table . " ";
//   $sql .= "WHERE " . $table . "_id='" . $id . "'";
//   return mysqli_query($database, $sql);
// }
