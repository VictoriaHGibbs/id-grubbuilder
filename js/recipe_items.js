'use strict';

const ingredientContainer = document.getElementById("ingredient-line");
const addIngredientBtn = document.getElementById("add-ingredient");
let ingredientIndex = document.querySelectorAll("#ingredient-line .row").length; 

const directionContainer = document.getElementById("direction-line");
const addDirectionBtn = document.getElementById("add-direction");
let directionIndex = document.querySelectorAll("#direction-line .row").length;

const imageContainer = document.getElementById("image-line");
const addImageBtn = document.getElementById("add-image");
let imageIndex = document.querySelectorAll("#direction-line .row").length;

addIngredientBtn.addEventListener("click", addAnotherIngredient);
addDirectionBtn.addEventListener("click", addAnotherDirection);
addImageBtn.addEventListener("click", addAnotherImage);
  
  
/**
 * Removes a parent element of the clicked "remove" button.
 * 
 * @param {Event} event - The event object triggered by the click.
 */

  function remove(event) {
    if (event.target.classList.contains("remove")) {
      event.target.parentElement.remove();
    }
  };
  
/**
 * Adds a new ingredient input row to the ingredient container.
 * 
 * @param {Event} event - The event object triggered by the click.
 */

  function addAnotherIngredient(event) {
    event.preventDefault(); // Prevent form submission when adding fields

    let newIngredient = document.createElement("div");
    newIngredient.classList.add("row", "mb-2");
    newIngredient.innerHTML = `
      <div class="col-md-4">
        <label for="quantity">Quantity: </label>
        <input type="number" step="any" name="ingredient[${ingredientIndex}][quantity]" class="new-field-ingredient form-control" required>
      </div>

      <div class="col-md-4">
        <label for="ing_measurement_id">Select Unit: </label>
        <select name="ingredient[${ingredientIndex}][measurement_id]" class="form-select" required>
          <option value="">Units</option>
          ${measurementOptions} 
        </select>
      </div>
      
      <div class="col-md-4">
        <label for="ingredient_name">Ingredient: </label>
        <input type="text" name="ingredient[${ingredientIndex}][ingredient_name]" class="form-control enter-target-ingredient" required>
      </div>

      <button type="button" class="btn btn-warning border border-1 border-dark remove w-25 ms-3 mt-3 md-4">Remove Ingredient</button>
    </div>
    `;
    
    ingredientContainer.appendChild(newIngredient);
    ingredientIndex++;

    const newestIngredient = newIngredient.querySelector(".new-field-ingredient");
    newestIngredient.focus();
    ingredientContainer.addEventListener("click", remove);
};

ingredientContainer.addEventListener("keydown", function (event) {
  if (event.key === "Enter" && event.target.classList.contains("enter-target-ingredient")) {
    event.preventDefault();
    addIngredientBtn.click(); // Trigger the "Add Another Ingredient" button
  }
});

/**
 * Adds a new direction input row to the direction container.
 * 
 * @param {Event} event - The event object triggered by the click.
 */

function addAnotherDirection(event) {
  event.preventDefault(); // Prevent form submission when adding fields

  let newDirection = document.createElement("div");
  newDirection.classList.add("row", "mb-2");
  newDirection.innerHTML = `
    <div class="col-md-12">
      <label for="direction_text">Step ${directionIndex + 1}: </label>
      <input type="text" id="direction_text" name="direction[${directionIndex}][direction_text]" class="form-control enter-target-direction new-field-direction" autofocus>
    </div>
      <button type="button" class="btn btn-warning border border-1 border-dark remove w-25 ms-3 mt-3 md-4">Remove Direction</button>
  `;
  
  directionContainer.appendChild(newDirection);
  directionIndex++;

  const newestDirection = newDirection.querySelector(".new-field-direction");
  newestDirection.focus();
  directionContainer.addEventListener("click", remove);
};

directionContainer.addEventListener("keydown", function (event) {
  if (event.key === "Enter" && event.target.classList.contains("enter-target-direction")) {
    event.preventDefault();
    addDirectionBtn.click(); // Trigger the "Add Another Direction" button
  }
});

/**
 * Adds a new image upload input row to the image container.
 * 
 * @param {Event} event - The event object triggered by the click.
 */

function addAnotherImage(event) {
  event.preventDefault(); // Prevent form submission when adding fields

  let newImage = document.createElement("div");
  newImage.classList.add("row", "mb-2");
  newImage.innerHTML = `
    <div class="col-md-12">
      <label for="image">Upload New Image:</label>
      <input type="file" id="image" name="image[]" accept=".jpg,.jpeg,.png,.webp" class="form-control">
    </div>
      <button type="button" class="btn btn-warning border border-1 border-dark remove w-25 ms-3 mt-3 md-4">Remove Image</button>
  `;
  
  imageContainer.appendChild(newImage);
  imageIndex++;
  imageContainer.addEventListener("click", remove);
};
