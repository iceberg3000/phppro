<?php
header('Content-type:text/html;charset=utf-8');
require 'employee.class.php';

$e1 = new Employee;
$e1->name = '张三';
$e1->age = 23;
$e1->introduce();