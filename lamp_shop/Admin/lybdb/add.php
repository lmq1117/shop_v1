<?php
    require './config.php';
    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die('数据库连接错误：错误号'.mysqli_connect_errno().'错误信息：'.mysqli_connect_error());
    mysqli_set_charset($link,'utf8');
    $sql = "insert into `shop_liuyan` (`name`,`topic`,`content`,`addtime`) values ('".$_POST['name']."','".$_POST['topic']."','".$_POST['content']."',".time().")";
    $result = mysqli_query($link,$sql);
    if($result && mysqli_affected_rows($link) == 1){
        header('location:index.php');
    }else{
        echo '未知错误';
    }
    mysqli_close($link);
