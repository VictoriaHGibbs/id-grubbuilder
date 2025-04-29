<?php

/**
 * Fetches all rows from a specified lookup table and generates HTML <option> elements.
 *
 * This function queries the database for all rows in the specified table, orders them
 * alphabetically by the table name, and generates <option> elements for use in a 
 * dropdown menu. If a `$selected_value` is provided, the corresponding <option> 
 * will be marked as selected. Additionally, if the table is 'measurement' and the 
 * row ID is 16, the option text will be set to "Not Needed".
 *
 * @param string $table The name of the lookup table to query.
 * @param int|null $selected_value (Optional) The ID of the row to mark as selected.
 *
 * @global mysqli $database The global database connection object.
 *
 * @return void Outputs HTML <option> elements directly.
 */
function all_from_lookup($table, $selected_value = null) {
  global $database;
  $sql = "SELECT * FROM " . $table . " ";
  $sql .= "ORDER BY " . $table . " ASC";
  $result = mysqli_query($database, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $selected = ($selected_value == $row["id"]) ? 'selected' : '';
    if ($row["id"] == 16 && $table == 'measurement') {
      echo '<option value="' . $row["id"] . '" ' . $selected . '>Not Needed</option>';
    } else {
      echo '<option value="' . $row["id"] . '" ' . $selected . '>'  . ucwords($row[$table]) . '</option>';
    }
  }
}

/**
 * Finds a value from a lookup table based on the given ID.
 *
 * @param int|string $id The ID of the record to look up.
 * @param string $table The name of the table and column to query.
 * @return string|null The formatted value from the lookup table, or null if not found.
 *
 * @global mysqli $database The global database connection.
 */
function find_value_from_lookup($id, $table) {
  global $database;
  $sql = "SELECT " . $table . " FROM " . $table . " ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query($database, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    return ucwords($row[$table]);
  }
}
