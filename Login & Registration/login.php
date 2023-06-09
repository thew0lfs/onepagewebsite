<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $user = $_POST['name'];
  $pass = $_POST['password'];

  $con = mysqli_connect('localhost' , 'root' , '');

  mysqli_select_db($con , 'users');
  
  $result = mysqli_query($con , "SELECT * FROM  users  WHERE user = '$user'   ");

  if ($row == mysqli_fetch_array($result)){
    if ($pass == $row['password']){
      header("location: index.html ");
    }
    else {
      echo "NO?";
    }

}
?>







