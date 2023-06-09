<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $server = mysqli_connect('localhost' , 'root' , '');


  mysqli_select_db('$sever' , 'users');


























}
?>
