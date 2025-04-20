<?php

require_once('../../../private/initialize.php');

require_admin_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/active_record/users/index.php'));
}
$id = $_GET['id'];
$user = User::find_by_id($id);

if ($user->role_id == 2 || $user->role_id == 3 ) {
  require_superadmin_login();
} else {
  require_admin_login();  
}

if($user == false) {
  redirect_to(url_for('/active_record/users/index.php'));
}

if(is_post_request()) {
  $result = $user->delete();
  $session->message('The user was deleted successfully.');
  redirect_to(url_for('/active_record/users/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete User'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

  <a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to User List</a>

    <div class="container">
      <h2 class="text-center fs-1 my-4">Delete User</h2>
      <p class="text-center">Are you sure you want to delete this user?</p>
      <p class="fs-3 text-center"><?php echo h($user->username); ?></p>
      <form action="<?php echo url_for('/active_record/users/delete.php?id=' . h(u($id))); ?>" method="post" class="container mt-4">

        <div class="d-flex justify-content-center mt-4">
          <input type="submit" name="commit" value="Delete User" class="btn btn-warning border border-1 border-dark">
        </div>
      
      </form>
    </div>


<?php include(SHARED_PATH . '/user_footer.php'); ?>
