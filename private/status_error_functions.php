<?php

function require_login()
{
  global $session;
  if (!$session->is_logged_in()) {
    redirect_to(url_for('/active_record/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

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

function display_session_message()
{
  global $session;
  $msg = $session->message();
  if (isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}
