<!DOCTYPE html>
<html>

<head>
    <title>صفحه جزییات پست</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .post-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 36px;
            margin: 0 0 10px;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            margin: 0;
        }
    </style>
</head>

<body>
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
    }
    ?>

    <div class="container">
        <img src='<?php echo $row["image"]; ?>' alt="عنوان عکس" class="post-image">
        <h1>
            <?php echo $row["title"]; ?>
        </h1>
        <p>
            <?php echo $row["description"]; ?>
        </p>


        <div>
            <h2>نظرات</h2>
            <form method="post">
                <input type="hidden" name="postId" value='<?php echo $row["id"]; ?>'>
                <label for="name">نام:</label><br>
                <input type="text" id="name" name="name"><br>

                <label for="comment">نظر شما:</label><br>
                <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>

                <input type="submit" value="ارسال">
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $comment = $_POST['comment'];
                $postId = $_POST['postId'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "INSERT INTO comments (name, comment, postId) VALUES ('$name', '$comment', '$postId')";
                $result = $conn->query($sql);
                if ($result === TRUE) {
                    echo "post added successfully!";
                    header("Location: /onepagewebsite-main/post/PostDetail.php?id=" . $row["id"]);
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }

            ?>
            <ul>

                <?php
                // Connect to database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";

                $postId = $row["id"];

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch products from database
                $sql = "SELECT * FROM comments WHERE postId ='$postId'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                        echo "   <li>" . $row["name"] . " - Say : " . $row["comment"] . "</li>";

                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>


            </ul>
        </div>
    </div>
</body>

</html>