<?php

require_once('../../private/initialize.php');

$search = $_POST['search'];

// Put in if else for length of search. short ones go to query expansion
// Add in prepared/ bind_param

$sql = "SELECT * FROM recipe WHERE MATCH (recipe_title, description) ";
$sql .= "AGAINST ('" . $search . "' IN NATURAL LANGUAGE MODE)"; //exact match


$sql = "SELECT * FROM recipe WHERE MATCH (recipe_title, description) ";
$sql .= "AGAINST ('" . $search . "' WITH QUERY EXPANSION)"; //query expansion mode

// Drop down box to select the category look up tables?
