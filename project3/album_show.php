<?php
$user_id = 1;
$album_path = "./album-$user_id";
$path = isset($_GET['path']) ? $_GET['path'] : '';
$file = basename($path);
$path = dirname($path);
$path = $path? "$album_path/$path" : $album_path;

$current = "$path/$file";
$file_list = glob("$path/*.*");
foreach ($file_list as $k => $v) {
    if($v == $current){
        $prev = isset($file_list[$k-1])?$file_list[$k-1] : '';
        $next = isset($file_list[$k+1])?$file_list[$k+1] : '';
        break;
    }
}
$album_path_len = strlen($album_path)+1;
$path = substr($path,$album_path_len);

//清除历史记录
if(isset($_GET['action'])){
    if($_GET['action']=='clear'){
        unset($_COOKIE['history']);
        setcookie('history','',time()-1);
    }
}

if(isset($_COOKIE['history'])){
    $history = explode('|',$_COOKIE['history'],5);
    foreach ($history as $k => $v) {
        if($v==$current) unset($history[$k]);
    }
    if(count($history)>4) array_shift($history);
    $history[] = $current;
    setcookie('history',implode('|',$history));
}else{
    $history = array($current);
    setcookie('history',$current);
}



require './album_show.html';