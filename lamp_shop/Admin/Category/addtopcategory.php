<?php
    session_start();
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加顶级分类</title>

<script type="text/javascript" src="../Public/js/jquery.js"></script>

<link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
    <div class="div_from_aoto" style="width: 500px; margin-left:100px;">
        <h2>添加顶级分类</h2>
        <form action="./action.php?handler=addtopcategory" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <label class="laber_from">分类名称：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入分类名称" type="text" name="catename"><p class="help-block"></p></div>
                <input type="hidden" name="pid" value="0" />
                <input type="hidden" name="path" value="0," />
            </div>

            <div class="control-group">
                <label class="laber_from"></label>
                <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
            </div>
        </form>
    </div>

    </body>
</html>
