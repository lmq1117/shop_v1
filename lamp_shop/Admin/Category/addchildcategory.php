<?php
    //包含初始化文件
    require '../init.php';
    //验证用户是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }
    //接收get传过来的pid
    $pid = $_GET['pid'];
    //查询分类id是$pid的分类信息
    $sql = "select * from `" . PIX . "category` where `id` = {$pid}";
    $parentCategoryInfo = query($sql)[0];
//    echo "<pre>";
//        print_r($parentCategoryInfo);
//    echo "</pre>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台模板</title>

<script type="text/javascript" src="../Public/js/jquery.js"></script>

<link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
    <h2>添加子分类</h2>
    <div class="div_from_aoto" style="width: 500px; margin-left:100px;">
    <form action="./action.php?handler=addchildcategory&pid=<?= $parentCategoryInfo['id'];?>" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <label class="laber_from">父分类名：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入用户名" type="text" name="parentcategoryname" value="<?= $parentCategoryInfo['name'];?>">
                    <input type="hidden" name="path" value="<?= $parentCategoryInfo['path'];?>"/>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="laber_from">子分类名：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text" name="categoryname"><p class="help-block"></p></div>
            </div>

            <div class="control-group">
                <label class="laber_from"></label>
                <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
            </div>
        </form>
    </div>

    </body>
</html>
