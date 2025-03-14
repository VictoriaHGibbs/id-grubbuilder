<?php
if (!isset($user)) {
    redirect_to(url_for('/active_record/users/index.php'));
}
?>

<fieldset class="mb-3">
  
  <div class="mb-3">
  <small>
    <ul class="list-unstyled">
      <li>Username must be between 5 and 20 characters</li>
    </ul>
  </small>
  <label for="username" class="form-label">Username: </label>
  <input type="text" id="username" name="user[username]" class="form-control" value="<?php echo h($user->username); ?>" required <?php if (!($session->is_admin_logged_in())): ?> autofocus <?php endif; ?>>
  <br>
  </div>
  
  <div class="mb-3">
  <label for="email_address" class="form-label">Email Address: </label>
  <input type="email" id="email_address" name="user[email_address]" class="form-control" value="<?php echo h($user->email_address); ?>" required>
  <br>
  </div>
  
  
  <div class="mb-3">
  <small>
    <ul class="list-unstyled">
      <li>Password must contain:
        <ul>
          <li>12 or more characters</li>
          <li>At least 1 uppercase letter</li>
          <li>At least 1 lowercase letter</li>
          <li>At least 1 number</li>
          <li>At least 1 symbol</li>
        </ul>
      </li>
    </ul>
  </small>
  <label for="password" class="form-label">Password</label>
  <input type="password" id="password" name="user[password]" class="form-control" <?php if (!($session->is_admin_logged_in())): ?> required <?php endif; ?> value="">
  <br>
  </div>
  
  
  <div class="mb-3">
  <label for="confirm_password" class="form-label">Confirm Password</label>
  <input type="password" id="confirm_password" name="user[confirm_password]" class="form-control" <?php if (!($session->is_admin_logged_in())): ?> required <?php endif; ?> value="">
  </div>
</fieldset>


<?php if ($session->is_admin_logged_in()): ?>
<fieldset class="mb-3">
    <legend class="form-label">Active</legend>

    <div class="form-check">
      <input type="radio" id="active" name="user[active]" value="1" class="form-check-input">
      <label for="active" class="form-check-label">Active</label>
    </div>

    <div class="form-check">
      <input type="radio" id="inactive" name="user[active]" value="0" class="form-check-input">
      <label for="inactive" class="form-check-label">Inactive</label>
    </div>
</fieldset>
<?php endif; ?>

<?php if ($session->is_superadmin_logged_in()): ?>
<fieldset class="mb-3">
    <legend class="form-label">User Level</legend>

    <div class="form-check">
      <input type="radio" id="user" name="user[role_id]" value="1" class="form-check-input">
      <label for="user" class="form-check-label">User</label>
    </div>

    <div class="form-check">
      <input type="radio" id="admin" name="user[role_id]" value="2" class="form-check-input">
      <label for="admin" class="form-check-label">Admin</label>
    </div>
</fieldset>
<?php endif; ?>
