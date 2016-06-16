<?php
    //导入初始化文件
    require '../init.php';
    require '../../Common/class/page.class.php';
    
    //
        //验证是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }

    //准备sql
    $sql = "select * from `" . PIX . "category` order by concat(`path`,`id`)";

    $result = query($sql,true);

    //$categoryInfo = $result['list'];
    //总条数
    $total = $result['total'];
    //每页显示5个
    $num = 5;
    //分页处理
    $page = new Page($total,$num,'dd=12&mm=13');
    $sql = "select * from `" . PIX . "category` order by concat(`path`,`id`) {$page->limit}";
    $categoryInfo = query($sql);
    
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
        <h2>分类列表</h2>
        <table border="1" cellspacing="0" cellpadding="5">
            <!--表头数据-->
            <tr>
                <th>ID</th>
                <th>父ID</th>
                <th>分类名</th>
                <th>路径</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            
            <!--遍历-->
            <?php foreach($categoryInfo as $key => $val): ?>
                <tr>
                    <td><?= $val['id']?></td>
                    <td><?= $val['pid']?></td>
                    <td>
                        <?php
                            //substr_count() 计算逗号出现的次数，这个函数更方便
                            $pix='';
                            $l=explode(',',$val['path']);
                            $length = count($l);
                            if($length != 2)
                            {
                                $pix .= str_repeat('|--',$length-2);
                            }
                            echo $pix . $val['name'];
                        ?>
                    </td>
                    <td><?= $val['path']?></td>
                    <td><?= date('Y-m-d H:i:s',$val['addtime'])?></td>
                    <td><a href="editcategory.php?cid=<?= $val['id'];?>">编辑</a>/<a href="./action.php?handler=deletecategory&cid=<?= $val['id'];?>">删除</a>/<a href="./addchildcategory.php?pid=<?= $val['id'];?>">增加子分类</a></td>
                <tr>
            <?php endforeach; ?>
            <!--显示分页-->
            <tr>
                <td colspan="6" align="left"><?php echo $page->config($arr=array(0,1,2,3,4,5,6,7,8));?></td>
            </tr>
         
        </table>
    </body>
</html>
