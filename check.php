<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: form.php");
    exit;
} else {
    echo "ログインに失敗しました";
}
?>