<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Validate and process the data
  if (!empty($username) && !empty($email) && !empty($password)) {
    // TODO: Perform additional validation and database operations here

    // Display success message or redirect to a success page
    echo "Registration successful!";
  } else {
    // Display error message or redirect to an error page
    echo "Please fill in all the fields.";
  }
}




// اینا مربوط به سروره لطفا بدون هماهنگی خودم تغییرش ندهید //


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $email , $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name , email , password ) VALUES ( '$name' , '$email' , '$password' )";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();































?>
