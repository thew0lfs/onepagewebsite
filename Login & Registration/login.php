<?php

  
  $user = $_POST['name'];
  $pass = $_POST['password'];

  $con = mysqli_connect('localhost' , 'root' , '');

  mysqli_select_db($con , 'users');
  
  $result = mysqli_query($con , "SELECT * FROM  `users`  WHERE  `name` = '$user'   ");
  
  while ($row = mysqli_fetch_array($result)){
    if ($pass == $row['password']){
      header("location: register.html");
    }
    else {
      echo "NO?";
    }

}
?>







