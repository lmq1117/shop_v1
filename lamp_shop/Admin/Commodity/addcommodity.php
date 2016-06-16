<?php
include '../init.php';
if(empty($_SESSION['userInfoAdmin']))
{
    header('location:../login.php');exit;
}

//查询出分类信息，遍历显示到这里
$sql = "select * from `" . PIX . "category` order by concat(`path`,`id`)";
$categoryList = query($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>添加商品</title>

    <script type="text/javascript" src="../Public/js/jquery.js"></script>

    <link rel="stylesheet" href="../Public/css/add.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../Public/css/bootstrap.css" type="text/css" media="screen">

</head>
<body>
<div class="div_from_aoto" style="width: 500px; margin-left:100px;">
    <h2>添加商品</h2>
    <form action="./action.php?handler=addcommodity" method="post" enctype="multipart/form-data">

        <div class="control-group">
            <label class="laber_from">商品分类</label>
            <div class="controls">
                <select name="cateid" class="input_select">

                    <option value="0">--请选择--</option>
                    <?php
                        foreach($categoryList as $key=>$val)
                        {
                            $disabled = '';
                            if($val['pid'] == 0)
                            {
                                $disabled = 'disabled';
                            }
                            $num = substr_count($val['path'],',');//计算逗号在path中出现了几次
                            $preStr = str_repeat("|--",$num-1);
                            echo "<option value='{$val['id']}'".$disabled.">{$preStr}{$val['name']}</option>";
                        }
                    ?>

                </select>
            </div>
        </div>


        <div class="control-group">
            <label class="laber_from">商品名称：</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入商品名称" type="text" name="name"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">商品图片：</label>
            <div class="controls"><input class="input_from" type="file" name="picture"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">价格：</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入商品价格" type="text" name="price"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">库存：</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入商品库存" type="text" name="store"><p class="help-block"></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">描述：</label>
            <div class="controls">
                <textarea rows="4" cols="50" name="describe"></textarea>
                <p class="help-block"></p>
            </div>
        </div>



        <div class="control-group">
            <label class="laber_from">上下架：</label>
            <div class="controls">
                下架：<input type="radio" name="display" value="0" style="width:50px;">
                上架：<input type="radio" name="display" value="1" checked style="width:50px;">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="laber_from">促销状态</label>
            <div class="controls">
                <select name="status" class="input_select">
                    <option selected="selected" value="3">新品</option>
                    <option value="2">热销</option>
                    <option value="1">猜你喜欢</option>
                </select>
            </div>
        </div>


        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
        </div>
    </form>
</div>

</body>
</html>
