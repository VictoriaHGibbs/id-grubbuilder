<?php

require_once('../../../private/initialize.php');

require_admin_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/active_record/users/index.php'));
}
$id = $_GET['id'];
$meal_type = MealType::find_by_id($id);
if ($meal_type == false) {
    redirect_to(url_for('/active_record/users/index.php'));
}

if (is_post_request()) {

    // Save record using post parameters
    $args = $_POST['meal_type'];
    $meal_type->merge_attributes($args);
    $result = $meal_type->save();

    if ($result === true) {
        $session->message('The meal type was updated successfully.');
        redirect_to(url_for('/active_record/users/index.php'));
    } else {
        // show errors
    }
} else {
    // display the form
}

?>

<?php $page_title = 'Edit Meal Type'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

  <a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>

 
    <h2 class="text-center fs-1 my-4">Edit Meal Type</h2>

    <?php echo display_errors($meal_type->errors); ?>

    <form action="<?php echo url_for('/active_record/categories/meal_type_edit.php?id=' . h(u($id))); ?>" method="post" class="container mt-4 d-flex justify-content-center">

    <div class="row w-50">
      <?php include('meal_type_form.php'); ?>

      <div class="mt-4 text-center">
        <input type="submit" value="Edit Meal Type" class="btn btn-warning border border-1 border-dark">
      </div>
    </div>
     
    </form>

 
<?php include(SHARED_PATH . '/user_footer.php'); ?>
