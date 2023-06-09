
Fatal error: Uncaught TypeError: mysqli_select_db(): Argument #1 ($mysql) must be of type mysqli, string given in C:\xampp\htdocs\onepagewebsite-main\Login & Registration\register.php:9 Stack trace: #0 C:\xampp\htdocs\onepagewebsite-main\Login & Registration\register.php(9): mysqli_select_db('$mysql', 'users') #1 {main} thrown in C:\xampp\htdocs\onepagewebsite-main\Login & Registration\register.php on line 9











<?php

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$mysql = mysqli_connect('localhost' , 'root' , '');

mysqli_select_db('$mysql' , 'users');

mysqli_query('$mysql' , "INSERT INTO `users`(`id`, `name`, `email`, `password`) VALUES ('','$name','$email','$pass')");
?>

