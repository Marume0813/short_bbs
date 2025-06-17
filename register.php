<?php
require 'db.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
 
    if (trim($username) === '' || trim($password) === '') {
        echo "ユーザー名とパスワードは必須です。";
        exit;
    }
 
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
 
    try {
        $stmt->execute([$username, $hashed]);
        echo "ユーザー登録成功！<br><a href='login.php'>ログインへ戻る</a>";
    } catch (PDOException $e) {
        echo "登録エラー: " . $e->getMessage();
    }
 
    exit;
    }
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>ユーザー登録</h1>
    <form action="register.php" method="post">
        <p>ユーザー名：<input type="text" name="username" required></p>
        <p>パスワード：<input type="password" name="password" required></p>
        <input type="submit" value="登録">
    </form>
</body>
</html>
 
