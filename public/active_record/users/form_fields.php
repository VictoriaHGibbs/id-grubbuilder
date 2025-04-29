<?php
if (!isset($user)) {
    redirect_to(url_for('/active_record/users/index.php'));
}
?>

<fieldset class="mb-2">
  
  <div class="mb-2">
    <ul class="list-unstyled form-text">
      <li>Username must be between 5 and 20 characters</li>
      <li>Character count: <span id="name-length"></span></li>
    </ul>
    <label for="username" class="form-label">Username: </label>
    <input type="text" id="username" name="user[username]" class="form-control" minlength="5" maxlength="20" value="<?php echo h($user->username); ?>" required <?php if (!($session->is_admin_logged_in())): ?> autofocus <?php endif; ?>>
    <span class="form-text text-bg-warning min-height-error" id="username-error"></span>
  </div>
  
  <div class="mb-2">
    <label for="email_address" class="form-label">Email Address: </label>
    <input type="email" id="email_address" name="user[email_address]" class="form-control" value="<?php echo h($user->email_address); ?>" required>
    <span class="form-text text-bg-warning min-height-error" id="email-error"></span>
  </div>
  
  
  <div class="mb-2">
    <ul class="list-unstyled form-text">
      <li>Password must contain:
        <ul>
          <li><span id="characters">At least 12 characters</span></li>
          <li><span id="upper">At least 1 uppercase letter</span></li>
          <li><span id="lower">At least 1 lowercase letter</span></li>
          <li><span id="number">At least 1 number</span></li>
          <li><span id="symbol">At least 1 symbol</span></li>
        </ul>
      </li>
    </ul>
    <label for="password" class="form-label">Password</label>
    <input type="password" id="password" name="user[password]" class="form-control" <?php if (!($session->is_admin_logged_in())): ?> required <?php endif; ?> value="">
    <span class="form-text text-bg-warning min-height-error" id="password-error"></span>
  </div>
  
  
  <div class="mb-2">
    <label for="confirm_password" class="form-label">Confirm Password</label>
    <input type="password" id="confirm_password" name="user[confirm_password]" class="form-control" <?php if (!($session->is_admin_logged_in())): ?> required <?php endif; ?> value="">
    <span class="form-text text-bg-warning min-height-error" id="confirm-password-error"></span>
  </div>
  <?php if ($page_title == 'Sign Up') { ?>
    <div class="g-recaptcha mb-3" data-sitekey="6LegsSUrAAAAAKKAcuYPeEyql6sBY2TQ5NjVt7h1"></div>
  <?php } ?>
</fieldset>


<?php if ($session->is_admin_logged_in()): ?>
<fieldset class="container mb-3">
    <!-- <div class="d-flex flex-column align-items-center mt-4"> -->
      <legend class="form-label">Active</legend>
      <div class="form-check">
        <input type="radio" id="active" name="user[active]" value="1" class="form-check-input">
        <label for="active" class="form-check-label">Active</label>
      </div>
      <div class="form-check">
        <input type="radio" id="inactive" name="user[active]" value="0" class="form-check-input">
        <label for="inactive" class="form-check-label">Inactive</label>
      </div>
    <!-- </div> -->
</fieldset>
<?php endif; ?>

<?php if ($session->is_superadmin_logged_in()): ?>
<fieldset class="container mb-3">
    <!-- <div class="d-flex flex-column align-items-center mt-4"> -->
      <legend class="form-label">User Level</legend>
      <div class="form-check">
        <input type="radio" id="user" name="user[role_id]" value="1" class="form-check-input">
        <label for="user" class="form-check-label">User</label>
      </div>
      <div class="form-check">
        <input type="radio" id="admin" name="user[role_id]" value="2" class="form-check-input">
        <label for="admin" class="form-check-label">Admin</label>
      </div>
    <!-- </div> -->
</fieldset>
<?php endif; ?>
