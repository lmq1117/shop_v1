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

        case 'sendmsg':
            //接收数据
            $senderid = isset($_GET['senderid']) ? $_GET['senderid'] : '';
            $receiverid = isset($_POST['receiver']) ? $_POST['receiver'] : '';
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';

            //验证数据
            if($senderid === '' || $receiverid === '' || $title ==='' || $content === '')
            {
                echo '所有信息不能为空，请检查后重新发送';
                exit;
                echo '<meta http-equiv="refresh" content="3;url=./newmsg.php" />';exit;
            }
            $status = 0;
            //准备sql语句
            $sql = "insert into `" . PIX . "msg` (`senderid`,`receid`,`title`,`content`,`status`) values ({$senderid},{$receiverid},'{$title}','{$content}',{$status})"; 
            $insertid = execu($sql);
            if($insertid)
            {
                echo '发信成功！';
                echo '<meta http-equiv="refresh" content="3;url=./newmsg.php" />';exit;
            }
            break;
        case 'readmsg':
            $status = isset($_GET['stat']) ? $_GET['stat'] : '';
            $msgid =  isset($_GET['mid']) ? $_GET['mid'] : '';
            //如果未读，变为已读
            if($status == 0)
            {
                $status = 1;
                $sql = "update `" . PIX . "msg` set `status` = {$status} where `id` = {$msgid}";
                //echo $sql;
                $affectrow = execu($sql);
                if($affectrow != 1)
                {
                    echo '更改消息状态失败！';exit;
                }
            }

            //跳转到读信页面
            header('location:./readmsg.php?mid='.$msgid);exit;
            break;
    }
