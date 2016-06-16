<?php
    session_start();
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:./login.php');exit;
    }

    //接收url提交过来的订单id和status
    $oid = isset($_GET['oid']) ? $_GET['oid'] : 0;


    $status = isset($_GET['status']) ? $_GET['status'] : 0;
        if($status > 4)
    {
        echo '出大事儿啦';
        exit;
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
    <h2>修改订单状态</h2>
    <form action="./action.php?handler=editorderstatus&oid=<?= $oid?>" method="post">

        <div class="control-group">
            <label class="laber_from">订单状态</label>
            <div class="controls">
                <select class="input_select" name="status">
                    <option <?php echo $status == 0 ? 'selected' : '';?> value="0">新订单</option>
                    <option <?php echo $status == 1 ? 'selected' : '';?> value="1">已发货</option>
                    <option <?php echo $status == 2 ? 'selected' : '';?> value="2">已收货</option>
                    <option <?php echo $status == 3 ? 'selected' : '';?> value="3">无效订单</option>
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
