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
    $sql = "select * from `". PIX ."users`";
    $result = query($sql,true);
    $total = $result['total'];
    //每页显示几条
    $prePage = 5;

    //实例化分页类
    $page = new Page($total,$prePage);



    //准备sql
    $sql = "select * from shop_users {$page->limit}";
    $userlist = query($sql);
    
    //准备遍历需要的数组
    $sex = array('女','男','保密');
    $grade = array('超级管理员','管理员','VIP会员','普通会员');
    //$status = array("禁用","启用");
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
                <th>用户名</th>
                <th>头像</th>
                <th>性别</th>
                <th>电话</th>
                <th>邮箱</th>
                <th>会员级别</th>
                <th>状态</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            
            <!--遍历-->
            <?php foreach($userlist as $key => $val): ?>
                <tr>
                    <td><?= $val['id']?></td>
                    <td><?= $val['name']?></td>
                    <td><?php echo '<img src="../../Common/Public/images/user/header/'.$val['icon'].'" style="width:35px;height:35px;" />';?></td>
                    <td><?= $sex[ $val['sex'] ]?></td>
                    <td><?= $val['tel']?></td>
                    <td><?= $val['email']?></td>
                    <td><?= $grade[ $val['grade'] ]?></td>
                    <?php if($val['grade'] != 0):?>
                        <td><a style="text-decoration:none;" href="./action.php?handler=doeditstatus&uid=<?= $val['id'];?>&stat=<?=  $val['status'];?>"><?= $status[ $val['status'] ];?></a></td>
                    <?php else:?>
                        <td><?= $status[ $val['status'] ];?></td>
                    <?php endif;?>
                    <td><?= date('Y-m-d H:i:s',$val['addtime'])?></td>
                    <?php if($val['grade'] != 0):?>
                    <td><a href="./useredit.php?uid=<?= $val['id'];?>">编辑</a>/<a href="action.php?handler=dodeluser&id=<?= $val['id']?>">删除</a></td>
                    <?php else:?>
                        <td> </td>
                    <?php endif;?>
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
