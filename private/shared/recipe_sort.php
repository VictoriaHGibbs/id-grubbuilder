<div class="styled-container container p-4 rounded border border-1 border-dark">
    <div class="row p-3">

      <div class="col-md-4 mb-3">
        <label for="meal_type" class="form-label">Select Meal Type:</label>
        <select id="meal_type" name="meal_type_id" class="form-select filter-dropdown">
          <option value="">Meal Types</option>
          <?php all_from_lookup('meal_type');?>
        </select>
      </div>

      <div class="col-md-4 mb-3">
        <label for="diet" class="form-label">Select Diet:</label>
        <select id="diet" name="diet_id" class="form-select filter-dropdown">
          <option value="">Diets</option>
          <?php all_from_lookup('diet');?>
        </select>
      </div>

      <div class="col-md-4 mb-3">
        <label for="style" class="form-label">Select Style:</label>
        <select id="style" name="style_id" class="form-select filter-dropdown">
          <option value="">Styles</option>
          <?php all_from_lookup('style');?>
        </select>
      </div> 

    </div>
  </div>
