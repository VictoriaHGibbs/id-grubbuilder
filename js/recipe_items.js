'use strict';

const ingredientContainer = document.getElementById("ingredient-line");
const addIngredientBtn = document.getElementById("add-ingredient");
let ingredientIndex = document.querySelectorAll("#ingredient-line .row").length; 

const directionContainer = document.getElementById("direction-line");
const addDirectionBtn = document.getElementById("add-direction");
let directionIndex = document.querySelectorAll("#direction-line .row").length;

const imageContainer = document.getElementById("image-line");
const addImageBtn = document.getElementById("add-image");
var imageIndex = document.querySelectorAll("#direction-line .row").length;

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
        <input type="number" step="any" name="ingredient[${ingredientIndex}][quantity]" class="form-control" autofocus>
      </div>

      <div class="col-md-4">
        <label for="ing_measurement_id">Select Unit: </label>
        <select name="ingredient[${ingredientIndex}][measurement_id]" class="form-select">
          <option value="">Units</option>
          ${measurementOptions} 
        </select>
      </div>
      
      <div class="col-md-4">
        <label for="ingredient_name">Ingredient: </label>
        <input type="text" name="ingredient[${ingredientIndex}][ingredient_name]" class="form-control">
      </div>

      <button type="button" class="btn btn-warning remove w-25 ms-3 mt-3 md-4"><i class="fa-solid fa- xmark"></i> Remove Ingredient</button>
    </div>
    `;
    
    ingredientContainer.appendChild(newIngredient);
    ingredientIndex++;
    ingredientContainer.addEventListener("click", remove);
};

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
      <input type="text" id="direction_text" name="direction[${directionIndex}][direction_text]" class="form-control" autofocus>
    </div>
      <button type="button" class="btn btn-warning remove w-25 ms-3 mt-3 md-4"><i class="fa-solid fa- xmark"></i> Remove Direction</button>
  `;
  
  directionContainer.appendChild(newDirection);
  directionIndex++;
  directionContainer.addEventListener("click", remove);
};

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
      <button type="button" class="btn btn-warning remove w-25 ms-3 mt-3 md-4"><i class="fa-solid fa- xmark"></i> Remove Image</button>
  `;
  
  imageContainer.appendChild(newImage);
  imageIndex++;
  imageContainer.addEventListener("click", remove);
};
