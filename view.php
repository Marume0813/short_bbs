<?php
require 'db.php';

$stmt = $pdo->query("
    SELECT c.content, c.created_at, u.username
    FROM comment c
    JOIN user u ON c.user_id = u.id
    ORDER BY c.created_at DESC
");
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>📜 投稿一覧</h1>
    <p><a href="form.php">← 投稿フォームへ戻る</a></p>
    <hr>
    <?php if (count($comments) === 0): ?>
        <p>まだ投稿がありません。</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="post">
                <p><strong><?= htmlspecialchars($comment['username']) ?></strong> さん (<?= htmlspecialchars($comment['created_at']) ?>)</p>
                <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
