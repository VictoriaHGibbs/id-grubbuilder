'use strict';

const ingredientContainer = document.getElementById("ingredient-line");
const addIngredientBtn = document.getElementById("add-ingredient");
var ingredientIndex = 1; 

const directionContainer = document.getElementById("direction-line");
const addDirectionBtn = document.getElementById("add-direction");
var directionIndex = 1;

const imageContainer = document.getElementById("image-line");
const addImageBtn = document.getElementById("add-image");
var imageIndex = 1;

addIngredientBtn.addEventListener("click", addAnotherIngredient);
addDirectionBtn.addEventListener("click", addAnotherDirection);
addImageBtn.addEventListener("click", addAnotherImage);
  
  
  // Remove extra fields dynamically
  function remove(event) {
    if (event.target.classList.contains("remove")) {
      event.target.parentElement.remove();
    }
  };
  
  function addAnotherIngredient(event) {
    event.preventDefault(); // Prevent form submission when adding fields

    let newIngredient = document.createElement("div");
    newIngredient.classList.add("ingredient");
    newIngredient.innerHTML = `
    <div class="row">
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

      <div class="col-md-4">
        <button type="button" class="btn btn-warning remove"><i class="fa-solid fa-xmark"></i> Remove Ingredient</button>
      </div>
    </div>
    `;
    
    ingredientContainer.appendChild(newIngredient);
    ingredientIndex++;
    ingredientContainer.addEventListener("click", remove);
};


function addAnotherDirection(event) {
  event.preventDefault(); // Prevent form submission when adding fields

  let newDirection = document.createElement("div");
  newDirection.classList.add("direction");
  newDirection.innerHTML = `
    <div id="direction-line">
      <label for="direction_text">Next Direction: </label>
      <input type="text" id="direction_text" name="direction[${directionIndex}][direction_text]" class="form-control" autofocus>
    </div>
      <button type="button" class="btn btn-warning remove"><i class="fa-solid fa-xmark"></i> Remove Direction</button>
  `;
  
  directionContainer.appendChild(newDirection);
  directionIndex++;
  directionContainer.addEventListener("click", remove);
};


function addAnotherImage(event) {
  event.preventDefault(); // Prevent form submission when adding fields

  let newImage = document.createElement("div");
  newImage.classList.add("image");
  newImage.innerHTML = `
    <div id="image-line" class="mb-3">
      <label for="image">Upload: </label>
      <input type="file" id="image" name="image[]" accept="image/*" class="form-control">
    </div>
      <button type="button" class="btn btn-warning remove"><i class="fa-solid fa-xmark"></i> Remove Image</button>
  `;
  
  imageContainer.appendChild(newImage);
  imageIndex++;
  imageContainer.addEventListener("click", remove);
};
