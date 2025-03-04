<?php
require_once('../../../private/initialize.php');

$users = User::find_by_user_role(1);
$admins = User::find_by_user_role(2);
$diets = Diet::find_all();
$styles = Style::find_all();
$mealtypes = MealType::find_all();

$page_title = 'Admin Dashboard';

include(SHARED_PATH . '/user_header.php');
?>

<a href="<?php echo url_for('/active_record/users/new.php') ?>">Add User</a>

<h2>Admin Dashboard</h2>

<table>
  <legend>Users</legend>
    <tr>
        <th>User ID</th>
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

<!-- ****************************** SUPER ADMIN ONLY  ********************* -->
<?php if($session->is_superadmin_logged_in()) { ?>

<table>
  <legend>Admins</legend>
    <tr>
        <th>User ID</th>
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
<?php } ?>

<!-- ADD IN MEAL TYPE, DIET AND STYLE TABLES HERE FOR EDITING  -->




<?php include(SHARED_PATH . '/user_footer.php'); ?>
