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
      <div class="row">
  
        <div class="col-md-4">
          <label for="quantity" class="form-label">*Quantity: </label>
          <input type="number" step="any" id="quantity" name="ingredient[0][quantity]" class="form-control" required>
        </div>
  
        <div class="col-md-4">
          <label for="ing_measurement_id" class="form-label">Select Unit: </label>
          <select id="ing_measurement_id" name="ingredient[0][measurement_id]" class="form-select">
            <option value="">Units</option>
            <?php all_from_lookup('measurement');?>
          </select>
        </div>
  
        <div class="col-md-4">
          <label for="ingredient_name" class="form-label">*Ingredient: </label>
          <input type="text" id="ingredient_name" name="ingredient[0][ingredient_name]" class="form-control" required>
        </div>
        
      </div>
    </div>
    <input type="button" value="Add another ingredient" id="add-ingredient" class="btn btn-warning">
  </fieldset>

  <fieldset class="border p-3 mb-4">
    <legend class="h5">*Directions</legend>
    <div id="direction-line" class="mb-3">
      <label for="direction_text" class="form-label">Enter your directions one step at a time. Do not number them, that will be done for you!</label>
      <input type="text" id="direction_text" name="direction[0][direction_text]" class="form-control" required>
    </div>
    <input type="button" value="Add another direction step" id="add-direction" class="btn btn-warning">
  </fieldset>
  
  <fieldset class="border p-3 mb-4">
    <legend class="h5">Images</legend>
    <small>Must be jpg, jpeg, png, or webp.</small><br>
    <small>Must be less than 2MB</small>
    <div id="image-line" class="mb-3">
      <label for="image" class="form-label">Upload: </label>
      <input type="file" id="image" name="image[]" accept="image/*" class="form-control">
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

