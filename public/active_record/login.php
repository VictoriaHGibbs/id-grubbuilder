<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }


  if (empty($errors)) {
    $user = User::find_by_username($username);

    if ($user != false && $user->verify_password($password)) {
      $session->login($user);
      if ($user->role_id == 1) redirect_to(url_for('/active_record/index.php'));
      if ($user->role_id == 2 || $user->role_id == 3) redirect_to(url_for('/active_record/users/index.php'));
      
      echo "Login was successful!";
    } else {

      $errors[] = "Log in was unsuccessful.";
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<h2 class="text-center mb-4">Login</h2>


<form action="login.php" method="post" class="login-form container p-4 shadow-sm bg-white rounded">

  <?php echo display_errors($errors); ?>

  <div class="mb-3 login-group">
    <label for="username" class="form-label">Username:</label>
    <input type="text" id="username" name="username" class="form-control" value="<?php echo h($username); ?>" required autofocus>
  </div>
    
  <div class="mb-3 login-group">
    <label for="password" class="form-label">Password:</label>
    <input type="password" id="password" name="password" class="form-control" required>
  </div>

  <input type="submit" name="submit" value="Submit"  class="btn btn-primary w-100 mb-3">
    
  <div class="mb-3">
    <p>Not a member yet? <a href="<?php echo url_for('/active_record/signup.php')?>">Sign-up here!</a></p>
  </div>
</form>
    
<?php include(SHARED_PATH . '/public_footer.php'); ?>
