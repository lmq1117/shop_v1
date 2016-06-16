<?php
    header("content-type:text/html;charset=utf-8");
    require './config.php';
    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die('数据库连接错误：错误号'.mysqli_connect_errno().'错误信息：'.mysqli_connect_error());
    mysqli_set_charset($link,'utf8');
    $sql = "select `id`,`name`,`topic`,`content`,`addtime` from `shop_liuyan` order by `addtime` desc limit 10";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $contents[] = $row;
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <style>
            table{
                border:1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <center><h2>留言板后台</h2></center>
        <table cellspacing="0" cellpadding="0" border="1">
            <tr>
                <th>ID</th>
                <th>网友</th>
                <th>话题</th>
                <th>留言</th>
                <th>留言时间</th>
                <th>修改</th>
                <th>删除</th>
                <th>添加</th>
            </tr>
            <?php foreach($contents as $key => $val):?>
                <tr>
                    <td><?= $val['id']?></td>
                    <td><?= $val['name']?></td>
                    <td><?= $val['topic']?></td>
                    <td><?= $val['content']?></td>
                    <td><?= date("Y-m-d H:i:s",$val['addtime'])?></td>
                    <td><?php echo '<a href="./action.php?id='.$val['id'].'&act=modify">修改</a>' ?></td>
                    <td><?php echo '<a href="./action.php?id='.$val['id'].'&act=del">删除</a>' ?></td>
                    <td><?php echo '<a href="./action.php?act=add">添加</a>' ?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>
