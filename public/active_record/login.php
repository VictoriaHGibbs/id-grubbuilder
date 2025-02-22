<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if (empty($errors)) {
    $user = User::find_by_username($username);
    // test if user found and password is correct
    if ($user != false && $user->verify_password($password)) {
      // Mark user as logged in
      $session->login($user);
      redirect_to(url_for('/active_record/index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <h2>Login</h2>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo h($username); ?>">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="">
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <p>Not a member yet? <a href="<?php echo url_for('/active_record/signup.php')?>">Sign-up here!</a></p>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
