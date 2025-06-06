<?php

require_once('../../../private/initialize.php');

require_admin_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/active_record/users/index.php'));
}
$id = $_GET['id'];
$user = User::find_by_id($id);

if ($user->role_id == 2 || $user->role_id == 3 ) {
  require_superadmin_login();
} else {
  require_admin_login();  
}

if ($user == false) {
    redirect_to(url_for('/active_record/users/index.php'));
}

if (is_post_request()) {

    // Save record using post parameters
    $args = $_POST['user'];
    $user->merge_attributes($args);
    $result = $user->save();

    if ($result === true) {
        $session->message('The user was updated successfully.');
        redirect_to(url_for('/active_record/users/show.php?id=' . $id));
    } else {
        // show errors
    }

} else {

    // display the form

}

?>

<?php $page_title = 'Edit User'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>



  <a href="<?php echo url_for('/active_record/users/index.php'); ?>"> Back to User List</a>

 
    <h2 class="text-center fs-1 my-4">Edit User</h2>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('/active_record/users/edit.php?id=' . h(u($id))); ?>" method="post" class="signup-form container p-4 shadow-sm bg-white rounded">

      <?php include('form_fields.php'); ?>

      <div class="d-flex justify-content-center mt-4">
        <input type="submit" value="Edit User" class="btn btn-warning border border-1 border-dark">
      </div>
     
    </form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
