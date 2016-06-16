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

    //分页总条数
    //$sql = "select * from `". PIX ."orders`";
    $sql = "select o.id as oid,u.name as uname,o.linkman as lxr,o.address as dz,o.code as yb,o.phone as dh,o.addtime as sj,o.total as je,o.status as ddzt from`" . PIX . "users` as u,`" . PIX . "orders` as o where o.uid = u.id and o.status <> 4";
    // echo $sql;exit;
    $result = query($sql,true);
    $total = $result['total'];
    //每页显示几条
    $prePage = 5;

    //实例化分页类
    $page = new Page($total,$prePage);



    //准备sql
    //$sql = "select * from `". PIX ."orders` {$page->limit}";
    $sql = "select o.id as oid,u.name as uname,o.linkman as lxr,o.address as dz,o.code as yb,o.phone as dh,o.addtime as sj,o.total as je,o.status as ddzt from`" . PIX . "users` as u,`" . PIX . "orders` as o where o.uid = u.id and o.status <> 4 {$page->limit}";
    $orderlist = query($sql);
    
    //准备遍历需要的数组
    $ddzt = array('新订单','已发货','已收货','地址单');
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
                <th>订单号</th>
                <th>用户名</th>
                <th>联系人</th>
                <th>地址</th>
                <th>邮编</th>
                <th>电话</th>
                <th>订单创建时间</th>
                <th>总金额</th>
                <th>订单状态</th>
                <th>操作</th>
            </tr>
            
            <!--遍历-->
            <?php foreach($orderlist as $key => $val): ?>
                <tr>
                    <td><?= $val['oid']?></td>
                    <td><?= $val['uname']?></td>
                    <td><?= $val['lxr']?></td>
                    <td><?= $val['dz']?></td>
                    <td><?= $val['yb']?></td>
                    <td><?= $val['dh']?></td>
                    <td><?= date('Y-m-d H:i:s',$val['sj'])?></td>
                    <td><?= $val['je']?></td>
                    <td><?= $ddzt[ $val['ddzt'] ]?></td>
        
                    <td>
                        <a href="./orderdetail.php?oid=<?= $val['oid']?>">详情</a>
                        <?php if($val['ddzt'] < 3):?>
                            / <a href="./editorderstatus.php?oid=<?= $val['oid']?>&status=<?= $val['ddzt']?>">修改</a>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="10" align="left">
                    <?php
                        echo $page->config();
                    ?>
                </td>
            </tr>
         
        </table>
    </body>
</html>
