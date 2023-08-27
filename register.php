<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "is_project";

    $connect = new mysqli($server, $user, $password, $database);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Validate user inputs
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $DOB = $_POST['DOB'];
    $Account = $_POST['Account'];

    // Check if the user with  Email already exists in the  table
    $stmt_check = $connect->prepare("SELECT * FROM registration WHERE Username = ? OR Email = ?");
    $stmt_check->bind_param("ss", $Username, $Email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // User with the  Email already exists, display an error message
        echo "A user with the same Email already exists. Please use a different Email.";
    } else {
        // User with the  Email does not exist, proceed with registration
        $stmt_insert = $connect->prepare("INSERT INTO registration (Email, DOB, Lastname, Firstname, Password, Account, Username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt_insert) {
            die("Prepare failed: " . $connect->error);
        }
        $stmt_insert->bind_param("sssssss", $Email, $DOB, $Lastname, $Firstname, $Password, $Account, $Username);
        if ($stmt_insert->execute()) {
            // Registration successful, redirect to a success page 
            echo "Registration successful! Redirecting to login page...";
            header("refresh:3;url=login.php");
        } else {
            // Registration failed, display an error message
            echo "Registration failed. Please try again later.";
        }
    }

    $stmt_check->close();
       $connect->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>register page</title>
  <link rel="stylesheet" type="text/css" href="registerstyles.css">
  <script src="form.js"></script>
  
</head>
<body>
  <h1 align="center">New User</h1>
  <form class="custom-form" action="register.php" method="post">

    <label class="custom-label">First Name:</label>
    <input type="text" name="Firstname" id="firstname" class="custom-input">
    <div class="error-message" id="errorFirstName"></div>
    
    <label class="custom-label">Last Name:</label>
    <input type="text" name="Lastname" id="lastname" class="custom-input">
    <div class="error-message" id="errorLastName"></div>
   
    <label class="custom-label">Username:</label>
    <input type="text" name="Username" placeholder="Create a Username" id="username" class="custom-input">
    <div class="error-message" id="errorUsername"></div>
    

    <fieldset class="custom-fieldset">
      <legend class="custom-legend">Email:</legend>
      <input type="email" name="Email" placeholder="Enter valid email address" id="email" class="custom-input">
      <div class="error-message" id="errorEmail"></div>
      
      <label class="custom-label"></label>
      <input type="email" name="ConfirmEmail" placeholder="Confirm address entered" id="confirmEmail" class="custom-input">
      <div class="error-message" id="errorConfirmEmail"></div>
    </fieldset>
    
    <fieldset class="custom-fieldset">
      <legend class="custom-legend">Password:</legend>
      <div class="password-input">
        <input type="password" id="password" name="Password" placeholder="Create a strong password" class="custom-input">
        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()" class="custom-checkbox">
        <label for="showPassword" class="toggle-password-icon"></label>
      </div>
      <div class="error-message" id="errorPassword"></div>
      <br>
      <label for="confirmPassword" class="custom-label">Confirm Password:</label>
      <div class="password-input">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="custom-input">
        <input type="checkbox" id="showConfirmPassword" onclick="toggleConfirmPasswordVisibility()" class="custom-checkbox">
        <label for="showConfirmPassword" class="toggle-password-icon"></label>
      </div>
      <div class="error-message" id="errorConfirmPassword"></div>
    </fieldset>
    
    <label class="custom-label">Date of Birth:</label>
    <input type="date" name="DOB" id="dob" class="custom-input">
    <div class="error-message" id="errorDOB"></div>
    
    <p class="custom-paragraph">**Select an account type to continue with:**</p>
<label class="custom-label">Account Type</label>
<select class="custom-select" name="Account">
  <option value="">----select account---</option>
  <option value="E">Entrepreneur</option>
  <option value="I">Investor</option>
  <!--<option value="O">Other</option> -->
</select>
<div class="error-message" id="errorAccountType"></div>

    
    <input type="submit" name="Create" value="Create" class="custom-submit-button">
    <p>Already existing user? <a href="login.php" class="toplinks2">Log in</a></p>
  </form>
</body>
</html>
