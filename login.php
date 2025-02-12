<?php
session_start();
include 'db_config.php';

$message = "";

// تحقق من تسجيل الدخول
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            $message = "كلمة المرور غير صحيحة!";
        }
    } else {
        $message = "اسم المستخدم غير موجود!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
</head>
<body>
    <h2>تسجيل الدخول</h2>
    <form method="post">
        <label>اسم المستخدم:</label>
        <input type="text" name="username" required>
        <br><br>
        <label>كلمة المرور:</label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit">تسجيل الدخول</button>
    </form>
    <p style="color:red;"><?php echo $message; ?></p>
</body>
</html>
