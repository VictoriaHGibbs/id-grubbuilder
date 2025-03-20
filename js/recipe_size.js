'use strict';

const btns = document.querySelectorAll('.btn-check');
const quantNums = Array.from(document.getElementsByClassName('quantity')); 
const insertLocation = document.querySelectorAll('.quantity');


let originalString;
let originalNumber;
let originalQuantNums;
let newNumber;

saveOriginals();

function saveOriginals() {
  originalQuantNums = quantNums.map(function(el) {
                        originalString = el.innerText;
                        originalNumber = Number(originalString);
                        return originalNumber;
                      })
                      
  localStorage.setItem('base', JSON.stringify(originalQuantNums));
}

// Event listener callback for button click
btns.forEach(function(btnEl) {
  btnEl.addEventListener('change', pickOptions);
})

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

function changeScale(multiplier) {
  originalQuantNums = JSON.parse(localStorage.getItem('base'));
  originalQuantNums.forEach(function(num, i) {
    newNumber = num * multiplier;
    insertLocation[i].innerText = newNumber;
    })
}

