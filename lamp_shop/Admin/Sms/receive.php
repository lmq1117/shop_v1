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

<link rel="stylesheet" href="./Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="./Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
<div class="div_from_aoto" style="width: 500px;">
    <h2>收信</h2>
    <!-- 将未读消息已读未删消息查出来  -->
    <!-- 并按未读优先的原则排序  -->
    <?php 
    //id是时间顺序，状态是未读优先，已读的显示在后边
    //$sql = "select `senderid`,`title`,`status` from `" . PIX . "msg` where `receid` = {$_SESSION['userInfoAdmin']['id']} and status < 2 order by `status` asc,`id` desc";
    $sql = "select m.`id` as mid,`name`,`title`,m.`status` as stat from `" . PIX . "msg` as m inner join `". PIX ."users` as u on `receid` = {$_SESSION['userInfoAdmin']['id']} and m.status < 2 and senderid = u.id order by `stat` asc,m.`id` desc";
    //echo $sql;
    $msgs = query($sql);
    if(empty($msgs))
    {
        echo '你当前木有新消息';
        echo '<meta http-equiv="refresh" content="3;url=./newmsg.php" />';exit;
    }

    //状态数组
    $stat = array('未读','已读');
    ?>
    <table border="1" width="700px" cellpadding="5" cellspacing="0">
        <tr>
            <th>发件人</th>
            <th>主题</th>
            <th>状态</th>
        </tr>
        <?php foreach($msgs as $val): ?>
        <tr>
            <td><?= $val['name']?></td>
            <td><a style="text-decoration:none;color:black;" href="./action.php?handler=readmsg&mid=<?= $val['mid'];?>&stat=<?= $val['stat']?>"><?= $val['stat'] == 0 ? '<b>' . $val['title'] . '<b>' : $val['title'];?></a></td>
            <td><?= $stat[ $val['stat'] ]?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body></html>
