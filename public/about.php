<?php 
require_once('../private/initialize.php');

$page_title = 'About';

if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}
?>

<div class="container my-5 text-center">
  <section>
    <h1 class="text-center fw-bold mb-4 py-4">About Grubbuilder</h1>
    <div class="styled-container container text-center my-5 p-4 rounded border border-1 border-dark">
      <p class="lead">Building a community around nutritious recipes.</p>
    </div>
  </section>

  <section>
    <h2 class="text-center fw-bold mb-4 py-4">Our Mission</h2>
    <div class="styled-container container text-center my-5 p-4 rounded border border-1 border-dark">
        <p>At Grubbuilder, we believe food brings people together. Our mission is to empower home cooks by providing a platform where recipes are shared.</p>
    </div>
  </section>

  <section>
    <h2 class="text-center fw-bold mb-4 py-4">Key Features</h2>
    <div class="styled-container container text-center my-5 p-4 rounded border border-1 border-dark">
      <ul class="list-unstyled">
        <li><strong>Share with Ease:</strong> Publish your favorite recipes in just a few clicks.</li>
        <li><strong>Community Ratings:</strong> Rate, review, and discover top recipes from fellow cooks.</li>
        <li><strong>Responsive Design:</strong> Access and manage your recipes on any device, anywhere.</li>
      </ul>
    </div>
  </section>

  <section>
    <h2 class="text-center fw-bold mb-4 py-4">How It Works</h2>
    <div class="styled-container container text-center my-5 p-4 rounded border border-1 border-dark">
      <ul class="list-unstyled">
        <li>Create a free account or log in.</li>
        <li>Add your recipe details and ingredients.</li>
        <li>Share with the community and rate others.</li>
      </ul>
    </div>
  </section>

</div>

<?php if ($session->is_logged_in()) {
  include(SHARED_PATH . '/user_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
} ?>
