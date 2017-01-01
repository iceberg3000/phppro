<?php
if(isset($_FILES['image'])){
    $result = uploadImage($_FILES['image']);
    header('content-type:text/xml');
    echo '<?xml version="1.0" encoding="utf-8"?>';
    echo '<result>'.$result.'</result>';
}

function uploadImage($file){
    if($file['error']>0){
        return '<flag>error</flag><message>上传失败</message>';
    }
    $type = strchr($file['name'],'.');
    if($type!='.jpg'){
        return '<flag>error</flag><message>上传失败，只允许jpg扩展名</message>';
    }
    $filename = substr(uniqid(rand()),-6).'.jpg';
    $filepath = './uploads/'.$filename;
    if(move_uploaded_file($file['tmp_name'],$filepath)){
        return '<flag>ok</flag><message>'.$filepath.'</message>';
    }else{
        return '<flag>error</flag><message>上传失败</message>';
    }
}