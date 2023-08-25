<?php
session_start()

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "is_project";

    $connect = mysqli_connect($server, $user, $password, $database);
    if (!$connect) {
        die(mysqli_error($connect));
    }

    $Password = $_POST['Password'];
    $Email = $_POST['Email'];

    // Check if the user with the given student ID and email exists in the database
    $stmt_check = $connect->prepare("SELECT * FROM registration WHERE Password = ? AND Email = ?");
    $stmt_check->bind_param("ss", $Password, $Email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // User with the given student ID and email exists, redirect to the home page or display a success message
        session_start();
        $_SESSION['Email'] = $Email;
        header("location: entrepreneur.php");
    } else {
        // User with the given student ID and email does not exist, display an error message
        echo "Invalid login details. Please check your Student ID and Email.";
    }

    $stmt_check->close();
    $connect->close();
}
?>




<!DOCTYPE html>
<html>
<head>
  <title>The login page</title>
  <link rel="stylesheet" type="text/css" href="loginstyles.css">
  <script src="form1.js"></script>
</head>
<body>
  <h1 class="logo" align="center">DIS</h1>
  <form class="custom-form" onsubmit="return validateForm();">
    <label class="custom-label">Email:</label>
      <input type="email" name="Email" placeholder="Enter valid email address" id="email" class="custom-input">
        <span id="email-error" class="error-message"></span>
    <label class="custom-label" for="password">Password:</label>
      <input type="password" id="password" name="Password" class="custom-input">
        <span id="password-error" class="error-message"></span>
   <!-- <label class="custom-label">Account Type</label>
    <select class="custom-select" name="accountType">
  <option>----select account---</option>
  <option>Entrepreneur</option>
  <option>Investor</option> -->

</select>
<span id="accountType-error" class="error-message"></span>
<a href="entrepreneur.php">
  <input type="submit" name="Log In" value="Log In" class="custom-submit-button">
</a>

  </form>
  <p class="custom-paragraph">New user? <a href="register.php" class="toplinks2">Create Account</a></p>
</body>
</html>