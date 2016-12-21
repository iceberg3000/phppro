<?php
$user_id = 1;
$album_path = "./album-$user_id";
is_dir($album_path) || mkdir($album_path,0777,true);
if(isset($_GET['path'])){
    //$path = $_GET['path'];
    $path = trim($_GET['path'],'/\\.');
    preg_match('/^[\w\/]*$/',$path) || exit('路径只允许字母，数字，下划线，斜线');
    $path = $path ? "$album_path/$path" : $album_path;
    is_dir($path) || exit('您访问的相册不存在！');
}else{
    $path = $album_path;
}

if(isset($_POST['dir_name'])){
    $dir_name = $_POST['dir_name'];
    preg_match('/^\w+$/',$dir_name) || exit('相册名只允许字母，数字，下划线');
    $target_path = "$path/$dir_name";
    if(!file_exists($target_path)){
        mkdir($target_path,0777);
    }
}

if(isset($_FILES['file_name'])){
    $save_name = md5(uniqid(rand())).'.jpg';
    $save_path = "$path/$save_name";
    if(!move_uploaded_file($_FILES['file_name']['tmp_name'],$save_path)){
        exit('上传图保存失败。');
    }
}

$folderlist = array();
$filelist = array();
$album_path_len = strlen($album_path)+1;
foreach (glob($path.'/*') as $v) {
    if(is_dir($v)){
        $folderlist[] = substr($v,$album_path_len); 
    }elseif(is_file($v)){
        $filelist[] = $v;
    }
}

//去除前面的相册路径
$path = substr($path,$album_path_len);

require './album.html';