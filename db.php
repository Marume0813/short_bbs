<?php
    $dsn = 'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1553906-shortdb;charset=utf8';
    $user = 'LAA1553906';
    $password = 'Pass0813';
 
    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'DB接続エラー: ' . $e->getMessage();
        exit;
    }
?>
