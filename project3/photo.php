<?php
echo '<pre>';
print_r($_FILES);
echo '</pre>';

$user_id = 1;
$photo = "./uploads/thumb_$user_id.jpg";
$photo = is_file($photo) ? $photo : './default.png';

require './photo.html';

if(isset($_FILES['pic'])){
    $pic = $_FILES['pic'];
    if($pic['error']>0){
        $error = '上传失败：';
        switch($pic['error']){
            case 1:$error.='文件大小超过了服务器设置的限制！';break;
            case 2:$error.='文件大小超过了表单设置的限制！';break;
            case 3:$error.='文件只有部分被上传！';break;
            case 4:$error.='没有文件被上传！';break;
            case 6:$error.='上传文件临时目录不存在！';break;
            case 7:$error.='文件写入失败！';break;
            default:$error.='未知错误!';break;
        }
        exit($error);
    }

    //判断上传文件类型
    if($pic['type']!=='image/jpeg'){
        exit('图像类型不符合要求，只支持jpg类型的图片');
    }

    //保存用户头像文件
    $user_id = 1;
    $save_path = "./uploads/$user_id.jpg";
    if(!move_uploaded_file($pic['tmp_name'],$save_path)){
        exit('上传文件保存失败！');
    }

    //生成头像缩略图
    $img_info = getimagesize($save_path);
    $width = $img_info[0];
    $height = $img_info[1];

    $maxwidth = $maxheight = 100;
    if($width>$height){
        $newwidth = $maxwidth;
        $newheight = round($newwidth * $height / $width);
    }else{
        $newheight = $maxheight;
        $newwidth = round($newheight * $width / $height);
    }

    $thumb = imagecreatetruecolor($newwidth,$newheight);
    $source = imagecreatefromjpeg($save_path);
    imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
    $thumb_save_path = "./uploads/thumb_$user_id.jpg";
    imagejpeg($thumb,$thumb_save_path,100);
}