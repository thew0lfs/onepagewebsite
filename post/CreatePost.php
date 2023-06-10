<!DOCTYPE html>
<html>

<head>
  <title>Add Post</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      margin-top: 20px;
      text-align: center;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #f2f2f2;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #ccc;
    }
  </style>

</head>

<body>
  <h1>Add a New Post</h1>

  <form method="post" enctype="multipart/form-data">

    <label for="title">title:</label><br>
    <input type="text" id="title" name="title"><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>

    <label for="image">Image:</label><br>
    <input type="text" id="image" name="image"><br><br>

    <input type="submit" name="submit" value="Add">
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO posts (title, description, id, image) VALUES ('$title', '$description', '$title', '$image')";
    if ($conn->query($sql) === TRUE) {
      echo "post added successfully!";
      header("Location: /onepagewebsite-main/post/ListPost.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
  ?>

</body>

</html>
