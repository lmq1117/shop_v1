<?php
    //包含初始化文件
    require '../init.php';
    //验证是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }
    //接收传过来的$id
    $id = empty($_GET['cid']) ? '' : $_GET['cid'];
    //var_dump($id);
    $sql = "select `id`,`pid`,`name`,`path`,`addtime` from `" . PIX . "category` where `id` = " . $id;
//    echo $sql;exit;
    $val = query($sql)[0];
//echo '<pre>';
//print_r($val);
//echo '</pre>';exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>分类修改</title>
        <script type="text/javascript" src="../Public/js/jquery.js"></script>
        <link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">
    </head>
    <body>
        <div class="div_from_aoto" style="width: 500px;">
            <h2>修改商品分类</h2>
            <form action="./action.php?handler=editcategory&cid=<?= $id?>" method="post" enctype="multipart/form-data">

                <div class="control-group">
                    <label class="laber_from">分类名称</label>
                    <div class="controls"><input class="input_from" placeholder="请输入新分类名称" type="text" name="name" value="<?= $val['name'];?>">
                        <input type="hidden" name="pid" value="<?= $val['pid'];?>">
                        <input type="hidden" name="path" value="<?= $val['path'];?>>
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="laber_from"></label>
                    <div class="controls"><button class="btn btn-success" style="width:120px;">确认修改</button></div>
                </div>

            </form>
        </div>

    </body>
</html>
