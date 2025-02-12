<?php
$host = "localhost";
$user = "root"; // اسم المستخدم لقاعدة البيانات
$pass = ""; // كلمة المرور، ضعها فارغة إذا لم يكن لديك كلمة مرور
$dbname = "login_system";

$conn = new mysqli($host, $user, $pass, $dbname);

// تحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
