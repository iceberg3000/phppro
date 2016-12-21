<?php
require './init.php';
$blood = array('未知','A','B','O','AB','其他');
$hobby = array('跑步','游泳','唱歌','登山','旅游','看电影','读书');
require 'userinfo.html';


if(!empty($_POST)){
    /*
    echo '姓名：'.$_POST['name'];
    echo '性别：'.$_POST['gender'];
    echo '血型：'.$_POST['blood'];
    echo '爱好：'.implode('、',$_POST['hobby']);
    echo '个人简介：'.$_POST['description'];
    */

    $fields = array('name','description','gender','blood','hobby','gender');
    $user_data = array();
    foreach ($fields as $v) {
        $user_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
    }
    
    $user_data['name'] = htmlspecialchars($user_data['name']);
    $user_data['description'] = htmlspecialchars($user_data['description']);

    if($user_data['gender']!='男' && $user_data['gender']!='女'){
        exit('保存失败,未选择性别。');
    }

    if(!in_array($user_data['blood'],$blood)){
        exit('保存失败，您选择的血型不在允许的范围内。');
    }

    if(is_array($user_data['hobby'])){
        $user_data['hobby'] = array_intersect($hobby,$user_data['hobby']);
    }

    if(is_string($user_data['hobby'])){
        $user_data['hobby'] = array($user_data['hobby']);
    }

    $user_id = 1;
    $file_path = "./$user_id.txt";
    $data = serialize($user_data);
    file_put_contents($file_path,$data);
}


