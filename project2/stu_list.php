<?php
include './page.php';
$info = array(
    array('name'=>'王六','birth'=>'1996-08-07','subject'=>'php','snum'=>'0150427001'),
    array('name'=>'张三','birth'=>'1995-08-07','subject'=>'php','snum'=>'0150427002'),
    array('name'=>'王五','birth'=>'1996-08-07','subject'=>'php','snum'=>'0150427003'),
    array('name'=>'马六','birth'=>'1996-08-07','subject'=>'php','snum'=>'0150427004'),
    array('name'=>'赵七','birth'=>'1996-08-07','subject'=>'php','snum'=>'0150427005'),
    array('name'=>'郑八','birth'=>'1996-08-07','subject'=>'php','snum'=>'0150427005'),
);

$total_num = count($info);
$prepage = 4;
$page = isset($_GET['page'])?(int)$_GET['page']:1;
$total_page = ceil($total_num/$prepage);

$page = max($page,1);
$page = min($page,$total_page);

$start_index = $prepage * ($page-1);
$end_index = $prepage * $page - 1;
$end_index = min($end_index,$total_num-1);

?>
<div>&gt;&gt;学生管理&gt;&gt;0427PHP就业班&gt;&gt;学生列表</div>
<table>
    <tr><th>学号</th><th>姓名</th><th>出生日期</th><th>详情</th></tr>
    <?php for($i=$start_index;$i<=$end_index;++$i):?>
    <tr>
        <td><?php echo $info[$i]['snum'];?></td>
        <td><?php echo $info[$i]['name'];?></td>
        <td><?php echo $info[$i]['birth'];?></td>
        <td><a href="#">点击查看详情</a></td>
    </tr>
    <?php endfor; ?>
</table>
<div><?php echo showPage($page,$total_page);?></div>
