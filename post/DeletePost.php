<!DOCTYPE html>
<html>

<head>
    <title>Delete Post</title>
</head>

<body>
    <h1>ایا میخواهید پست انتخابی را حذف کنید ؟</h1>

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM posts WHERE id ='$id' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
        } else {
            echo "post not found";
            exit;
        }

        $conn->close();

        ?>

        <form method="post">

            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            <input type="submit" name="submit" value="Yes">
            <a href="/onepagewebsite-main/post/ListPost.php" />No<a>
        </form>

        <?php
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $id = $_POST["id"];

        $sql = "DELETE FROM posts WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result) {
            echo "پست با موفقیت حذف شد.";
            header("Location: /onepagewebsite-main/post/ListPost.php");
        } else {
            echo "خطا در حذف پست: " . mysqli_error($conn);
        }
    }

    ?>
</body>

</html>