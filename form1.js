function validateForm() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let accountType = document.querySelector(".custom-select").value;

  let isValid = true;

  if (email.trim() === "") {
    document.getElementById("email-error").innerText = "Email field cannot be empty.";
    isValid = false;
  } else {
    document.getElementById("email-error").innerText = "";
  }

  if (password.trim() === "") {
    document.getElementById("password-error").innerText = "Password field cannot be empty.";
    isValid = false;
  } else {
    document.getElementById("password-error").innerText = "";
  }

  if (accountType === "----select account---") {
    document.getElementById("accountType-error").innerText = "Please select an account type.";
    isValid = false;
  } else {
    document.getElementById("accountType-error").innerText = "";
  }

  if (isValid) {
    // Perform any additional validation here (e.g., email format, password complexity)

    // If everything is valid, show a success message using a custom dialog box
    let message = `You have successfully logged in as ${accountType}.`;
    showDialog(message);

    return true;
  }

  return false;
}

function showDialog(message) {
  // Code for showing the custom dialog box
  // ...
}
