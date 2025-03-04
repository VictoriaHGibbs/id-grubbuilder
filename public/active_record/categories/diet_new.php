<?php

require_once('../../../private/initialize.php');
require_admin_login();

if (is_post_request()) {

    // Create record using post parameters
    $args = $_POST['diet'];
    $diet = new Diet($args);
    $result = $diet->save();


    if ($result === true) {
        $session->message('The diet was created successfully.');
        redirect_to(url_for('/active_record/users/index.php'));
    } else {
        // show errors
    }
} else {
    // display the form
    $diet = new Diet;
}

?>

<?php $page_title = 'Add Diet'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>


<h1>Add Diet</h1>

<?php echo display_errors($diet->errors);
?>

<form action="<?php echo url_for('/active_record/categories/diet_new.php'); ?>" method="post">

    <?php include('diet_form.php'); ?>


    <input type="submit" value="Add Diet">

</form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
