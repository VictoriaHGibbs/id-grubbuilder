<?php
require_once('../../../private/initialize.php');
require_admin_login();

$id = $_SESSION['user_id'] ?? false;
$users = User::find_by_user_role(1);
$admins = User::find_by_user_role(2);
$diets = Diet::find_all_sort();
$meal_types = MealType::find_all_sort();
$styles = Style::find_all_sort();

$page_title = 'Admin Dashboard';

include(SHARED_PATH . '/user_header.php');
?>


<h2 class="text-center mb-4">Admin User Dashboard</h2>

<section class="table-responsive">
  <table class="table table-warning table-hover align-middle shadow-sm">
    <h3 class="text-center mb-3">List of Users</h3>
    <div class="mb-3">
      <a href="<?php echo url_for('/active_record/users/new.php') ?>" class="btn btn-warning ">Manually Add User</a>
    </div>
      <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Level</th>
            <th>Active</th>
            <th>Date Joined</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
      </thead>
  
      <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo h($user->id); ?></td>
                <td><?php echo h($user->username); ?></td>
                <td><?php echo h($user->email_address); ?></td>
                <td><?php echo find_value_from_lookup(h($user->role_id), 'role'); ?></td>
                <td><?php echo h($user->active_display()); ?></td>
                <td><?php echo h($user->joined_at); ?></td>
                <td><a href="<?php echo url_for('/active_record/users/show.php?id=' . h(u($user->id))); ?>" class="btn btn-warning btn-sm">View</a></td>
                <td><a href="<?php echo url_for('/active_record/users/edit.php?id=' . h(u($user->id))); ?>" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="<?php echo url_for('/active_record/users/delete.php?id=' . h(u($user->id))); ?>" class="btn btn-warning btn-sm">Delete</a></td>
            </tr>
        <?php } ?>
      </tbody>
  </table>
</section>

<!-- ****************************** SUPER ADMIN ONLY  ********************* -->
<?php if($session->is_superadmin_logged_in()) { ?>

  <section class="table-responsive">
    <table class="table table-warning table-hover align-middle shadow-sm">
      <h3 class="text-center mb-3">List of Admins</h3>
        <thead class="table-dark">
          <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>User Level</th>
              <th>Active</th>
              <th>Date Joined</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($admins as $admin) { ?>
              <tr>
                  <td><?php echo h($admin->id); ?></td>
                  <td><?php echo h($admin->username); ?></td>
                  <td><?php echo h($admin->email_address); ?></td>
                  <td><?php echo find_value_from_lookup(h($admin->role_id), 'role'); ?></td>
                  <td><?php echo h($admin->active_display()); ?></td>
                  <td><?php echo h($admin->joined_at); ?></td>
                  <td><a href="<?php echo url_for('/active_record/users/show.php?id=' . h(u($admin->id))); ?>" class="btn btn-warning btn-sm">View</a></td>
                  <td><a href="<?php echo url_for('/active_record/users/edit.php?id=' . h(u($admin->id))); ?>" class="btn btn-warning btn-sm">Edit</a></td>
                  <td><a href="<?php echo url_for('/active_record/users/delete.php?id=' . h(u($admin->id))); ?>" class="btn btn-warning btn-sm">Delete</a></td>
              </tr>
          <?php } ?>
        </tbody>
    </table>
  </section>
<?php } ?>


<h2 class="text-center mb-4">Recipe Category Management</h2>

<section class="table-responsive">

  <table class="table table-warning table-hover align-middle shadow-sm">
    <h3 class="text-center mb-3">Diets</h3>
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Diet</th>
        <th>Actions</th>
      </tr>
    </thead>
  
    <tbody>
      <?php foreach ($diets as $diet) { ?>
        <tr>
          <td><?php echo h($diet->id); ?></td>
          <td><?php echo h($diet->diet); ?></td>
          <td>
            <a href="<?php echo url_for('/active_record/categories/diet_edit.php?id=' . h(u($diet->id))); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?php echo url_for('/active_record/categories/diet_delete.php?id=' . h(u($diet->id))); ?>" class="btn btn-warning btn-sm">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="text-start mb-3">
    <a href="<?php echo url_for('/active_record/categories/diet_new.php') ?>" class="btn btn-warning">Add New Diet</a>
  </div>
</section>

<section class="table-responsive">
  
  <table class="table table-warning table-hover align-middle shadow-sm">
    <h3 class="text-center mb-3">Meal Types</h3>
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Meal Type</th>
        <th>Actions</th>
      </tr>
    </thead>
  
    <tbody>
      <?php foreach ($meal_types as $meal_type) { ?>
        <tr>
          <td><?php echo h($meal_type->id); ?></td>
          <td><?php echo h($meal_type->meal_type); ?></td>
          <td>
            <a href="<?php echo url_for('/active_record/categories/meal_type_edit.php?id=' . h(u($meal_type->id))); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?php echo url_for('/active_record/categories/meal_type_delete.php?id=' . h(u($meal_type->id))); ?>" class="btn btn-warning btn-sm">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="text-start mb-3">
    <a href="<?php echo url_for('/active_record/categories/meal_type_new.php') ?>" class="btn btn-warning">Add New Meal Type</a>
  </div>
</section>

<section class="table-responsive">
  
  <table class="table table-warning table-hover align-middle shadow-sm">
    <h3 class="text-center mb-3">Styles</h3>
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Style</th>
        <th>Actions</th>
      </tr>
    </thead>
  
    <tbody>
      <?php foreach ($styles as $style) { ?>
        <tr>
          <td><?php echo h($style->id); ?></td>
          <td><?php echo h($style->style); ?></td>
          <td>
            <a href="<?php echo url_for('/active_record/categories/style_edit.php?id=' . h(u($style->id))); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?php echo url_for('/active_record/categories/style_delete.php?id=' . h(u($style->id))); ?>" class="btn btn-warning btn-sm">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="text-start mb-3">
    <a href="<?php echo url_for('/active_record/categories/style_new.php') ?>" class="btn btn-warning">Add New Style</a>
  </div>
</section>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
