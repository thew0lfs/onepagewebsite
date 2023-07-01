<?php
// اتصال به دیتابیس MySQL
$servername = "localhost"; // نام سرور
$username = "root"; // نام کاربری دیتابیس
$password = ""; // رمز عبور دیتابیس
$dbname = "test"; // نام دیتابیس

// برقراری اتصال با سرور MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// دریافت مقادیر ارسال شده از فرم
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// استفاده از prepared statement برای جلوگیری از SQL Injection
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// اجرای prepared statement
if ($stmt->execute()) {
    header("location: contact.html");
} else {
    echo "Error: " . $stmt->error;
}

// بستن اتصال به دیتابیس
$stmt->close();
$conn->close();
?>