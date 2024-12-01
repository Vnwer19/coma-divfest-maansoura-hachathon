<?php
require 'db.php'; // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "<h3>Login successful! Welcome, " . htmlspecialchars($user['full_name']) . ".</h3>";
        // يمكنك هنا إضافة جلسة (Session) لتخزين معلومات المستخدم
    } else {
        echo "<h3>Invalid username or password. <a href='login.html'>Try again</a></h3>";
    }
}
?>
