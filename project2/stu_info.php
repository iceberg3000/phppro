<?php
    $name = '王六';
    $birth = '1996-08-07';
    $subject = 'PHP';
    $snum = '0150427001';
    $stu_by = 1996;
    $stu_bm = 2;
    $stu_bd = 16;
    $cur_y = date('Y');
    $cur_m = date('n');
    $cur_d = date('j');

    $age = $cur_y - $stu_by;
    if($cur_m<$stu_bm || $cur_m == $stu_bm && $cur_d < $stu_bd){
        $age--;
    }

    //判断星座
    if($stu_bd<10){
        $stu_bd = '0'.$stu_bd;
    }
    $date = "$stu_bm.$stu_bd";
    $lev = '';
    if($date>=1.21 && $date<=2.19){
        $const = '水瓶座';
        $lev = 1;
    }elseif($date>=2.20 && $date<=3.20){
        $const = '双鱼座';
        $lev = 2;
    }elseif($date>=3.21 && $date<=4.20){
        $const = '白羊座';
        $lev = 3;
    }elseif($date>=4.21 && $date<=5.21){
        $const = '金牛座';
        $lev = 4;
    }elseif($date>=5.22 && $date<=6.21){
        $const = '双子座';
        $lev = 5;
    }elseif($date>=6.22 && $date<=7.22){
        $const = '巨蟹座';
        $lev = 6;
    }elseif($date>=7.23 && $date<=8.23){
        $const = '狮子座';
        $lev = 7;
    }elseif($date>=8.24 && $date<=9.23){
        $const = '处女座';
        $lev = 8;
    }elseif($date>=9.24 && $date<=10.23){
        $const = '天秤座';
        $lev = 9;
    }elseif($date>=10.24 && $date<=11.22){
        $const = '天蝎座';
        $lev = 10;
    }elseif($date>=11.23 && $date<=12.21){
        $const = '射手座';
        $lev = 11;
    }else{
        $const = '摩羯座';
        $lev =12;
    }

    //定义学生个性标签 数组
    $lable = "勇敢,低调,直率,执着,善良,乐活族,手机控,90后";
    $lables = explode(',',$lable);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示学生资料</title>
</head>
<body>
	<table>
        <tr><td>姓名：</td><td><?php echo $name;?></td></tr>
        <tr><td>出生日期：</td><td><?php echo $birth;?></td></tr>
        <tr><td>学科：</td><td><?php echo $subject;?></td></tr>
        <tr><td>学号：</td><td><?php echo $snum;?></td></tr>
        <tr><td>年龄：</td><td><?php echo $age;?></td></tr>
        <tr><td>星座：</td><td><?php echo $const;?><img src="./images/<?php echo $lev;?>.png" /></td></tr>
    </table>
    <div>
    <?php
        foreach($lables as $v){
            $colors = array('blue','red','yellow','green');
            $index = array_rand($colors);
            echo "<span style='background:".$colors[$index]."'".">".$v."</span>";
        }
    ?>
    </div>
</body>
</html>