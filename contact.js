const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const form = document.querySelector("form");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const nameValue = nameInput.value.trim();
  const emailValue = emailInput.value.trim();

  if (nameValue === "") {
    showError(nameInput, "Name cannot be blank");
  } else {
    showSuccess(nameInput);
  }

  if (emailValue === "") {
    showError(emailInput, "Email cannot be blank");
  } else if (!isValidEmail(emailValue)) {
    showError(emailInput, "Email is not valid");
  } else {
    showSuccess(emailInput);
  }
});

function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = "contact-form error";
  const errorMessage = formControl.querySelector(".error");
  errorMessage.innerText = message;
}

function showSuccess(input) {
  const formControl = input.parentElement;
  formControl.className = "contact-form success";
}

function isValidEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}