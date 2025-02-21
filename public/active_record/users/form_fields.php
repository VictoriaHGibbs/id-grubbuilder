<?php
if (!isset($user)) {
    redirect_to(url_for('/active_record/users/index.php'));
}
?>

<label for="username">Username: </label>
<input type="text" id="username" name="user[username]" value="<?php echo h($user->username); ?>" required>
<br>

<label for="profile_image_url">Profile Image: </label>
<input type="file" id="profile_image_url" name="user[profile_image_url]" accept="image/*">
<br>

<label for="f_name">First Name: </label>
<input type="text" id="f_name" name="user[f_name]" value="<?php echo h($user->f_name); ?>" required>
<br>

<label for="l_name">Last Name: </label>
<input type="text" id="l_name" name="user[l_name]" value="<?php echo h($user->l_name); ?>" required>
<br>

<label for="email_address">Email Address: </label>
<input type="email" id="email_address" name="user[email_address]" value="<?php echo h($user->email_address); ?>" required>
<br>

<label for="password">Password</label>
<input type="password" id="password" name="user[password]">
<br>

<label for="confirm_password">Confirm Password</label>
<input type="password" id="confirm_password" name="user[confirm_password]">

<!-- <? //php if ($session->is_admin_logged_in()): 
?> -->
<fieldset>
    <legend>User Level</legend> 
    <input type="radio" id="user" name="user[role_id]" value="1">
    <label for="user">User</label>

    <input type="radio" id="admin" name="user[role_id]" value="2">
    <label for="admin">Admin</label>
</fieldset>
<!-- <? //php endif; 
?> -->
