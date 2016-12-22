<?php
header('Content-type:text/html;charset=utf-8');
require 'employee.class.php';
$e1= new Employee;

$e1->name = '张三';
$e1->age = 25;
$e1->introduce();

$e2 = new Employee;
$e2->name = '李四';
$e2->age = 30;
$e2->introduce();

$e3 = new Employee;
$e3->name = '王五';
$e3->age = 50;
$e3->introduce();

$e4 = new Employee;
$e4->name = '赵六';
$e4->age = 45;
$e4->introduce();