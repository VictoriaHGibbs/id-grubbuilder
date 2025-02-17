<?php

function all_from_lookup($table) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ";
  $sql .= "ORDER BY " . $table . "_id ASC";
  $result = mysqli_query($database, $sql);
  return $result;
}

function find_value_by_id($id, $table) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ";
  $sql .=  "WHERE id='" . $id . "'";
  $result = mysqli_query($database, $sql);
  return $result;
}

// Set measurement value from lookup table
function set_measurement($recipe) {
  global $database;
  $measurement_id = $recipe->get_measurement_id();
  $sql = "SELECT measurement FROM measurement WHERE measurement_id='" . $measurement_id . "'";
  $measurement = mysqli_query($database, $sql);
  return $measurement;
}

// function find_value($id, $table) {
//   global $database;
//   $sql = "SELECT " . $table . " FROM " . $table . " ";
//   $sql .= "WHERE " . $table . "_id='" . $id . "'";
//   return mysqli_query($database, $sql);
// }
