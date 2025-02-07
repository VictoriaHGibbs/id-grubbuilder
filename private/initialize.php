<?php 

ob_start();

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
define("IMAGE_PATH", PUBLIC_PATH . '/images');




$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('db_credentials.php');
require_once('database_functions.php');
require_once('functions.php');




// -> All classes in directory
foreach (glob('classes/*.class.php') as $file) {
  require_once($file);
}

// Autoload class definitions
function my_autoload($class)
{
  $class = strtolower($class);
  if (preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . $class . '.class.php');
  }
}
spl_autoload_register('my_autoload');

$database = db_connect();
