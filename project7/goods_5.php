<?php
header('Content-Type:text/html;charset=utf-8');
require './HTMLPurifier/HTMLPurifier.standalone.php';
$Purifier = new HTMLPurifier();
$html = isset($_POST['description']) ? $_POST['description'] : '';

echo $Purifier->purify($html);