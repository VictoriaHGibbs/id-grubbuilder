<?php 
require_once('../private/initialize.php');

$page_title = 'Home';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<img src="<?php echo url_for('assets/images/sushi01.webp');?>" >

  



<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
