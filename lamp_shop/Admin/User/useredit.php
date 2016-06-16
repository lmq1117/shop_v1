<?php
    //包含初始化文件
    require '../init.php';
    //验证是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }
    //接收传过来的$id
    $id = empty($_GET['uid']) ? '' : $_GET['uid'];
    //var_dump($id);
    $sql = "select `id`,`name`,`pass`,`sex`,`tel`,`email`,`icon`,`grade`,`status`,`addtime` from `" . PIX . "users` where id = " . $id;
    $val = query($sql)[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>后台模板</title>
        <script type="text/javascript" src="../Public/js/jquery.js"></script>
        <link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">
    </head>
    <body>
        <div class="div_from_aoto" style="width: 500px;">
        <form action="./action.php?handler=doedituser&uid=<?= $id?>" method="post" enctype="multipart/form-data">

                <div class="control-group">
                    <label class="laber_from">用户名</label>
                    <div class="controls"><input class="input_from" placeholder=" 请输入用户名" type="text" name="username" value="<?= $val['name'];?>"><p class="help-block"></p></div>
                </div>

                <div class="control-group">
                    <label class="laber_from">头像</label>
                    <div class="controls">
                        <input class="input_from"  type="file" name="myfile"><img style="width:50px;height:50px;margin-top:-40px;margin-left:255px;" src="../../Common/Public/images/user/header/<?= $val['icon'];?>" />
                        <input type="hidden" name="icon" value="<?= $val['icon'];?>" />
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="laber_from">密码</label>
                    <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text" name="pass"><p class="help-block"></p></div>
                </div>

                <div class="control-group">
                    <label class="laber_from">确认密码</label>
                    <div class="controls"><input class="input_from" placeholder=" 请输入确认密码" type="text" name="repass"><p class="help-block"></p></div>
                </div>

                <div class="control-group">
                    <label class="laber_from">性别</label>
                    <div class="controls">
                        <select name="sex" class="input_select">
                        <option value="0" <?= $val['sex'] == 0 ? 'selected' : '';?>>女</option>
                        <option value="1" <?= $val['sex'] == 1 ? 'selected' : '';?>>男</option>
                        <option value="2" <?= $val['sex'] == 2 ? 'selected' : '';?>>保密</option>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="laber_from">状态</label>
                    <div class="controls">
                        <select name="status" class="input_select">
                            <option value="0" <?= $val['status'] == 0 ? 'selected' : '';?>>禁用</option>
                            <option value="1" <?= $val['status'] == 1 ? 'selected' : '';?>>启用</option>

                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="laber_from">手机号</label>
                    <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text" name="tel" value="<?= $val['tel'];?>"><p class="help-block"></p></div>
                </div>

                <div class="control-group">
                    <label class="laber_from">邮箱</label>
                    <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text" name="email" value="<?= $val['email'];?>"><p class="help-block"></p></div>
                </div>

                <div class="control-group">
                    <label class="laber_from">会员类型</label>
                    <div class="controls">
                        <select name="grade" class="input_select">
                            <option value="1" <?= $val['grade'] == 1 ? 'selected' : '';?>>管理员</option>
                            <option value="2" <?= $val['grade'] == 2 ? 'selected' : '';?>>VIP会员</option>
                            <option value="3" <?= $val['grade'] == 3 ? 'selected' : '';?>>普通会员</option>
                        </select>
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
