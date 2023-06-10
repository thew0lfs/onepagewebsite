<!DOCTYPE html>
<html>

<head>
  <title>Add Post</title>
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