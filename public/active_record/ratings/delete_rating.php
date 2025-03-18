<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {
  if (isset($_POST['rating_id'])) {
    $rating_id = $_POST['rating_id'];
    $rating = Rating::find_by_id($rating_id);
    $result = $rating->delete();

    redirect_to(url_for('active_record/recipes/show.php?id=' . $rating->recipe_id));
  }
}
?>

