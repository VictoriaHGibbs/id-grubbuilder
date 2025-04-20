`use strict`

// Variables to target the spans 
let usernameError = document.getElementById(`username-error`);
let emailError = document.getElementById(`email-error`);
let passwordError = document.getElementById(`password-error`);
let confirmPasswordError = document.getElementById(`confirm-password-error`);
let submitError = document.getElementById(`submit-error`);

let nameLength = document.getElementById(`name-length`);

let characters = document.getElementById(`characters`);
let upper = document.getElementById(`upper`);
let lower = document.getElementById(`lower`);
let number = document.getElementById(`number`);
let symbol = document.getElementById(`symbol`);

// Variables for targeting the input fields
let username = document.getElementById(`username`);
let email = document.getElementById(`email_address`);
let password = document.getElementById(`password`);
let confirmPassword = document.getElementById(`confirm_password`);


/**
 * Validates the username input field.
 * Ensures the username is not empty, has a minimum length of 5 characters,
 * and does not exceed 20 characters.
 * Updates the `usernameError` span with appropriate messages.
 * 
 * @returns {boolean} Returns false if validation fails, otherwise undefined.
 */
function validateUsername() {
  let usernameValue = username.value;

  usernameError.innerHTML = ``;

  if(usernameValue.length == 0) {
    usernameError.innerHTML = `Username is required.`;
    return false;
  } else if(usernameValue.length < 5) {
    usernameError.innerHTML = `Username must be at least 5 characters.`;
    return false;
  } else if(usernameValue.length > 20) {
    usernameError.innerHTML = `Username must not exceed 20 characters.`;
    return false;
  }
  usernameError.innerHTML = `Valid`;
}

/**
 * Counts the number of characters in the username input field
 * and updates the `nameLength` span with the count.
 */
function countCharacters() {
  let number = username.value.length;
  nameLength.innerHTML = `${number}`;
}

/**
 * Validates the email input field.
 * Ensures the email is not empty, does not exceed 100 characters,
 * and matches a valid email format.
 * Updates the `emailError` span with appropriate messages.
 * 
 * @returns {boolean} Returns false if validation fails, otherwise undefined.
 */
function validateEmail() {
  let emailValue = email.value;

  emailError.innerHTML = ``;

  if(emailValue.length == 0) {
    emailError.innerHTML = `Email cannot be blank.`;
    return false;
  } else if(emailValue.length >= 100) {
    emailError.innerHTML = `Email must be less than 100 characters.`;
    return false;
  } else if(!emailValue.match(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g)) {
    emailError.innerHTML = `Not a valid format.`;
    return false;
  }
  emailError.innerHTML = `Valid`;

}

/**
 * Validates the password input field.
 * Ensures the password is not empty, has a minimum length of 12 characters,
 * contains at least one uppercase letter, one lowercase letter, one number,
 * and one symbol. Updates the corresponding indicators and the `passwordError` span.
 */
function validatePassword() {
  let passwordValue = password.value;

  passwordError.innerHTML = ``;

  if(passwordValue.length == 0) {
    passwordError.innerHTML = `Password cannot be blank`;
  } else if(passwordValue.length < 12) {
    characters.classList.remove(`text-bg-success`);
    passwordError.innerHTML = `Password must contain at least 12 characters.`;
  } else {
    characters.classList.add(`text-bg-success`);
  }  
  

  if(!passwordValue.match(/[A-Z]/)) {
    upper.classList.remove(`text-bg-success`);
    if (!passwordError.innerHTML) passwordError.innerHTML = `Password must contain uppercase letter.`;
  } else {
    upper.classList.add(`text-bg-success`);
  }

  if(!passwordValue.match(/[a-z]/)) {
    lower.classList.remove(`text-bg-success`);
    if (!passwordError.innerHTML) passwordError.innerHTML = `Password must contain lowercase letter.`;
  } else {
    lower.classList.add(`text-bg-success`);
  }

  if(!passwordValue.match(/(.*\d)/)) {
    number.classList.remove(`text-bg-success`);
    if (!passwordError.innerHTML) passwordError.innerHTML = `Password must contain a number.`;
  } else {
    number.classList.add(`text-bg-success`);
  }

  if(!passwordValue.match(/[^A-Za-z0-9\s]/)) {
    symbol.classList.remove(`text-bg-success`);
    if (!passwordError.innerHTML) passwordError.innerHTML = `Password must contain a symbol.`;
  } else {
    symbol.classList.add(`text-bg-success`);
  }

  let successCount = document.querySelectorAll(`.text-bg-success`).length;

  if (successCount === 5 && !passwordError.innerHTML) {
    passwordError.innerHTML = `Valid`;
  }

}

/**
 * Validates that the confirm password input field matches the password input field.
 * Ensures the confirm password is not empty and matches the password.
 * Updates the `confirmPasswordError` span with appropriate messages.
 * 
 * @returns {boolean} Returns false if validation fails, otherwise undefined.
 */
function validatePasswordMatch() {
  let confirmPasswordValue = confirmPassword.value;
  let passwordValue = password.value;

  confirmPasswordError.innerHTML = ``;

  if(confirmPasswordValue.length == 0) {
    confirmPasswordError.innerHTML = `Confirm Password cannot be blank.`;
    return false;
  } else if(confirmPasswordValue !== passwordValue) {
    confirmPasswordError.innerHTML = `Password and confirm password must match.`;
    return false;
  }
  confirmPasswordError.innerHTML = `Valid`;

}

// Event listeners

username.addEventListener(`input`, validateUsername);
username.addEventListener(`focusout`, validateUsername);
username.addEventListener(`input`, countCharacters);

email.addEventListener(`input`, validateEmail);
email.addEventListener(`focusout`, validateEmail);

password.addEventListener(`input`, validatePassword);
password.addEventListener(`focusout`, validatePassword);
password.addEventListener(`change`, validatePassword);


confirmPassword.addEventListener(`input`, validatePasswordMatch);
confirmPassword.addEventListener(`focusout`, validatePasswordMatch);
