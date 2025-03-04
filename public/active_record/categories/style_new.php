<?php

require_once('../../../private/initialize.php');
require_admin_login();

if (is_post_request()) {

    // Create record using post parameters
    $args = $_POST['style'];
    $style = new Style($args);
    $result = $style->save();


    if ($result === true) {
        $session->message('The style was created successfully.');
        redirect_to(url_for('/active_record/users/index.php'));
    } else {
        // show errors
    }
} else {
    // display the form
    $style = new Style;
}

?>

<?php $page_title = 'Add style'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>


<h1>Add Style</h1>

<?php echo display_errors($style->errors);
?>

<form action="<?php echo url_for('/active_record/categories/style_new.php'); ?>" method="post">

    <?php include('style_form.php'); ?>


    <input type="submit" value="Add Style">

</form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
