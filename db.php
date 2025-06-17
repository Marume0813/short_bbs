<?php
    $dsn = 'mysql:host=localhost;dbname=short_bbs_db;charset=utf8';
    $user = 'root';
    $password = '';
 
    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'DB接続エラー: ' . $e->getMessage();
        exit;
    }
?>
