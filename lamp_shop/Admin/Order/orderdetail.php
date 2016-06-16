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
    $oid = isset($_GET['oid']) ? $_GET['oid'] : 0 ;
    if($oid == 0)
    {
        header('location:./orderlist.php');exit;
    }

    //分页总条数
    //$sql = "select * from `". PIX ."orders`";
    $sql = "select * from `" . PIX . "detail` where `oid` = {$oid}";
    // echo $sql;exit;
    $result = query($sql,true);
    $total = $result['total'];
    //每页显示几条
    $prePage = 5;

    //实例化分页类
    $page = new Page($total,$prePage);



    //准备sql
    $sql = "select * from `" . PIX . "detail` where `oid` = {$oid} {$page->limit}";
    $detailInfo = query($sql);
    
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
                <th>订单号</th>
                <th>商品ID</th>
                <th>商品名</th>
                <th>单价</th>
                <th>数量</th>
            </tr>
            
            <!--遍历-->
            <?php foreach($detailInfo as $key => $val): ?>
                <tr>
                    <td><?= $val['id']?></td>
                    <td><?= $val['oid']?></td>
                    <td><?= $val['cid']?></td>
                    <td><?= $val['name']?></td>
                    <td><?= $val['price']?></td>
                    <td><?= $val['num']?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6" align="left">
                    <?php
                        echo $page->config();
                    ?>
                </td>
            </tr>
         
        </table>
    </body>
</html>
