<!DOCTYPE html>
<html>

<head>
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>

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
            <label for="title">title:</label><br>
            <input type="text" id="title" name="title" value="<?php echo $row["title"]; ?>"><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description"><?php echo $row["description"]; ?></textarea><br>

            <label for="image">image:</label><br>
            <input type="text" id="image" name="image" value="<?php echo $row["image"]; ?>"><br>


            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            <input type="submit" name="submit" value="Edit">
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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];


        $sql = "UPDATE posts SET title='$title', description='$description' , image = '$image' WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result) {
            echo "پست با موفقیت به‌روز‌رسانی شد.";
            header("Location: /onepagewebsite-main/post/ListPost.php");
        } else {
            echo "خطا در به‌روز‌رسانی پست: " . mysqli_error($conn);
        }
    }

    ?>
</body>

</html>