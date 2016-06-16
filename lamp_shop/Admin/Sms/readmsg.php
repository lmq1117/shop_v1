<?php
    require '../init.php';
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:./login.php');exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>收信</title>

<script type="text/javascript" src="./Public/js/jquery.js"></script>

<link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
<div class="div_from_aoto" style="width: 500px;margin-left:80px;">
    <h2>消息详情</h2>
    
    <?php

        $mid = isset($_GET['mid'])?$_GET['mid']:'';
        $sql = "select m.`id` as mid,m.`title` as mt,m.`content` as mc,u.`name` as un from `" . PIX . "msg` as m  inner join `". PIX ."users` as u on  m.`id` = {$mid} and m.`senderid` = u.id";

    $detail = query($sql);
    if(empty($detail))
    {
        echo '查看站内信详情失败！';
        echo '<meta http-equiv="refresh" content="3;url=./receive.php" />';exit;
    }
    $msgDetail = $detail[0];

    //状态数组
    $stat = array('未读','已读');
     
    ?>
    <table border="1" width="300px" cellpadding="5" cellspacing="0">
        <tr>
            <th>标题</th>
            <th>详情</th>
        </tr>
        <tr>
            <td><h4>发件人<h4></td>
            <td><?=$msgDetail['un']?></td>
        </tr>
        <tr>
            <td><h4>主题<h4></td>
            <td><?=$msgDetail['mt']?></td>
        </tr>
        <tr>
            <td><h4>内容<h4></td>
            <td><?=$msgDetail['mc']?></td>
        </tr>
    </table>
</div>

</body></html>
