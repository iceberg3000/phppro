<?php

if($_POST){
    // var_dump($_POST);
    // exit;
    $data = array();
    $fields = array('title','content');
    foreach($fields as $v){
        $data[$v] = isset($_POST[$v]) ? trim(htmlspecialchars($_POST[$v])) : '';
    }
    
    require './init.php';
    $sql = 'insert into `news`(`title`,`content`) values(:title,:content)';
    $stmt = $pdo->prepare($sql);
    if(!$stmt->execute($data)){
        exit('执行失败：'.implode('-',$stmt->errorInfo()));
    }
    header("Location:index.php");
    exit;
}

require './add.html';