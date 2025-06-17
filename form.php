<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: login.html"); // ログインページへ戻す
        exit;
    }
  
    $username = htmlspecialchars($_SESSION['user']['username']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>💬 一言掲示板</h1>
    <p>ようこそ、<?= $username ?>さん</p>
    <form action="post.php" method="post">
        <p>コメント：<br>
        <textarea name="comment" rows="4" cols="40" required></textarea></p>
        <p><button type="submit">投稿する</button></p>
    </form>
    <p><a href="view.php">▶ 投稿一覧を見る</a></p>
    <p><a href="logout.php">ログアウト</a></p>
</body>
</html>
