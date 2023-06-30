<?php
$user = $_POST['name'];
$pass = $_POST['password'];

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'users');

$result = mysqli_query($con, "SELECT * FROM `users` WHERE `name` = '$user'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if ($pass == $row['password']) {
            header("location: signed-in.html");
        } else {
            header("location: incorrect-data.html");
        }
    }
} else {
    header("location: incorrect-data.html");
}
?>
