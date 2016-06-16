<?php
    header("content-type:text/html;charset=utf-8");
    /*$contents = array(
        array('name'=>'admin','time'=>1459607494,'topic'=>'php','content'=>"xiaoQ的第一个留言板，欢迎大家来灌水啦！"),
        array('name'=>'admin','time'=>1459607494,'topic'=>'php','content'=>"xiaoQ的第一个留言板，欢迎大家来灌水啦！")
    );*/
    session_start();
    //显示留言
    require './config.php';
    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die('数据库连接错误：错误号'.mysqli_connect_errno().'错误信息：'.mysqli_connect_error());
    mysqli_set_charset($link,'utf8');
    $sql = "select `id`,`name`,`topic`,`content`,`addtime` from `shop_liuyan` order by `addtime` desc limit 10";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $contents[] = $row;
    }
    




    //array_multisort($contents);
    //按时间降序 已经在sql中按时间排序了 所以这里不用重新排了
    /*foreach($contents as $key=>$val)
    {
        $times[$key] = $val['time'];
    }
    array_multisort($times,SORT_DESC,$contents);
    */
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>xiaoq留言板基于文件</title>
        <style>
            .container{
                margin:0 auto;
                padding:0;
                width:1000px;
                
            }
            .left{
                width:200px;
                float:left;
                line-height:30px;
            }
            .right{
                width:690px;
                float:right;
                border:1px solid #fc1;
                margin-top:5px;
            }
            .r_top span{
                margin-left:10px;
            }
            .r_content p{
                text-indent:2em;
            }
            h4{ 
                display:inline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!--留言发表区域开始-->
            <div class="left">
                <form action="add.php" method="post">
                    昵&nbsp;&nbsp;称：<input type="text" name="name" value="<?= $_SESSION['userInfoAdmin']['name']?>" readonly /><br />
                    主&nbsp;&nbsp;题：<input type="text" name="topic" /><br />
                    留言内容：<input type="text" name="content" /><br />
                    <input type="submit" value="发表留言" />
                </form>
            </div>
            <!--留言发表区域结束-->
            <!--留言显示区域开始-->
            <!--
            <div class="right">
                <div class="r_top">
                    <span>网友：admin</span><span>留言时间：2016-04-02</span>
                </div>
                <div class="r_content">
                    <h4>留言内容：</h4>
                    <p>xiaoQ的第一个留言板，欢迎大家来灌水啦！</p>
                </div>
            </div>
            -->
            <?php foreach($contents as $key => $val):?>
                <div class="right">
                    <div class="r_top">
                        主题：<h4><?= $val['topic'];?></h4>
                        <span>网友：<?= $val['name'];?></span><span>留言时间：<?= date('Y-m-d H:i:s',$val['addtime']);?></span>
                    </div>
                    <div class="r_content">
                        <p><?= $val['content'];?></p>
                    </div>
                </div>
            <?php endforeach;?>
            <!--留言显示区域结束-->
        </div>
    </body>
</html>
