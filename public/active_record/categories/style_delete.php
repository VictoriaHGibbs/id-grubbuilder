<?php

require_once('../../../private/initialize.php');

require_admin_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/active_record/users/index.php'));
}
$id = $_GET['id'];
$style = Style::find_by_id($id);
if($style == false) {
  redirect_to(url_for('/active_record/users/index.php'));
}

if(is_post_request()) {
  $result = $style->delete();
  $session->message('The style was deleted successfully.');
  redirect_to(url_for('/active_record/users/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Style'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

  <a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>

    <h1>Delete Style</h1>
    <p>Are you sure you want to delete this style?</p>
    <p><?php echo h($style->style); ?></p>

    <form action="<?php echo url_for('/active_record/categories/delete.php?id=' . h(u($id))); ?>" method="post">

        <input type="submit" name="commit" value="Delete Style">
     
    </form>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
