<?php
require_once('../../../private/initialize.php');

$users = User::find_by_user_role(1);
$admins = User::find_by_user_role(2);
$diets = Diet::find_all_sort();
$meal_types = MealType::find_all_sort();
$styles = Style::find_all_sort();

$page_title = 'Admin Dashboard';

include(SHARED_PATH . '/user_header.php');
?>

<a href="<?php echo url_for('/active_record/users/new.php') ?>">Add User</a>

<h2>Admin Dashboard</h2>

<section>
  <table>
    <legend>Users</legend>
      <tr>
          <th>ID</th>
          <th>Username</th>
          <th>First Name</th>
          <th>Last Name </th>
          <th>Email</th>
          <th>User Level</th>
          <th>Active</th>
          <th>Date Joined</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
      </tr>
  
      <?php foreach ($users as $user) { ?>
          <tr>
              <td><?php echo h($user->id); ?></td>
              <td><?php echo h($user->username); ?></td>
              <td><?php echo h($user->f_name); ?></td>
              <td><?php echo h($user->l_name); ?></td>
              <td><?php echo h($user->email_address); ?></td>
              <td><?php echo find_value_from_lookup(h($user->role_id), 'role'); ?></td>
              <td><?php echo h($user->active_display()); ?></td>
              <td><?php echo h($user->joined_at); ?></td>
  
              <td><a href="<?php echo url_for('/active_record/users/show.php?id=' . h(u($user->id))); ?>">View</a></td>
              <td><a href="<?php echo url_for('/active_record/users/edit.php?id=' . h(u($user->id))); ?>">Edit</a></td>
              <td><a href="<?php echo url_for('/active_record/users/delete.php?id=' . h(u($user->id))); ?>">Delete</a></td>
          </tr>
      <?php } ?>
  </table>
</section>

<!-- ****************************** SUPER ADMIN ONLY  ********************* -->
<?php if($session->is_superadmin_logged_in()) { ?>

  <section>
    <table>
      <legend>Admins</legend>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name </th>
            <th>Email</th>
            <th>User Level</th>
            <th>Active</th>
            <th>Date Joined</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($admins as $admin) { ?>
            <tr>
                <td><?php echo h($admin->id); ?></td>
                <td><?php echo h($admin->username); ?></td>
                <td><?php echo h($admin->f_name); ?></td>
                <td><?php echo h($admin->l_name); ?></td>
                <td><?php echo h($admin->email_address); ?></td>
                <td><?php echo find_value_from_lookup(h($admin->role_id), 'role'); ?></td>
                <td><?php echo h($admin->active_display()); ?></td>
                <td><?php echo h($admin->joined_at); ?></td>
                <td><a href="<?php echo url_for('/active_record/users/show.php?id=' . h(u($admin->id))); ?>">View</a></td>
                <td><a href="<?php echo url_for('/active_record/users/edit.php?id=' . h(u($admin->id))); ?>">Edit</a></td>
                <td><a href="<?php echo url_for('/active_record/users/delete.php?id=' . h(u($admin->id))); ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
  </section>
<?php } ?>

<section>
  <a href="<?php echo url_for('/active_record/categories/diet_new.php') ?>">Add New Diet</a>
  
  <table>
    <legend>Diets</legend>
    <tr>
      <th>ID</th>
      <th>Diet</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
  
    <?php foreach ($diets as $diet) { ?>
      <tr>
        <td><?php echo h($diet->id); ?></td>
        <td><?php echo h($diet->diet); ?></td>
        <td><a href="<?php echo url_for('/active_record/categories/diet_edit.php?id=' . h(u($diet->id))); ?>">Edit</a></td>
        <td><a href="<?php echo url_for('/active_record/categories/diet_delete.php?id=' . h(u($diet->id))); ?>">Delete</a></td>
      </tr>
      <?php } ?>
  </table>
</section>

<section>
  <a href="<?php echo url_for('/active_record/categories/meal_type_new.php') ?>">Add New Meal Type</a>
  
  <table>
    <legend>Meal Types</legend>
    <tr>
      <th>ID</th>
      <th>Meal Type</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
  
    <?php foreach ($meal_types as $meal_type) { ?>
      <tr>
        <td><?php echo h($meal_type->id); ?></td>
        <td><?php echo h($meal_type->meal_type); ?></td>
        <td><a href="<?php echo url_for('/active_record/categories/meal_type_edit.php?id=' . h(u($meal_type->id))); ?>">Edit</a></td>
        <td><a href="<?php echo url_for('/active_record/categories/meal_type_delete.php?id=' . h(u($meal_type->id))); ?>">Delete</a></td>
      </tr>
      <?php } ?>
  </table>
</section>

<section>
  <a href="<?php echo url_for('/active_record/categories/style_new.php') ?>">Add New Style</a>
  
  <table>
    <legend>Styles</legend>
    <tr>
      <th>ID</th>
      <th>Style</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
  
    <?php foreach ($styles as $style) { ?>
      <tr>
        <td><?php echo h($style->id); ?></td>
        <td><?php echo h($style->style); ?></td>
        <td><a href="<?php echo url_for('/active_record/categories/style_edit.php?id=' . h(u($style->id))); ?>">Edit</a></td>
        <td><a href="<?php echo url_for('/active_record/categories/style_delete.php?id=' . h(u($style->id))); ?>">Delete</a></td>
      </tr>
      <?php } ?>
  </table>
</section>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
