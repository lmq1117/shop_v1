<?php
    require './config.php';
    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die('数据库连接错误：错误号'.mysqli_connect_errno().'错误信息：'.mysqli_connect_error());
    mysqli_set_charset($link,'utf8');

    //修改
    if($_GET['act'] == 'modify')
    {
        if(!empty($_POST['id']))
        {
            $sql = "update `shop_liuyan` set `topic`='".$_POST['topic']."',`content`='".$_POST['content']."' where id=" . $_POST['id'];
            $result = mysqli_query($link,$sql);
            if($result && mysqli_affected_rows($link) == 1)
            {
                echo '修改成功！';
                sleep(1);
                header('location:./admin.php');exit;
            }
            else
            {
                exit('未知错误！');
            }
        }
        else
        {
            header('location:./modify.php?id=' . $_GET['id']);
        }
    }
    //删除
    if($_GET['act'] == 'del')
    {
        $sql = "delete from `shop_liuyan` where `id` ={$_GET['id']}";
        $result = mysqli_query($link,$sql);
        if($result && mysqli_affected_rows($link) == 1)
        {
            echo '删除成功！';
            sleep(1);
            header('location:./admin.php');
        }
        else
        {
            echo '未知错误';
            exit;
        }
    }
    if($_GET['act'] == 'add'){
        header('location:./index.php');exit;
    }
    mysqli_close($link);
