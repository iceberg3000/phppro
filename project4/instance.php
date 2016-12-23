<?php
header('Content-type:text/html;charset=utf-8');
require 'employee.class.php';
require 'NormalEmployee.class.php';
require 'ManageEmployee.class.php';

// $e1 = new Employee;
// $e1->name = '张三';
// $e1->age = 23;
// $e1->introduce();

// $e1 = new Employee('张三',25);
// $e2 = new Employee('李四',35);

// $e1->introduce();
// $e2->introduce();

// $e1 = new NormalEmployee('dogface',24);
// $e1->introduce();

// $e2 = new ManageEmployee('leader',38);
// $e2->introduce();

$e1 = new NormalEmployee();
$e1->_name='dogface';
$e1->_age=24;

$e2 = new ManageEmployee();
$e2->_name='leader';
$e2->_age=39;

$e1->introduce();
$e2->introduce();

