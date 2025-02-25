'use strict';

const ingredientContainer = document.getElementById("ingredient-line");
const addIngredientBtn = document.getElementById("add-ingredient");
var ingredientIndex = 1; // Start from 1 since 0 is already used

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
    <label for="quantity">Quantity: </label>
    <input type="number" name="ingredient[${ingredientIndex}][quantity]">
    
    <label for="ing_measurement_id">Select Unit: </label>
    <select name="ingredient[${ingredientIndex}][measurement_id]">
    <option value="">Units</option>
    ${measurementOptions}  <!-- Injecting pre-fetched options here -->
    </select>
    
    <label for="ingredient_name">Ingredient: </label>
    <input type="text" name="ingredient[${ingredientIndex}][ingredient_name]">
    
    <button type="button" class="remove">❌</button>
    <br>
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
  <label for="direction_text">Enter one at a time: </label>
      <input type="text" id="direction_text" name="direction[${directionIndex}][direction_text]" >
      <br>
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
  <label for="image">Upload: </label>
      <input type="file" id="image" name="image[${imageIndex}][image_url]" accept="image/*">
      <br>
  `;
  
  imageContainer.appendChild(newImage);
  imageIndex++;
  imageContainer.addEventListener("click", remove);
};
