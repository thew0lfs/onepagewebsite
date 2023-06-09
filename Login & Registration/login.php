<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $user = $_POST['username'];
  $pass = $_POST['password'];

  $con = mysqli_connect('localhost' , 'root' , '');

  mysqli_select_db($con , 'users');
  
  $result = mysqli_query($con , "SELECT * FROM 'users'  WHERE 'user' = '$user'   ");

  while($row == mysqli_fetch_array($result)){
    if ($pass == $row['password']){
      echo "ok"
    }
    else {
      echo "NO?"
    }

}
?>
