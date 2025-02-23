<?php 


// if (!isset($recipe)) {
//   redirect_to(url_for('active_record/recipes.index.php'));
// }
// ?>

  <label for="recipe_title">Recipe Title: </label>
  <input type="text" id="recipe_title" name="recipe[recipe_title]" maxlength="100" value="<?php echo h($recipe->recipe_title); ?>" >
  <br>
  
  <label for="description">Description: </label>
  <br>
  <textarea id="description" name="recipe[description]" maxlength="255" value="<?php echo h($recipe->description); ?>" ></textarea>
  <br>

  <label for="prep_time_minutes">Preparation time: </label>
  <input type="number" id="prep_time_minutes" name="recipe[prep_time_minutes]" value="<?php echo h($recipe->prep_time_minutes); ?>" >
  <br>

  <label for="cook_time_minutes">Cooking time: </label>
  <input type="number" id="cook_time_minutes" name="recipe[cook_time_minutes]" value="<?php echo h($recipe->cook_time_minutes); ?>" >
  <br>
  
  <fieldset>
    <label for="yield">Yield: </label>
    <input type="number" id="yield" name="recipe[yield]" value="<?php echo h($recipe->yield); ?>" >
    
    <label for="measurement_id">Select Unit:</label>
    <select id="measurement_id" name="recipe[measurement_id]">
      <option value="">Units</option>
      <?php all_from_lookup('measurement');?>
    </select>
  </fieldset>

  <label for="servings">Servings</label>
  <input type="number" id="servings" name="recipe[servings]" value="<?php echo h($recipe->servings); ?>" >
  <br>

  <label for="visibility_id">Select Visibility:</label>
  <select id="visibility_id" name="recipe[visibility_id]">
    <option value="">Visibility Options</option>
    <?php all_from_lookup('visibility');?>
  </select>
  <br>

  <fieldset id="ingredient">
    <legend>Ingredients</legend>
    <label for="quantity">Quantity: </label>
    <input type="number" id="quantity" name="ingredient[0][quantity]" >
    
    <label for="ing_measurement_id">Select Unit: </label>
    <select id="ing_measurement_id" name="ingredient[0][measurement_id]">
      <option value="">Units</option>
      <?php all_from_lookup('measurement');?>
    </select>
    
    <label for="ingredient_name">Ingredient: </label>
    <input type="text" id="ingredient_name" name="ingredient[0][ingredient_name]" >
    <br>
    <input type="submit" value="Submit and Add another" id="add-ingredient">
  </fieldset>
  
  <fieldset id="direction">
    <legend>Directions</legend>
    <label for="direction_text">Enter one at a time: </label>
    <input type="text" id="direction_text" name="direction[0][direction_text]" >
    <br>
    <input type="submit" value="Submit and Add another" id="add-direction">
  </fieldset>

  <fieldset>
    <legend>Images</legend>
    <label for="image">Upload: </label>
    <input type="file" id="image" name="image[0][image_url]" accept="image/*">
    <br>
    <input type="button" value="Add Another Image" id="add-image">
  </fieldset>

  <label for="youtube_url">YouTube Video Share Link - PLACEHOLDER:</label>
  <input type="text" id="youtube_url" name="youtube_url" >
  <br>

  <label for="meal_type">Select Meal Type:</label>
  <select id="meal_type" name="meal_type_id">
    <option value="">Meal Types</option>
    <?php all_from_lookup('meal_type');?>
  </select>
  <br>

  <label for="diet">Select Diet:</label>
  <select id="diet" name="diet_id">
    <option value="">Diets</option>
    <?php all_from_lookup('diet');?>
  </select>
  <br>

  <label for="style">Select Style:</label>
  <select id="style" name="style_id">
    <option value="">Styles</option>
    <?php all_from_lookup('style');?>
  </select>

