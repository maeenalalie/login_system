<?php
include 'db_config.php';

// تشفير كلمة المرور قبل إدخالها
$password = password_hash("123456", PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, password) VALUES ('admin', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "تم إدخال المستخدم بنجاح.";
} else {
    echo "خطأ: " . $conn->error;
}

$conn->close();
?>
