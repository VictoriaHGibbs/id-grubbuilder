<?php

require_once('../../../private/initialize.php');
// require_login();

?>

<?php $page_title = 'Create Recipe'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>



  <a class="back-link" href="<?php echo url_for('/active_record/recipes/index.php'); ?>">&laquo; Back to List</a>

  
    <h2>Create Recipe</h2>

    <?php //echo display_errors($recipe->errors); ?>

    <form action="<?php echo url_for('/active_record/recipes/new.php'); ?>" method="post" enctype="multipart/form-data">

      <?php include('form_fields.php'); ?>

      
      <input type="submit" value="Create Recipe">
      
    </form>

  



<?php include(SHARED_PATH . '/user_footer.php'); ?>
