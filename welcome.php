<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبًا</title>
</head>
<body>
    <h2>مرحبًا <?php echo $_SESSION["username"]; ?>!</h2>
    <a href="logout.php">تسجيل الخروج</a>
</body>
</html>
