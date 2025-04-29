'use strict';

const btns = document.querySelectorAll('.btn-check');
const quantNums = Array.from(document.getElementsByClassName('quantity')); 
const insertLocation = document.querySelectorAll('.quantity');


let originalString;
let originalNumber;
let originalQuantNums;
let newNumber;

saveOriginals();

/**
 * Saves the original quantities to local storage.
 */
function saveOriginals() {
  originalQuantNums = quantNums.map(function(el) {
                        originalString = el.innerText;
                        originalNumber = Number(originalString);
                        return originalNumber;
                      })
                      
  localStorage.setItem('base', JSON.stringify(originalQuantNums));
}

/**
 * Adds event listeners to the buttons to change the scale of the recipe.
 * 
 * @param {HTMLElement} btnEl - The button element that was clicked. 
 */
btns.forEach(function(btnEl) {
  btnEl.addEventListener('change', pickOptions);
})

/**
 * Handles the scaling option selected by the user.
 * 
 * This function is triggered when a scaling button is clicked. It determines 
 * the scaling factor based on the button's ID and calls the `changeScale()` 
 * function to adjust the recipe quantities.
 * 
 * @param {Event} btnEl - The event object triggered by the button click.
 */
function pickOptions(btnEl) {
  switch (btnEl.target.id) {
    case 'half':
      changeScale(.5);
      break;
    case 'base':
      changeScale(1);
      break;
    case 'double':
      changeScale(2);
      break;
    case 'triple':
      changeScale(3);
      break;
    case 'quad':
      changeScale(4);
      break;
  }
}

/**
 * Adjusts the quantities of the recipe based on the given multiplier.
 * 
 * This function retrieves the original quantities from local storage, 
 * multiplies each quantity by the provided multiplier, and updates 
 * the displayed quantities in the DOM.
 * 
 * @param {number} multiplier - The factor by which to scale the recipe quantities.
 */
function changeScale(multiplier) {
  originalQuantNums = JSON.parse(localStorage.getItem('base'));
  originalQuantNums.forEach(function(num, i) {
    newNumber = num * multiplier;
    insertLocation[i].innerText = newNumber;
    })
}

