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