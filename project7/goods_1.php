<?php
$snArr = array('sn01','sn02','sn03','sn04');

$action = isset($_GET['action']) ? $_GET['action'] : '';

$data = isset($_GET['data']) ? $_GET['data'] : '';

if($action == 'checkSn'){
    $xml = '<?xml version="1.0" encoding="utf-8"?>';
    if(in_array($data,$snArr)){
        $xml.= '<result><flag>error</flag><message>该编号已经存在</message></result>';
    }else{
        $xml.='<result><flag>ok</flag><message>填写正确</message></result>';
    }

    header('content-type:text/xml');
    echo $xml;
}