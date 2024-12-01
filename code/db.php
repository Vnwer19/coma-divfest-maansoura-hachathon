<?php
$host = 'localhost';
$dbname = 'auth_system';
$username = 'root'; // اسم مستخدم قاعدة البيانات
$password = ''; // كلمة مرور قاعدة البيانات

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
