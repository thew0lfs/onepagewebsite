<!DOCTYPE html>
<html>

<head>
  <title>My Posts</title>
</head>

<body>
  <h1>مدیریت پست ها </h1>
  <h1><a href='CreatePost.php'>افزودن پست </a></h1>
  <h1><a href='/onepagewebsite-main/Comment/Comments.php'>مدیریت نظرات</a></h1>
  <div style="overflow-x:auto;">
    <table>
      <tr>

        <th>عکس</th>
        <th>عنوان</th>
        <th>توضیح</th>
        <th>عملیات</th>
      </tr>

      <?php
      // Connect to database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "test";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Fetch products from database
      $sql = "SELECT * FROM posts";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";

          echo '<td><img src="' . $row["image"] . '" alt="' . $row["title"] . '" width="100" height="100"></td>';
          echo "<td>" . $row["title"] . "</td>";
          echo "<td>" . $row["description"] . "</td>";
          echo "<td>  <a href='EditPost.php?id=" . $row["id"] . "' > ویرایش</a>  </td>";
          echo "<td>  <a href='DeletePost.php?id=" . $row["id"] . "' > حذف</a>  </td>";
          echo "</tr>";
        }
      } else {
        echo "0 results";
      }

      $conn->close();
      ?>
    </table>
    <div>
</body>

</html>