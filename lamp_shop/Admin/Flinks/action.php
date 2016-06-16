<?php
    //包含初始化文件
    require '../init.php';
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }

    $handler = isset($_GET['handler']) ? $_GET['handler'] : '';
    switch($handler)
    {       
            case 'addflink':
                $status = 1;
               
                $name = isset($_POST['name']) ? $_POST['name'] : '';
                $link = isset($_POST['link']) ? $_POST['link'] : '';
                $sql = "insert into `" . PIX . "flinks` (`name`,`link`,`status`) values ('{$name}','{$link}',{$status})";
                $insertId = execu($sql);
                if($insertId)
                {
                    echo '添加友情链接成功！';
                    echo '<meta http-equiv="refresh" content="3;url=./flinklist.php" />';exit;
                }
                else
                {
                    echo '添加友情链接失败！';exit;
                }
            break;
        case 'changestatus':
                $status = $_GET['stat'];
                $id = $_GET['id'];
                if($status)
                {
                    $status = '0';
                }
                else
                {
                    $status = '1';
                }

                $sql = "update `" . PIX . "flinks` set `status` = {$status} where `id` = {$id}";
                $affetctedrow = execu($sql);
                if($affetctedrow == 1)
                {
                    header('location:./flinklist.php');exit;
                }
            break;
    }
