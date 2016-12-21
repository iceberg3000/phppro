<?php
$user_data = array(
    1=>array('username'=>'xiaoming','password'=>'123456')
);
if(isset($_POST['username']) && isset($_POST['password'])){
    $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']):'';
    session_start();
    if(empty($_SESSION['captcha'])){
        exit('验证码已经过期，请刷新页面重试。');
    }
    $true_captcha = $_SESSION['captcha'];
    unset($_SESSION['captcha']);
    if(strtolower($captcha)!==strtolower($true_captcha)){
        exit('您输入的验证码不正确，请刷新页面重试！');
    }
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    foreach($user_data as $k=>$v){
        if($v['username']==$username && $v['password']==$password){

            //session_start();
            $_SESSION['user'] = array('id'=>$k,'username'=>$v['username']);
            header('Location:userinfo.php');
            exit('登录成功!');
        }
    }

    exit('登录失败！用户名或密码错误。');
}

require './login.html';