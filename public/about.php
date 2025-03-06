<?php 
require_once('../private/initialize.php');

$page_title = 'About';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<h2>About</h2>
<p>This site provides an area to share recipes and connect with others.</p>

<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
