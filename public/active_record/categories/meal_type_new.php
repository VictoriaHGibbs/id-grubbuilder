<?php

require_once('../../../private/initialize.php');
require_admin_login();

if (is_post_request()) {

    // Create record using post parameters
    $args = $_POST['meal_type'];
    $meal_type = new MealType($args);
    $result = $meal_type->save();


    if ($result === true) {
        $session->message('The meal type was created successfully.');
        redirect_to(url_for('/active_record/users/index.php'));
    } else {
        // show errors
    }
} else {
    // display the form
    $meal_type = new MealType;
}

?>

<?php $page_title = 'Add Meal Type'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>


<h1>Add Meal Type</h1>

<?php echo display_errors($meal_type->errors);
?>

<form action="<?php echo url_for('/active_record/categories/meal_type_new.php'); ?>" method="post">

    <?php include('meal_type_form.php'); ?>


    <input type="submit" value="Add Meal Type">

</form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
