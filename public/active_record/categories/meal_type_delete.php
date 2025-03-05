<?php

require_once('../../../private/initialize.php');

require_admin_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/active_record/users/index.php'));
}
$id = $_GET['id'];
$meal_type = MealType::find_by_id($id);
if($meal_type == false) {
  redirect_to(url_for('/active_record/users/index.php'));
}

if(is_post_request()) {
  $result = $meal_type->delete();
  $session->message('The meal type was deleted successfully.');
  redirect_to(url_for('/active_record/users/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Meal Type'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

  <a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>

    <h1>Delete Meal Type</h1>
    <p>Are you sure you want to delete this meal type?</p>
    <p><?php echo h($meal_type->meal_type); ?></p>

    <form action="<?php echo url_for('/active_record/categories/meal_type_delete.php?id=' . h(u($id))); ?>" method="post">

        <input type="submit" name="commit" value="Delete Meal Type">
     
    </form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
