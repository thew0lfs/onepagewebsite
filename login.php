<?php
// Check if the login form is submitted
if (isset($_POST['login'])) {
  // Get the submitted username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the login credentials (this is a basic example, you should use secure authentication methods)
  if ($username === 'admin' && $password === 'password') {
    // Successful login, redirect to the home page or perform any other desired actions
    header('Location: home.php');
    exit;
  } else {
    // Invalid login, display an error message
    echo 'Invalid username or password';
  }
}
?>
