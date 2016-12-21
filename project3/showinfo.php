<?php
$user_data = file_get_contents('./1.txt');
$user_data = unserialize($user_data);
$user_data['hobby'] = implode('、',$user_data['hobby']);
require "./showinfo.html";