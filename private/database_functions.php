<?php

/**
 * Establishes a connection to the database using MySQLi.
 *
 * @return mysqli Returns a MySQLi connection object.
 * @throws Exception If the database connection fails, an exception is thrown
 *                   by the confirm_db_connect() function.
 */
function db_connect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect($connection);
  return $connection;
}

/**
 * Confirms the database connection and exits with an error message if the connection fails.
 *
 * @param mysqli $connection The database connection object to be checked.
 *
 * @return void This function does not return a value. It exits the script if the connection fails.
 */
function confirm_db_connect($connection) {
  if($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

/**
 * Closes the database connection if it is set.
 *
 * This function checks if the provided database connection is set,
 * and if so, it closes the connection to free up resources.
 *
 * @param mysqli|null $connection The database connection object to be closed.
 *                                If null, the function does nothing.
 * @return void
 */
function db_disconnect($connection) {
  if(isset($connection)) {
    $connection->close();
  }
}

?>
