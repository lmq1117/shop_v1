<?php
    require './init.php';
    //开启session
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:./login.php');exit;
    }
    $grade = array('超级管理员','管理员');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Bootstrap后台模板</title>

        <link rel="stylesheet" href="./Public/css/index.css" type="text/css" media="screen">

        <script type="text/javascript" src="./Public/js/jquery.js"></script>
        <script type="text/javascript" src="./Public/js/tendina.js"></script>
        <script type="text/javascript" src="./Public/js/common.js"></script>
    </head>
<body>
    <!--顶部开始-->
    <div class="layout_top_header">
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">XXXX管理后台</span></div>
            <div id="ad_setting" class="ad_setting">
                <a style="width:200px;margin-left:-55px;" class="ad_setting_a" href="javascript:;">
                    <i class="icon-user glyph-icon" style="font-size: 20px"></i>
                    <span><?= $grade[ $_SESSION['userInfoAdmin']['grade'] ] . ' : ' . $_SESSION['userInfoAdmin']['name']?></span>
                    <i class="icon-chevron-down glyph-icon"></i>
                </a>
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    <li class="ad_setting_ul_li"> <a href="./action.php?handler=logout"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
                </ul>
            </div>
    </div>
    <!--顶部结束-->
    <!--菜单-->
    <div class="layout_left_menu">
        <ul class="tendina" id="menu">
            <li class="childUlLi">
                <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>会员管理</a>
                <ul style="display: none;">
                    <li><a href="./user/userlist.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>显示会员</a></li>
                    <li><a href="./user/useradd.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加会员</a></li>
                </ul>
            </li>
            <li class="childUlLi">
                <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>商品管理</a>
                <ul style="display: none;">
                    <li><a href="./Commodity/showcommodity.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>商品列表</a></li>
                    <li><a href="./Commodity/addcommodity.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加商品</a></li>
                </ul>
            </li>
            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon icon-reorder"></i>分类管理</a>
                <ul style="display: none;">
                    <li><a href="./Category/addtopcategory.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加顶级分类</a></li>
                    <li><a href="./Category/showcategory.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>分类列表</a></li>
                </ul>
            </li>

            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon  icon-location-arrow"></i>订单管理</a>
                <ul style="display: none;">
                    <li><a href="./Order/orderlist.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>订单列表</a></li>
                </ul>
            </li>

            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon icon-reorder"></i>系统管理</a>
                <ul style="display: none;">
                    <li><a href="./Flinks/flinklist.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>友情链接列表</a></li>
                    <li><a href="./Flinks/addflink.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加友情链接</a></li>
                    <li><a href="./lybdb/admin.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>留言管理</a></li>
                </ul>
            </li>

            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon icon-reorder"></i>站内信</a>
                <ul style="display: none;">
                    <li><a href="./Sms/receive.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>
                        <?php 
                            //查询出是否有新站内信，给站内信一点点样式
                            $sql = "select m.`id` as mid,`name`,`title`,m.`status` as stat from `" . PIX . "msg` as m inner join `". PIX ."users` as u on `receid` = {$_SESSION['userInfoAdmin']['id']} and m.status < 1 and senderid = u.id order by `stat` asc,m.`id` desc";
                            $msgs = query($sql);
                            
                        ?>
                        <?php if(!empty($msgs)): ?>
                        <b style="color:black;">收件箱</b>
                        <?php else: ?>
                        收件箱
                        <?php endif; ?>
                        </a>
                    </li>
                    <li><a href="./Sms/newmsg.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>写信</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
    <!--菜单开始-->
    <div id="layout_right_content" class="layout_right_content">
        <!--<div class="route_bg">
            <a href="#">主页</a><i class="glyph-icon icon-chevron-right"></i>
            <a href="#">会员管理</a><i class="glyph-icon icon-chevron-right"></i>
            
        </div>-->
    <!--菜单结束-->
        <!--主题部分开始-->
        <div class="mian_content">
            <div id="page_content">
                <iframe id="menuFrame" name="menuFrame" src="./lybdb/index.php" style="overflow:visible;" scrolling="yes" frameborder="no" height="100%" width="100%"></iframe>
            </div>
        </div>
        <!--主题部分结束-->
    </div>

    <div class="layout_footer">
        <p>Copyright © 2014 - XXXX科技</p>
    </div>
</body></html>
