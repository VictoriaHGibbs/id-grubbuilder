<?php
if (!isset($user)) {
    redirect_to(url_for('/active_record/users/index.php'));
}
?>

<label for="username">Username: </label>
<input type="text" id="username" name="user[username]" value="<?php echo h($user->username); ?>" required>
<br>

<label for="email_address">Email Address: </label>
<input type="email" id="email_address" name="user[email_address]" value="<?php echo h($user->email_address); ?>" required>
<br>

<label for="password">Password</label>
<input type="password" id="password" name="user[password]" <?php if (!($session->is_admin_logged_in())): ?> required <?php endif; ?> value="">
<br>

<label for="confirm_password">Confirm Password</label>
<input type="password" id="confirm_password" name="user[confirm_password]" value=""> 

<?php if ($session->is_admin_logged_in()): ?>
<fieldset>
    <legend>Active</legend> 
    <input type="radio" id="active" name="user[active]" value="1">
    <label for="active">Active</label>

    <input type="radio" id="inactive" name="user[active]" value="0">
    <label for="inactive">Inactive</label>
</fieldset>
<?php endif; ?>

<?php if ($session->is_superadmin_logged_in()): ?>
<fieldset>
    <legend>User Level</legend> 
    <input type="radio" id="user" name="user[role_id]" value="1">
    <label for="user">User</label>

    <input type="radio" id="admin" name="user[role_id]" value="2">
    <label for="admin">Admin</label>
</fieldset>
<?php endif; ?>
