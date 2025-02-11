<?php

function all_from_lookup($table) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ORDER BY " . $table . "_id ASC";
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
