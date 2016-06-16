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

            case 'editorderstatus':
                $oid = isset($_GET['oid']) ? $_GET['oid'] : '' ;
                if($oid === '')
                {
                    echo '出大事儿了';exit;
                }
                $status = isset($_POST['status']) ? $_POST['status'] : '';
                $sql = "update `" . PIX . "orders` set `status` = {$status} where id = {$oid}";
                $affectRow = execu($sql);
                if($affectRow == 1)
                {
                    echo '修改订单状态成功！';
                    echo '<meta http-equiv="refresh" content="3;url=./orderlist.php" />';exit;
                }
                else
                {
                    echo '修改订单状态失败！';exit;
                }
            break;
    }
