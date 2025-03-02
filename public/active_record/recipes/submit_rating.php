<?php

require_once('../../../private/initialize.php');


if (is_post_request()) {
  if (isset($_POST['rating'])) {
    $args = $_POST['rating'];
    $rating = new Rating($args);
    $result = $rating->save();

    redirect_to(url_for('active_record/recipes/show.php?id=' . $rating->recipe_id));
  }
}
?>
