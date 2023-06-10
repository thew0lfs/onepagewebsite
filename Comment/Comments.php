<!DOCTYPE html>
<html>

<head>
    <title>My comments</title>
</head>

<body>
    <h1>مدیریت نظرات </h1>
    <table>
        <tr>

            <th>فرستنده</th>
            <th>نظر</th>
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
        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["comment"] . "</td>";
                echo "<td>  <a href='/onepagewebsite-main/Comment/DeleteComment.php?id=" . $row["name"] . "' > حذف</a>  </td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>