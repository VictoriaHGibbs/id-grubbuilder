<?php

require_once('../../../private/initialize.php');

require_admin_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/active_record/users/index.php'));
}
$id = $_GET['id'];
$style = Style::find_by_id($id);
if ($style == false) {
    redirect_to(url_for('/active_record/users/index.php'));
}

if (is_post_request()) {

    // Save record using post parameters
    $args = $_POST['style'];
    $style->merge_attributes($args);
    $result = $style->save();

    if ($result === true) {
        $session->message('The style was updated successfully.');
        redirect_to(url_for('/active_record/users/index.php'));
    } else {
        // show errors
    }

} else {
    // display the form
}

?>

<?php $page_title = 'Edit Style'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>



  <a href="<?php echo url_for('/active_record/users/index.php'); ?>">Back to Admin Dashboard</a>

 
    <h2 class="text-center fs-1 my-4">Edit Style</h2>

    <?php echo display_errors($style->errors); ?>

    <form action="<?php echo url_for('/active_record/categories/style_edit.php?id=' . h(u($id))); ?>" method="post" class="container mt-4 d-flex justify-content-center">

      <div class="row w-50">
        <?php include('style_form.php'); ?>

        <div class="mt-4 text-center">
          <input type="submit" value="Edit Style" class="btn btn-warning border border-1 border-dark">
        </div>
      </div>
     
    </form>

 

<?php include(SHARED_PATH . '/user_footer.php'); ?>
