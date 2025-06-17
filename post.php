<?php
session_start();
require 'db.php';
 
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}
 
$user_id = $_SESSION['user']['id']; // ログインユーザーのIDを取得
$comment = $_POST['comment'] ?? '';
$comment = trim($comment);
 
if ($comment === '') {
    header("Location: form.php");
    exit;
}
 
try {
    // コメントをDBに保存
    $stmt = $pdo->prepare("INSERT INTO comment (user_id, content, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $comment]);
 
    header("Location: view.php");
    exit;
} catch (PDOException $e) {
    echo "投稿エラー: " . $e->getMessage();
}