<?php

// Takes a lookup table name and creates the options for a dynamic drop down list
function all_from_lookup($table) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ";
  $sql .= "ORDER BY " . $table . " ASC";
  $result = mysqli_query($database, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row["id"] . '">'  . ucwords($row[$table]) . '</option>';
  }
}

function find_value_from_lookup($id, $table) {
  global $database;
  $sql = "SELECT " . $table . " FROM " . $table . " ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query($database, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    echo ucwords($row[$table]);
  }
}
