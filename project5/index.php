<?php
// header('Content-Type:text/html;charset=utf-8');
// $link = mysql_connect('localhost','root','123456');
// //$link = @mysql_connect('localhost','root','123456');
// if($link){
//     echo '数据库连接正确。';
// }else{
//     echo '数据库连接失败.';
// }

// mysql_select_db('project5');
// mysql_query('set names utf8');

// $sql = 'select `id`,`title`,`addtime` from `news` order by `addtime` desc';
// $result = mysql_query($sql);

// $data = array();

// while($row = mysql_fetch_assoc($result)){
//     $data[] = $row;
// }

// require './news.html';

//----------------------------------------------------------

// require './init.php';
// $sql = 'select `id`,`title`,`addtime` from `news` order by `addtime` desc';
// $stmt = $pdo->query($sql);
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// require './news.html';

//----------------------------------------------------------
require './init.php';
require './page.class.php';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sql ="select count(*) as total from `news`";
$total = $pdo->query($sql)->fetchColumn();
$Page = new page($total,3,$page);
$limit = $Page->getLimit();
$page_html = $Page->showPage();
$sql = "select `id`,`title`,`addtime` from `news` order by `addtime` desc limit $limit";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
require './news.html';