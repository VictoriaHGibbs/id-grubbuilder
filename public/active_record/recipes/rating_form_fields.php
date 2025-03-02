<div class="rating-container">
    <p>Have you made this one? If so leave a rating!</p>
    <div class="star-widget">
      <input type="radio" name="rating[rating_level]" id="rate-5" value="5">
      <label for="rate-5" class="fas fa-drumstick-bite"></label>

      <input type="radio" name="rating[rating_level]" id="rate-4" value="4">
      <label for="rate-4" class="fas fa-drumstick-bite"></label>

      <input type="radio" name="rating[rating_level]" id="rate-3" value="3">
      <label for="rate-3" class="fas fa-drumstick-bite"></label>

      <input type="radio" name="rating[rating_level]" id="rate-2" value="2">
      <label for="rate-2" class="fas fa-drumstick-bite"></label>

      <input type="radio" name="rating[rating_level]" id="rate-1" value="1">
      <label for="rate-1" class="fas fa-drumstick-bite"></label>

      <input type="hidden" name="rating[recipe_id]" value="<?php echo $recipe_id ?>" >
      <input type="hidden" name="rating[rater_user_id]" value="<?php echo $id ?>" >
    </div>
  </div>
