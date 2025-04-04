<?php

// Takes a lookup table name and creates the options for a dynamic drop down list
function all_from_lookup($table, $selected_value = null) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ";
  $sql .= "ORDER BY " . $table . " ASC";
  $result = mysqli_query($database, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $selected = ($selected_value == $row["id"]) ? 'selected' : '';
    if ($row["id"] == 16) {
      echo '<option value="' . $row["id"] . '" ' . $selected . '>Not Needed</option>';
    } else {
      echo '<option value="' . $row["id"] . '" ' . $selected . '>'  . ucwords($row[$table]) . '</option>';
    }
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
