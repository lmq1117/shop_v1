<?php
    header("content-type:text/html;charset=utf-8");
    require './config.php';
    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die('数据库连接错误：错误号'.mysqli_connect_errno().'错误信息：'.mysqli_connect_error());
    mysqli_set_charset($link,'utf8');
    $sql = "select `id`,`name`,`topic`,`content` from `shop_liuyan` where `id` = {$_GET['id']}";
    //echo $sql;
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);


?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modify</title>
        <style>
            div {
                width:350px;
                text-align:left;
            }
        </style>
    </head>
    <body>

        <center>
            <div>
                <form action="./action.php?act=modify" method="post">
                昵称：<input type="text" name="name" value="<?= $row['name']?>" readonly><font color="red">昵称不能修改</font><br>
                主题：<input type="text" name="topic" value="<?= $row['topic']?>"><br>
                留言：<input type="text" name="content" value="<?= $row['content']?>"><br>
                    <input type="hidden" name="id" value="<?= $row['id']?>"><br>
                    <input type="submit" value="确认修改"><br>
                </form>
            </div>
        </center>
    </body>
</html>
