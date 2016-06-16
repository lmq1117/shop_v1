<?php
    //导入初始化文件
    require '../init.php';
    //导入分页类
    require '../../Common/class/page.class.php';
    //
        //验证是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }


    //准备sql
    $sql = "select * from `" . PIX . "flinks`";
    $flinklist = query($sql);
    
    //准备遍历需要的数组
    $status = array("×","√");
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title></title>
        
    </head>
    <body>
        <table border="1" cellspacing="0" cellpadding="5">
            <!--表头数据-->
            <tr>
                <th>ID</th>
                <th>网站</th>
                <th>网址</th>
                <th>状态</th>

            </tr>
            
            <!--遍历-->
            <?php foreach($flinklist as $key => $val): ?>
                <tr>
                    <td><?= $val['id']?></td>
                    <td><?= $val['name']?></td>
                    <td><?= $val['link']?></td>
                    <td><a style="text-decoration:none;" href="./action.php?handler=changestatus&id=<?= $val['id']?>&stat=<?= $val['status']?>"><?= $status[ $val['status'] ];?></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
