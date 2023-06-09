<?php

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$mysql = mysqli_connect('localhost' , 'root' , '');

mysqli_select_db($mysql , 'users');

mysqli_query( $mysql , "INSERT INTO `users`(`id`, `name`, `email`, `password`) VALUES ('','$name','$email','$pass')");

header("Location: registered.html");
exit();
?>
