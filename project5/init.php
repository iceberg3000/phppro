<?php
header('Content-Type:text/html;charset=utf-8');
$dsn = 'mysql:host=localhost;dbname=project5;charset=utf8';
try{
    $pdo = new PDO($dsn,'root','123456');
}catch(PDOException $e){
    exit('PDO连接数据库失败：'.$e->getMessage());
}

//echo 'PDO连接数据库成功';