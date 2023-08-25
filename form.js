function validateForm() {
  let firstName = document.getElementById("firstname").value;
  let lastName = document.getElementById("lastname").value;
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let confirmEmail = document.getElementById("confirmEmail").value;
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;
  let dob = document.getElementById("dob").value;
  let accountType = document.querySelector("select").value;

  let isValid = true;

  // Clear existing error messages
  document.querySelectorAll(".error-message").forEach((elem) => (elem.innerText = ""));

  if (firstName === "" || lastName === "" || username === "" || email === "" || confirmEmail === "" || password === "" || confirmPassword === "" || dob === "" || accountType === "----select account---") {
    document.getElementById("errorFirstName").innerText = "Please fill in all fields.";
    isValid = false;
  }

  if (!/^[a-zA-Z]+$/.test(firstName)) {
    document.getElementById("errorFirstName").innerText = "First name should only contain alphabetic characters.";
    isValid = false;
  }

  if (!/^[a-zA-Z]+$/.test(lastName)) {
    document.getElementById("errorLastName").innerText = "Last name should only contain alphabetic characters.";
    isValid = false;
  }

  // Add your username validation here if necessary

  if (!validateEmail(email)) {
    document.getElementById("errorEmail").innerText = "Please enter a valid email address.";
    isValid = false;
  }

  if (email !== confirmEmail) {
    document.getElementById("errorConfirmEmail").innerText = "Email addresses do not match.";
    isValid = false;
  }

  if (!/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z]).{8,}$/.test(password)) {
    document.getElementById("errorPassword").innerText = "Password should have at least 8 characters, with numbers and uppercase letters.";
    isValid = false;
  }

  if (password !== confirmPassword) {
    document.getElementById("errorConfirmPassword").innerText = "Passwords do not match.";
    isValid = false;
  }

  // Add your age validation here based on the date of birth if necessary

  if (parseInt(dob) < 18) {
    document.getElementById("errorDOB").innerText = "You must be at least 18 years old to register.";
    isValid = false;
  }

  if (accountType === "----select account---") {
    document.getElementById("errorAccountType").innerText = "Please select an account type.";
    isValid = false;
  }

  if (isValid) {
    let message = `You, ${username}, have successfully registered as ${accountType}.`;
    alert(message);
  }

  return isValid;
}

function validateEmail(email) {
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
