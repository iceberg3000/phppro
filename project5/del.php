<?php
require './init.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = array('id'=>$id);
$sql = 'delete from `news` where id=:id';
$stmt = $pdo->prepare($sql);
if(!$stmt->execute($data)){
    exit('执行失败：'.implode('-',$stmt->errorInfo()));
}
header('Location:index.php');