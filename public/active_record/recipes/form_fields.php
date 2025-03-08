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

  <div class="mb-3">
    <label for="recipe_title" class="form-label">*Recipe Title: </label>
    <input type="text" id="recipe_title" name="recipe[recipe_title]" maxlength="100" value="<?php echo h($recipe->recipe_title); ?>" class="form-control" required>
  </div>
  
  <div class="mb-3">
    <label for="description" class="form-label">*Description: </label>
    <textarea id="description" name="recipe[description]" maxlength="255" class="form-control" value="<?php echo h($recipe->description); ?>" required></textarea>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="prep_time_minutes" class="form-label">*Preparation time (minutes): </label>
      <input type="number" id="prep_time_minutes" name="recipe[prep_time_minutes]" value="<?php echo h($recipe->prep_time_minutes); ?>" class="form-control"  required>
    </div>
    
    <div class="col-md-6 mb-3">
      <label for="cook_time_minutes" class="form-label">*Cooking time (minutes): </label>
      <input type="number" id="cook_time_minutes" name="recipe[cook_time_minutes]" value="<?php echo h($recipe->cook_time_minutes); ?>" class="form-control"  required>
    </div>
  </div>
  
  <fieldset class="border p-3 mb-4">
    <legend class="h5">Yield & Servings</legend>
    <div class="row">
      
      <div class="col-md-4 mb-3">
        <label for="yield" class="form-label">*Yield: </label>
        <input type="number" id="yield" name="recipe[yield]" value="<?php echo h($recipe->yield); ?>" class="form-control"  required>
      </div>
  
      <div class="col-md-4 mb-3">
        <label for="measurement_id" class="form-label">*Select Unit:</label>
        <select id="measurement_id" name="recipe[measurement_id]" class="form-select" required>
          <option value="">Units</option>
          <?php all_from_lookup('measurement');?>
        </select>
      </div>
  
      <div class="col-md-4 mb-3">
        <label for="servings" class="form-label">*Servings</label>
        <input type="number" id="servings" name="recipe[servings]" value="<?php echo h($recipe->servings); ?>" class="form-control"  required>
      </div>
    </div>
    
  </fieldset>

  <div class="mb-3">
    <label for="visibility_id" class="form-label">*Visibility:</label>
    <select id="visibility_id" name="recipe[visibility_id]" class="form-select" required>
      <option value="">Visibility Options</option>
      <?php all_from_lookup('visibility');?>
    </select>
  </div>

  <fieldset class="border p-3 mb-4">
    <legend class="h5">*Ingredients</legend>
    <div id="ingredient-line" class="mb-3">
      <div class="row">
  
        <div class="col-md-4">
          <label for="quantity" class="form-label">*Quantity: </label>
          <input type="number" id="quantity" name="ingredient[0][quantity]" class="form-control" required>
        </div>
  
        <div class="col-md-4">
          <label for="ing_measurement_id" class="form-label">*Select Unit: </label>
          <select id="ing_measurement_id" name="ingredient[0][measurement_id]" class="form-select" required>
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
    <input type="submit" value="Add another ingredient" id="add-ingredient" class="btn btn-warning">
  </fieldset>

  <fieldset class="border p-3 mb-4">
    <legend class="h5">*Directions</legend>
    <div id="direction-line">
      <label for="direction_text" class="form-label">Enter one at a time: </label>
      <input type="text" id="direction_text" name="direction[0][direction_text]" class="form-control" required>
    </div>
    <input type="submit" value="Add another" id="add-direction" class="btn btn-warning">
  </fieldset>
  
  <fieldset class="border p-3 mb-4">
    <legend class="h5">Images</legend>
    <div id="image-line" class="mb-3">
      <label for="image" class="form-label">Upload: </label>
      <input type="file" id="image" name="image[]" accept="image/*" class="form-control">
    </div>
    <input type="submit" name="image" id="add-image" value="Add Another Image" class="btn btn-warning">
  </fieldset>

  <div class="mb-3">
    <label for="youtube_url" class="form-label">YouTube Video Share Link:</label>
    <input type="text" id="youtube_url" name="youtube_url" class="form-control">
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="meal_type" class="form-label">*Select Meal Type:</label>
      <select id="meal_type" name="meal_type_id" class="form-select" required>
        <option value="">Meal Types</option>
        <?php all_from_lookup('meal_type');?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="diet" class="form-label">*Select Diet:</label>
      <select id="diet" name="diet_id" class="form-select" required>
        <option value="">Diets</option>
        <?php all_from_lookup('diet');?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="style" class="form-label">*Select Style:</label>
      <select id="style" name="style_id" class="form-select" required>
        <option value="">Styles</option>
        <?php all_from_lookup('style');?>
      </select>
    </div> 
  </div>

