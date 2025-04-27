<?php

require_once('../../private/initialize.php');

if (is_post_request()) {

  // --------------- START reCaptcha Verification ---------------
  $recaptcha_passed = false;
  if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $recaptcha_secret = RECAPTCHA_V2_SECRET_KEY;
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $recaptcha_remote_ip = $_SERVER['REMOTE_ADDR'];

    // Use file_get_contents or cURL to verify the response with Google
    $recaptcha_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_verify_data = http_build_query([
      'secret' => $recaptcha_secret,
      'response' => $recaptcha_response,
      'remoteip' => $recaptcha_remote_ip
    ]);

    $recaptcha_options = [
      'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $recaptcha_verify_data
      ]
    ];
    $recaptcha_context  = stream_context_create($recaptcha_options);
    $recaptcha_result_json = file_get_contents($recaptcha_verify_url, false, $recaptcha_context);
    $recaptcha_result_data = json_decode($recaptcha_result_json);

    if ($recaptcha_result_data && $recaptcha_result_data->success) {
      $recaptcha_passed = true;
    }
  }

  // If reCaptcha failed, prepare an error message
  $recaptcha_error = '';
  if (!$recaptcha_passed) {
    $recaptcha_error = 'reCAPTCHA verification failed. Please try again.';
    // Initialize a temporary User object to hold the error
    $user = new User($_POST['user'] ?? []); 
    $user->errors[] = $recaptcha_error; 
  }
  // --------------- END reCaptcha Verification ---------------


  // Only proceed if reCaptcha passed
  if ($recaptcha_passed) { 
      // Create record using post parameters
      $args = $_POST['user'];
      $user = new User($args);
      $result = $user->save();


      if ($result === true) {
        // $new_id = $user->id;
        $session->login($user);
        if ($user->role_id == 1) redirect_to(url_for('/active_record/index.php'));
        if ($user->role_id == 2 || $user->role_id == 3) redirect_to(url_for('/active_record/users/index.php'));
      } else {
        // show errors (User class validation errors)
        // The $user object already contains errors from $user->save() if it failed
      }
  } // else: The $user object initialized in the reCaptcha check already has the reCaptcha error

} else {
  // display the form
  $user = new User;
}

?>

<?php $page_title = 'Sign Up'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <a href="<?php echo url_for('/index.php'); ?>">Back to Home</a>

    <h2 class="text-center mb-4">Sign up and Create an account!</h2>

    <?php 
      // Display reCaptcha error specifically if it occurred before form processing
      if (isset($recaptcha_error) && !empty($recaptcha_error)) { 
          echo '<div class="alert alert-danger container">' . h($recaptcha_error) . '</div>';
      } 
    ?>

    <form action="<?php echo url_for('/active_record/signup.php'); ?>" method="post" class="signup-form container p-4 shadow-sm bg-white rounded">

      <?php include('../active_record/users/form_fields.php'); ?>

      <input type="submit" value="Sign up" class="btn btn-primary w-100">
      <span id="submit-error"></span>
      <?php 
        // Display errors from User validation OR the reCaptcha error if form processing was skipped
        if(isset($user)) { echo display_errors($user->errors); } 
      ?>
    </form>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
