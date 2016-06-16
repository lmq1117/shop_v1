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
<title>后台模板</title>

<script type="text/javascript" src="../Public/js/jquery.js"></script>

<link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
    <div class="div_from_aoto" style="width: 500px; margin-left:100px;">
        <form action="./action.php?handler=doadduser" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <label class="laber_from">用户名：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入用户名" type="text" name="name"><p class="help-block"></p></div>
            </div>
            <div class="control-group">
                <label class="laber_from">密 码：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text" name="pass"><p class="help-block"></p></div>
            </div>

            <div class="control-group">
                <label class="laber_from">性 别：</label>
                <div class="controls">
                    女：<input type="radio" name="sex" value="0" checked style="width:50px;">
                    男：<input type="radio" name="sex" value="1" style="width:50px;">
                    保密：<input type="radio" name="sex" value="2" style="width:50px;">
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="laber_from">电 话：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入11位手机号码" type="text" name="tel"><p class="help-block"></p></div>
            </div>
            <div class="control-group">
                <label class="laber_from">邮 箱：</label>
                <div class="controls"><input class="input_from" placeholder=" 请输入电子邮箱" type="text" name="email"><p class="help-block"></p></div>
            </div>

            <div class="control-group">
                <label class="laber_from">会员级别</label>
                <div class="controls">
                    <select name="grade" class="input_select">
                        <option value="2">VIP会员</option>
                        <option selected="selected" value="3">普通会员</option>
                        <option value="1">管理员</option>
                        <option value="0">超级管理员</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="laber_from" style="margin-bottom:0;">状 态：</label>
                <div class="controls">
                    启用：<input type="radio" name="status" value="0" checked style="width:50px;">
                    禁用：<input type="radio" name="status" value="1" style="width:50px;">
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="laber_from">头 像：</label>
                <div class="controls"><input class="input_from"  type="file" name="myfile"><p class="help-block"></p></div>
            </div>



            <div class="control-group">
                <label class="laber_from">验证码：</label>
                <div class="controls"><input name="yzm" class="input_from"" type="text" style="width:50px;"> <img style="margin:0,0,3px,5px;" src="../../Common/yzm.php" onclick="this.src='../../Common/yzm.php?rand='+Math.random()"/><p class="help-block"></p></div>
            </div>

            <div class="control-group">
                <label class="laber_from"></label>
                <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
            </div>
        </form>
    </div>

    </body>
</html>
