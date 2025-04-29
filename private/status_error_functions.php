<?php

/**
 * Ensures that the user is logged in before proceeding.
 *
 * This function checks if the current session indicates that the user is logged in.
 * If the user is not logged in, they are redirected to the login page.
 * If the user is logged in, the function allows the rest of the page to proceed.
 *
 * @global object $session The session object used to check login status.
 * @return void
 */
function require_login()
{
  global $session;
  if (!$session->is_logged_in()) {
    redirect_to(url_for('/active_record/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

/**
 * Checks if the current user is logged in and has admin privileges.
 * 
 * This function ensures that the user is logged in and has admin access.
 * If the user is not logged in, they are redirected to the login page.
 * If the user is logged in but does not have admin privileges, they are
 * redirected to the homepage.
 * 
 * @global object $session The session object used to check login and admin status.
 * @return void
 */
function require_admin_login()
{
  global $session;
  if (!$session->is_logged_in()) {
    redirect_to(url_for('/active_record/login.php'));
  } elseif (!$session->is_admin_logged_in()) {
    redirect_to(url_for('/index.php'));
  } else {
    // do nothing
  }
}

/**
 * Ensures that the current user is logged in as a superadmin.
 *
 * This function checks if the user is logged in and has superadmin privileges.
 * If the user is not logged in, they are redirected to the login page.
 * If the user is logged in but does not have superadmin privileges, they are
 * redirected to the users index page.
 *
 * @global object $session The session object used to check login status.
 * @return void
 */
function require_superadmin_login()
{
  global $session;
  if (!$session->is_logged_in()) {
    redirect_to(url_for('/active_record/login.php'));
  } elseif (!$session->is_superadmin_logged_in()) {
    redirect_to(url_for('/active_record/users/index.php'));
  } else {
    // do nothing
  }
}

/**
 * Generates an HTML-formatted string to display a list of errors.
 *
 * This function takes an array of error messages and formats them
 * into an HTML structure for display. If the array is empty, it
 * returns an empty string.
 *
 * @param array $errors An array of error messages to display. Default is an empty array.
 * 
 * @return string The HTML-formatted string containing the error messages, or an empty string if no errors are provided.
 */
function display_errors($errors = array())
{
  $output = '';
  if (!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach ($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

/**
 * Displays a session message if one exists.
 *
 * This function retrieves a message from the session, clears it from the session,
 * and returns it wrapped in a div element with an ID of "message". If no message
 * exists, the function does not return anything.
 *
 * @global object $session The session object used to manage session messages.
 * @return string|null The formatted session message wrapped in a div, or null if no message exists.
 */
function display_session_message()
{
  global $session;
  $msg = $session->message();
  if (isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}
