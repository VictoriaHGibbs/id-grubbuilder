<?php

require_once('../../../private/initialize.php');
require_admin_login();

if (is_post_request()) {

    // Create record using post parameters
    $args = $_POST['user'];
    $user = new User($args);
    $result = $user->save();


    if ($result === true) {
        $new_id = $user->id;
        $session->message('The user was created successfully.');
        redirect_to(url_for('/active_record/users/show.php?id=' . $new_id));
    } else {
        // show errors
    }
} else {
    // display the form
    $user = new User;
}

?>

<?php $page_title = 'Create User'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<a href="<?php echo url_for('/active_record/users/index.php'); ?>"> Back to User List</a>


<h2 class="text-center fs-1 my-4">Create User</h2>

<?php echo display_errors($user->errors);?>

<form action="<?php echo url_for('/active_record/users/new.php'); ?>" method="post" class="signup-form container p-4 shadow-sm bg-white rounded">

    <?php include('form_fields.php'); ?>

    <div class="d-flex justify-content-center mt-4">
      <input type="submit" value="Create User" class="btn btn-warning border border-1 border-dark">
    </div>

</form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
