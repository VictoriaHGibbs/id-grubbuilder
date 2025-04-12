<?php 


// Get measurement options as a string of HTML
ob_start(); // Start output buffering
all_from_lookup('measurement');
$measurement_options = ob_get_clean(); // Get the buffered content and clear buffer

// if (!isset($recipe)) {
//   redirect_to(url_for('active_record/recipes.index.php'));
// }
// ?>

<script>
    let measurementOptions = `<?php echo addslashes($measurement_options); ?>`;
</script>

  <div class="mb-3 p-3">
    <label for="recipe_title" class="form-label">*Recipe Title: </label>
    <input type="text" id="recipe_title" name="recipe[recipe_title]" maxlength="100" value="<?php echo isset($recipe->recipe_title) ? h($recipe->recipe_title) : ''; ?>" class="form-control" required>
  </div>
  
  <div class="mb-3 p-3">
    <label for="description" class="form-label">*Description: </label><br>
    <small>255 character limit</small>
    <textarea id="description" name="recipe[description]" maxlength="255" class="form-control" required><?php echo isset($recipe->description) ? h($recipe->description) : ''; ?></textarea>
  </div>

  <div class="row p-3">
    <div class="col-md-6 mb-3">
      <label for="prep_time_minutes" class="form-label">*Preparation time (minutes): </label>
      <input type="number" step="any" id="prep_time_minutes" name="recipe[prep_time_minutes]" value="<?php echo isset($recipe->prep_time_minutes) ? h($recipe->prep_time_minutes) : ''; ?>" class="form-control"  required>
    </div>

    <div class="col-md-6 mb-3">
      <label for="cook_time_minutes" class="form-label">*Cooking time (minutes): </label>
      <input type="number" step="any" id="cook_time_minutes" name="recipe[cook_time_minutes]" value="<?php echo isset($recipe->cook_time_minutes) ? h($recipe->cook_time_minutes) : ''; ?>" class="form-control"  required>
    </div>
  </div>
  
  <fieldset class="border p-3 mb-4">
    <legend class="h5">Yield & Servings</legend>
    <div class="row">
      
      <div class="col-md-4 mb-3">
        <label for="yield" class="form-label">*Yield: </label>
        <input type="number" step="any" id="yield" name="recipe[yield]" value="<?php echo isset($recipe->yield) ? h($recipe->yield) : ''; ?>" class="form-control"  required>
      </div>
  
      <div class="col-md-4 mb-3">
        <label for="measurement_id" class="form-label">*Select Unit:</label>
        <select id="measurement_id" name="recipe[measurement_id]" class="form-select" required>
          <option value="">Units</option>
          <?php all_from_lookup('measurement', isset($recipe->measurement_id) ? $recipe->measurement_id : null); ?>
        </select>
      </div>
  
      <div class="col-md-4 mb-3">
        <label for="servings" class="form-label">*Servings</label>
        <input type="number" step="any" id="servings" name="recipe[servings]" value="<?php echo isset($recipe->servings) ? h($recipe->servings) : ''; ?>" class="form-control"  required>
      </div>
    </div>
    
  </fieldset>

  <div class="mb-3 p-3">
    <label for="visibility_id" class="form-label">*Who would you like to share this recipe with?</label>
    <select id="visibility_id" name="recipe[visibility_id]" class="form-select" required>
      <option value="">Visibility Options</option>
      <?php all_from_lookup('visibility', isset($recipe->visibility_id) ? $recipe->visibility_id : null ); ?>
    </select>
  </div>

  <fieldset class="border p-3 mb-4">
    <legend class="h5">*Ingredients</legend>
    <small>If a unit of measurement is not needed, select "Not Needed" from the drop-down.</small>
    <small>Example: "2 eggs"</small>
    <div id="ingredient-line" class="mb-3">
      <?php 
      $ingredients = $_POST['ingredient'] ?? (isset($recipe->id) ? Recipe::get_ingredients($recipe->id) : []) ?? [];
      if (empty($ingredients)) {
          $ingredients = [['quantity' => '', 'measurement_id' => '', 'ingredient_name' => '']];
      }       
      
      foreach ($ingredients as $index => $ingredient) :
      ?>
      <div class="row mb-2">
          <div class="col-md-4">
              <label class="form-label">*Quantity: </label>
              <input type="number" step="any" name="ingredient[<?php echo $index; ?>][quantity]" 
                    value="<?php echo h($ingredient['quantity'] ?? $ingredient->quantity ?? ''); ?>" 
                    class="form-control" required>
          </div>

          <div class="col-md-4">
              <label class="form-label">Select Unit: </label>
              <select name="ingredient[<?php echo $index; ?>][measurement_id]" class="form-select">
                  <option value="">Units</option>
                  <?php all_from_lookup('measurement', $ingredient['measurement_id'] ?? $ingredient->measurement_id ?? ''); ?>
              </select>
          </div>

          <div class="col-md-4">
              <label class="form-label">*Ingredient: </label>
              <input type="text" name="ingredient[<?php echo $index; ?>][ingredient_name]" 
                    value="<?php echo h($ingredient['ingredient_name'] ?? $ingredient->ingredient_name ?? ''); ?>" 
                    class="form-control" required>
          </div>
      </div>
      <?php endforeach; ?>
    </div>
    <input type="button" value="Add another ingredient" id="add-ingredient" class="btn btn-warning">
  </fieldset>

  <fieldset class="border p-3 mb-4">
    <legend class="h5">*Directions</legend>
    <p>Enter your directions one step at a time. Do not number them, that will be done for you!</p>
    <div id="direction-line" class="mb-3">

      <?php 
      $directions = $_POST['direction'] ?? Recipe::get_directions($recipe->id) ?? [];
      if (empty($directions)) {
          $directions = [['direction_text' => '']];
      }

      foreach ($directions as $index => $direction) :
      ?>
      <div class="row mb-2">
        <div class="col-md-12">
          <label class="form-label">Step <?php echo $index + 1; ?>: </label>
          <input type="text" name="direction[<?php echo $index; ?>][direction_text]" 
                value="<?php echo h($direction['direction_text'] ?? $direction->direction_text ?? ''); ?>" 
                class="form-control" required>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <input type="button" value="Add another direction step" id="add-direction" class="btn btn-warning">
  </fieldset>
  









  <fieldset class="border p-3 mb-4">
    <legend class="h5">Images</legend>
    <small>Must be jpg, jpeg, png, or webp.</small><br>
    <small>Must be less than 2MB</small>

    <div id="image-line" class="mb-3">
      <?php 
      // Check if images are set in the session or from the database
      $images = $_SESSION['uploaded_images'] ?? Recipe::get_images($recipe->id) ?? [];

      var_dump($images); 

      if (!empty($images)) {
        foreach ($images as $index => $image) :
          $image_url = is_array($image) ? $image['image_url'] : $image->image_url; 
      ?>
        <div class="row mb-2">
          <div class="col-md-10">
            <label for="image_<?php echo $index; ?>" class="form-label">Uploaded Image:</label>
            <input type="text" id="image_<?php echo $index; ?>" name="image[<?php echo $index; ?>][image_url]" value="<?php echo h($image_url); ?>" class="form-control" readonly>
          </div>
          <button type="button" class="btn btn-warning remove w-25 ms-3 mt-3 md-4"><i class="fa-solid fa- xmark"></i> Remove Image</button>
        </div>
      <?php endforeach; } ?>

      <div class="row mb-2">
        <div class="col-md-10">
          <label for="image" class="form-label">Upload New Image:</label>
          <input type="file" id="image" name="image[]" accept=".jpg,.jpeg,.png,.webp" class="form-control">
        </div>
      </div>
    </div>

    <input type="button" name="image" id="add-image" value="Add Another Image" class="btn btn-warning">
  </fieldset>






  <div class="mb-3 p-3">
    <label for="youtube_url" class="form-label">YouTube Video Share Link:</label>
    <input type="text" id="youtube_url" name="youtube_url" class="form-control">
  </div>

  <div class="row p-3">
    <div class="col-md-4 mb-3">
      <label for="meal_type" class="form-label">Select Meal Type:</label>
      <select id="meal_type" name="meal_type_id" class="form-select">
        <option value="">Meal Types</option>
        <?php all_from_lookup('meal_type');?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="diet" class="form-label">Select Diet:</label>
      <select id="diet" name="diet_id" class="form-select">
        <option value="">Diets</option>
        <?php all_from_lookup('diet');?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="style" class="form-label">Select Style:</label>
      <select id="style" name="style_id" class="form-select">
        <option value="">Styles</option>
        <?php all_from_lookup('style');?>
      </select>
    </div> 
  </div>

