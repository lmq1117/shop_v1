<?php
    session_start();
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:./login.php');exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台模板</title>

<script type="text/javascript" src="./Public/js/jquery.js"></script>

<link rel="stylesheet" href="./Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="./Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
<div class="div_from_aoto" style="width: 500px;">
    <h2>这里是用户框架集主页</h2>
    <form>
        <div class="control-group">
            <label class="laber_from">用户名</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入用户名" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">确认密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入确认密码" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">角色</label>
            <div class="controls">
                <select class="input_select">
                    <option selected="selected">董事长</option>
                    <option>总经理</option>
                    <option>经理</option>
                    <option>主管</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
        </div>
    </form>
</div>

</body></html>
