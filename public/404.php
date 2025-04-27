<?php
require_once('../private/initialize.php');

// Send 404 HTTP Status header
// Using SERVER_PROTOCOL is often more compatible than hardcoding HTTP/1.0 or HTTP/1.1
if (isset($_SERVER["SERVER_PROTOCOL"])) {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found"); //
} else {
    header("HTTP/1.0 404 Not Found"); // Fallback
}

$page_title = 'Page Not Found (404)';
if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<div class="container text-center py-5">
    <h1 class="display-1">404</h1>
    <h2>Oops! Page Not Found</h2>
    <p class="lead">
        Sorry, the page you were looking for could not be found.
    </p>
    <p>
        It might have been removed, had its name changed, or is temporarily unavailable.
    </p>
    <a href="<?php echo url_for('/index.php'); ?>" class="btn btn-primary mt-3">Go Back to Homepage</a>
</div>

<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
