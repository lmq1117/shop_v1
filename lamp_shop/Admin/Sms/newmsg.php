<?php
    /*
     *  写站内信
     *
     */
    require '../init.php';
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:./login.php');exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>收信</title>

<script type="text/javascript" src="./Public/js/jquery.js"></script>

<link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
<div class="div_from_aoto" style="width: 500px;">
    <h2>发信</h2>
    <form action="./action.php?handler=sendmsg&senderid=<?= $_SESSION['userInfoAdmin']['id']?>" method="post">
        
        <!-- 发给谁  -->
        <?php
            //将用户遍历出来，作为收件人，发件人id从session中取出
            //grade < 2
            $sql = "select id,name from `" . PIX . "users` where `grade` < 2";
            //echo $sql;exit;
            $users = query($sql);
        ?>
        <div class="control-group">
            <label class="laber_from">收件人</label>
            <div class="controls">
                <select name="receiver" class="input_select">
                    <?php if(!empty($users)):?>
                        <?php foreach($users as $val): ?>
                            <?php if($val['id'] != $_SESSION['userInfoAdmin']['id']): ?>
                            <option value="<?= $val['id']?>"><?= $val['name']?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif;?>
                </select>
            </div>
        </div>
        



        <div class="control-group">
            <label class="laber_from">主题</label>
            <div class="controls"><input class="input_from" placeholder="主题" type="text" name="title"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">正文</label>
            <div class="controls"><input class="input_from" placeholder="正文" type="text" name="content"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">发送消息</button></div>
        </div>
    </form>
</div>

</body></html>

