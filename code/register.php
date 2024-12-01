<?php
require 'db.php'; // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)");

    try {
        $stmt->execute([$fullName, $email, $username, $password]);
        
        // إعادة التوجيه إلى الصفحة الرئيسية
        header("Location: index.html");
        exit; // إنهاء التنفيذ بعد إعادة التوجيه
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "<h3>Error: Username or email already exists.</h3>";
        } else {
            echo "<h3>Error: " . $e->getMessage() . "</h3>";
        }
    }
}
?>
