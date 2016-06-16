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
    <form action=./action.php?handler=login method="post">
        <div class="control-group">
            <label class="laber_from">用户名</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入用户名" type="text" name="username"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="password" name="password"><p class="help-block"></p></div>
        </div>

            <div class="control-group">
                <label class="laber_from">验证码：</label>
                <div class="controls"><input name="yzm" class="input_from" placeholder="验证码" type="text" style="width:50px;"> <img style="margin:0,0,3px,5px;" src="../Common/yzm.php" onclick="this.src='../Common/yzm.php?rand='+Math.random()"/><p class="help-block"></p></div>
            </div>


        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
        </div>
    </form>
</div>

</body></html>
