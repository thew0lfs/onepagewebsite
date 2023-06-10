<!DOCTYPE html>
<html>

<head>
    <title>Delete Post</title>
</head>

<body>
    <h1>ایا میخواهید نظر انتخابی را حذف کنید ؟</h1>

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

        $sql = "SELECT * FROM comments WHERE name ='$id' ";
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

            <input type="hidden" name="id" value="<?php echo $row["name"]; ?>">

            <input type="submit" name="submit" value="Yes">
            <a href="/onepagewebsite-main/Comment/Comments.php" />No<a>
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

        $sql = "DELETE FROM comments WHERE name = '$id'";
        $result = $conn->query($sql);

        if ($result) {
            echo "نظر با موفقیت حذف شد.";
            header("Location: /onepagewebsite-main/Comment/Comments.php");
        } else {
            echo "خطا در حذف نظر: " . mysqli_error($conn);
        }
    }

    ?>
</body>

</html>