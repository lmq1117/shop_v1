<?php 
    require 'init.php';
?>
<!DOCTYPE html>
<html xml:lang="zh-CN" lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<title>个人中心</title>
<meta name="viewport" content="width=1226">
<meta name="description" content="">
<meta name="keywords" content="小米手机,小米手机官网">
<link rel="stylesheet" href="../Common/Public/person/base.css">
<link rel="stylesheet" type="text/css" href="../Common/Public/person/main.css">
</head>
<body>
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d8d76cec44d9d69a', '//www#/index.html', 'pcpid']);" data-stat-id="d8d76cec44d9d69a" href="http://www#/index.html">小米网</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-984415c52166fcfe', 'http://www.miui.com/', 'pcpid']);" data-stat-id="984415c52166fcfe" href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e410441a5e1ca6be', 'http://www.miliao.com/', 'pcpid']);" data-stat-id="e410441a5e1ca6be" href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-64da11583a8f5aa4', 'http://game.xiaomi.com/', 'pcpid']);" data-stat-id="64da11583a8f5aa4" href="http://game.xiaomi.com/" target="_blank">游戏</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5b2b825f6e9aefc2', 'http://www.duokan.com/', 'pcpid']);" data-stat-id="5b2b825f6e9aefc2" href="http://www.duokan.com/" target="_blank">多看阅读</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5486ff78dab46903', 'https://i#/', 'pcpid']);" data-stat-id="5486ff78dab46903" href="https://i#/" target="_blank">云服务</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2b5f5ebe7d9ad289', '//www#/c/appdownload/', 'pcpid']);" data-stat-id="2b5f5ebe7d9ad289" href="http://www#/c/appdownload/" target="_blank">小米网移动版</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-690537f5005b8ead', '//static#/feedback/', 'pcpid']);" data-stat-id="690537f5005b8ead" href="http://static#/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-37f0c0ecc5cd1c51', '#J_modal-globalSites', 'pcpid']);" data-stat-id="37f0c0ecc5cd1c51" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
        </div>
        <div class="topbar-cart topbar-cart-filled" id="J_miniCartTrigger">
            <a data-stat-id="d13b157354053f95" class="cart-mini" id="J_miniCartBtn" href="./card.php"><i class="iconfont"></i>购物车<span class="cart-mini-num J_cartNum">（1）</span></a>
            <div class="cart-menu" id="J_miniCartMenu">
                <div class="loading"><div class="loader"></div></div>
            </div>
        </div>
        
   		<!--登录后这里会变化 -->
        <div class="topbar-info" id="J_userInfo">
            <?php if(empty($_SESSION['userInfo'])): ?>
            <a href="./login.php" data-stat-id="bf3aa4c80c0ac789" class="link" data-needlogin="true">登录</a><span class="sep">|</span><a  data-stat-id="749b1369201c13fb" class="link" href="./register.php">注册</a>        
            <?php else: ?>
                 <a  data-stat-id="749b1369201c13fb" class="link" href="./person.php">个人中心</a>|</span><a  data-stat-id="749b1369201c13fb" class="link" href="./action.php?handler=logout">退出</a><span class="sep"> | </span>&nbsp;&nbsp;<?= $_SESSION['userInfo']['name'];?> 
            <?php endif;?>

		</div>
    </div>
</div>

<div class="site-header">
    <div class="container">
        <div class="header-logo">
            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f4006c1551f77f22', '//www#/index.html', 'pcpid']);" data-stat-id="f4006c1551f77f22" class="logo ir" href="http://www#/index.html" title="小米官网">小米官网</a>
                    </div>
        <div class="header-nav">
            <ul class="nav-list J_navMainList clearfix">
                <li id="J_navCategory" class="nav-category">
                    <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d7d79a744cdeefa8', '//list#', 'pcpid']);" data-stat-id="d7d79a744cdeefa8" class="link-category" href="http://list#/"><span class="text">全部商品分类</span></a>
                <div class="site-category"> <ul id="J_categoryList" class="site-category-list clearfix">  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0d41105a57b667b5', '//www#/buyphone/', 'pcpid']);" data-stat-id="0d41105a57b667b5" class="title" href="http://www#/buyphone/">手机 平板 电话卡<i class="iconfont"></i></a> <div class="children clearfix children-col-3"><ul class="children-list children-list-col children-list-col-1"><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dcbd42ece248cddf', '//www#/mi5/', 'pcpid']);" data-stat-id="dcbd42ece248cddf" class="link" href="http://www#/mi5/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/list/mi5bar80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/list/mi5bar80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米手机5</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-79cf129bec5862f2', '//item#/buyphone/mi5', 'pcpid']);" data-stat-id="79cf129bec5862f2" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/mi5">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5dfda40e5c4f0e05', '//www#/mi4s/', 'pcpid']);" data-stat-id="5dfda40e5c4f0e05" class="link" href="http://www#/mi4s/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/list/4sbar80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/list/4sbar80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米手机4S</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e102425e9f0e3717', '//item#/buyphone/mi4s', 'pcpid']);" data-stat-id="e102425e9f0e3717" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/mi4s">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9eef615d600b584c', '//www#/minote/', 'pcpid']);" data-stat-id="9eef615d600b584c" class="link" href="http://www#/minote/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/minote.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/minote.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米Note</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a64a233971329c7e', '//item#/buyphone/minote', 'pcpid']);" data-stat-id="a64a233971329c7e" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/minote">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-74fe4077713c7d09', '//www#/mi4/', 'pcpid']);" data-stat-id="74fe4077713c7d09" class="link" href="http://www#/mi4/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/mi4.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/mi4.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米手机4</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cc21bc5ba30bd604', '//item#/buyphone/mi4', 'pcpid']);" data-stat-id="cc21bc5ba30bd604" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/mi4">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9069ab7fc379eba6', '//www#/mi4c/', 'pcpid']);" data-stat-id="9069ab7fc379eba6" class="link" href="http://www#/mi4c/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/mi4c.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/mi4c.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米手机4c</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-92756b04d5d0a3c0', '//item#/buyphone/mi4c', 'pcpid']);" data-stat-id="92756b04d5d0a3c0" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/mi4c">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-3c045da68592987f', '//www#/note3/', 'pcpid']);" data-stat-id="3c045da68592987f" class="link" href="http://www#/note3/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/note3.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/note3.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">红米Note 3</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b429eb33ed6afe96', '//item#/buyphone/note3', 'pcpid']);" data-stat-id="b429eb33ed6afe96" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/note3">选购</a> </li></ul><ul class="children-list children-list-col children-list-col-2"><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9a57070d28306917', '//www#/note4gds/', 'pcpid']);" data-stat-id="9a57070d28306917" class="link" href="http://www#/note4gds/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/note.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/note.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">红米Note 电信版</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-144167ad25db254d', '//item#/buyphone/note', 'pcpid']);" data-stat-id="144167ad25db254d" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/note">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0f93dd5aa23364e7', '//www#/hongmi3/', 'pcpid']);" data-stat-id="0f93dd5aa23364e7" class="link" href="http://www#/hongmi3/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/hongmi3.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/hongmi3.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">红米手机3</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0ccdd2a1e84042c1', '//item#/buyphone/hongmi3/', 'pcpid']);" data-stat-id="0ccdd2a1e84042c1" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/hongmi3/">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-97eff9f331f53366', '//www#/hongmi2/', 'pcpid']);" data-stat-id="97eff9f331f53366" class="link" href="http://www#/hongmi2/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/hongmi2.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/hongmi2.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">红米手机2</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ae25d8301c4d2416', '//item#/buyphone/hongmi2', 'pcpid']);" data-stat-id="ae25d8301c4d2416" class="btn btn-line-primary btn-small btn-buy" href="http://item#/buyphone/hongmi2">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-38838d81c02180b7', '//www#/mipad2/', 'pcpid']);" data-stat-id="38838d81c02180b7" class="link" href="http://www#/mipad2/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/pad2.png?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/pad2.png?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米平板2</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e42f5f61b2a30349', '//item#/static/buymipad', 'pcpid']);" data-stat-id="e42f5f61b2a30349" class="btn btn-line-primary btn-small btn-buy" href="http://item#/static/buymipad">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f3f8a5da72ab3747', '//www#/buyphone/telcom/', 'pcpid']);" data-stat-id="f3f8a5da72ab3747" class="link" href="http://www#/buyphone/telcom/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/telcom.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/telcom.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">电信版</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-847a56534159462f', '//www#/buyphone/telcom/', 'pcpid']);" data-stat-id="847a56534159462f" class="btn btn-line-primary btn-small btn-buy" href="http://www#/buyphone/telcom/">选购</a> </li><li class="star-goods"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-3d4b83339977188f', '//heyue#/', 'pcpid']);" data-stat-id="3d4b83339977188f" class="link" href="http://heyue#/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/heyue.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/heyue.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">合约机</span></a> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-35bfdbc0439ac44b', '//heyue#/', 'pcpid']);" data-stat-id="35bfdbc0439ac44b" class="btn btn-line-primary btn-small btn-buy" href="http://heyue#/">选购</a> </li></ul><ul class="children-list children-list-col children-list-col-3"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9767420eef727750', '//www#/zxxyk/', 'pcpid']);" data-stat-id="9767420eef727750" class="link" href="http://www#/zxxyk/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/zhongxin.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/zhongxin.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">中信特权</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e9ff411b247edc0c', '//www#/compare/', 'pcpid']);" data-stat-id="e9ff411b247edc0c" class="link" href="http://www#/compare/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/compare.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/compare.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">对比手机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9f6c18e55ea306ad', '//www#/mimobile/', 'pcpid']);" data-stat-id="9f6c18e55ea306ad" class="link" href="http://www#/mimobile/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/mimobile.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/mimobile.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米移动 电话卡</span></a>  </li></ul></div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6f890a25c91eccd1', '//www#/buytv/', 'pcpid']);" data-stat-id="6f890a25c91eccd1" class="title" href="http://www#/buytv/">电视 盒子<i class="iconfont"></i></a> <div class="children clearfix children-col-3"><ul class="children-list children-list-col children-list-col-1"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-974b6ebbf1f1fc99', '//www#/mitv3s/43/', 'pcpid']);" data-stat-id="974b6ebbf1f1fc99" class="link" href="http://www#/mitv3s/43/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/4380side.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/4380side.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视 43英寸</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-218e4b13578aae01', '//www#/mitv3s/48/', 'pcpid']);" data-stat-id="218e4b13578aae01" class="link" href="http://www#/mitv3s/48/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/mitv3s48.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/mitv3s48.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视 48英寸</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6d1e5f4e7a31da93', '//www#/mitv3/55/', 'pcpid']);" data-stat-id="6d1e5f4e7a31da93" class="link" href="http://www#/mitv3/55/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/tv3-55.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/tv3-55.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视 55英寸</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e20190e43bee41c4', '//www#/mitv3/', 'pcpid']);" data-stat-id="e20190e43bee41c4" class="link" href="http://www#/mitv3/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/tv60.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/tv60.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视 60英寸</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6ab6b9f93e7b7ebc', '//www#/mitv3s/65/', 'pcpid']);" data-stat-id="6ab6b9f93e7b7ebc" class="link" href="http://www#/mitv3s/65/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/6580side.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/6580side.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视 65英寸</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-31363c03cd9308f4', '//www#/mitv3/70/', 'pcpid']);" data-stat-id="31363c03cd9308f4" class="link" href="http://www#/mitv3/70/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/tv70.png?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/tv70.png?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视 70英寸</span></a>  </li></ul><ul class="children-list children-list-col children-list-col-2"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-133e21b3f4468301', '//www#/tvzj/', 'pcpid']);" data-stat-id="133e21b3f4468301" class="link" href="http://www#/tvzj/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/tvzj.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/tvzj.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米电视主机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-604ce9aff73c1b13', '//www#/hezi3s/', 'pcpid']);" data-stat-id="604ce9aff73c1b13" class="link" href="http://www#/hezi3s/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/hezizengqiangban80side.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/hezizengqiangban80side.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米盒子3 增强版</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-34e1daa0891c4d91', '//www#/hezi3/', 'pcpid']);" data-stat-id="34e1daa0891c4d91" class="link" href="http://www#/hezi3/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/hezis.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/hezis.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米盒子3</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0f9074c65fb095ba', '//www#/hezimini/', 'pcpid']);" data-stat-id="0f9074c65fb095ba" class="link" href="http://www#/hezimini/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/hezimini.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/hezimini.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米盒子 mini</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-358d990fd3266939', '//item#/1154100018.html', 'pcpid']);" data-stat-id="358d990fd3266939" class="link" href="http://item#/1154100018.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/diyinpao.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/diyinpao.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米低音炮</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0ef3c4fa281f9de0', '//www#/shb/', 'pcpid']);" data-stat-id="0ef3c4fa281f9de0" class="link" href="http://www#/shb/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/shb.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/shb.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">蓝牙手柄</span></a>  </li></ul><ul class="children-list children-list-col children-list-col-3"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-709f6125bfbbc649', '//list#/accessories/tag', 'pcpid']);" data-stat-id="709f6125bfbbc649" class="link" href="http://list#/accessories/tag?id=yinxiang"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/zuheyinxiang80side.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/zuheyinxiang80side.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">家庭音响</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-156a642f553d2e40', '//list#/tvboxpj', 'pcpid']);" data-stat-id="156a642f553d2e40" class="link" href="http://list#/tvboxpj"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/dianshipeijian.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/dianshipeijian.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">电视盒子配件</span></a>  </li></ul></div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-44a546bb64cac00a', '//www#/smart/', 'pcpid']);" data-stat-id="44a546bb64cac00a" class="title" href="http://www#/smart/">路由器 智能硬件<i class="iconfont"></i></a> <div class="children clearfix children-col-3"><ul class="children-list children-list-col children-list-col-1"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-94b25b24314c124d', '//www#/miwifi3/', 'pcpid']);" data-stat-id="94b25b24314c124d" class="link" href="http://www#/miwifi3/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/luyouqi-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/luyouqi-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米路由器</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-74de33e425b1ff9a', '//www#/scooter/', 'pcpid']);" data-stat-id="74de33e425b1ff9a" class="link" href="http://www#/scooter/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/list/scooter.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/list/scooter.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">九号平衡车</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cf0a4e8edab7c7ce', '//www#/dianfanbao/', 'pcpid']);" data-stat-id="cf0a4e8edab7c7ce" class="link" href="http://www#/dianfanbao/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/dianfanbao-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/dianfanbao-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">米家压力IH电饭煲</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6d394f2b72d7eb61', '//www#/yicamera/', 'pcpid']);" data-stat-id="6d394f2b72d7eb61" class="link" href="http://www#/yicamera/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/yicamera.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/yicamera.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">运动相机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-154c7a244d04ac4c', '//www#/radio/', 'pcpid']);" data-stat-id="154c7a244d04ac4c" class="link" href="http://www#/radio/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/radio80side.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/radio80side.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">网络收音机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2c3073839daac907', '//www#/ihealth/', 'pcpid']);" data-stat-id="2c3073839daac907" class="link" href="http://www#/ihealth/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/ihealthbluetooth.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/ihealthbluetooth.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">血压计</span></a>  </li></ul><ul class="children-list children-list-col children-list-col-2"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5a7477a798a693ae', '//www#/air2/', 'pcpid']);" data-stat-id="5a7477a798a693ae" class="link" href="http://www#/air2/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/air2.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/air2.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">空气净化器 2</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-53038fb72ba3f41f', '//www#/water/', 'pcpid']);" data-stat-id="53038fb72ba3f41f" class="link" href="http://www#/water/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/water.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/water.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">净水器</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-93c72ebeea6ab410', '//www#/xiaoyi/', 'pcpid']);" data-stat-id="93c72ebeea6ab410" class="link" href="http://www#/xiaoyi/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/xiaoyi.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/xiaoyi.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">摄像机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-54e411ee7758ea60', '//list#/accessories/tag', 'pcpid']);" data-stat-id="54e411ee7758ea60" class="link" href="http://list#/accessories/tag?id=smartlamp"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/chuangtoudeng.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/chuangtoudeng.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">智能灯</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-bc8bf46fa05c54dc', '//www#/socket/', 'pcpid']);" data-stat-id="bc8bf46fa05c54dc" class="link" href="http://www#/socket/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/socket80side.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/socket80side.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">智能插座 基础版</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-fe8bfbbc28f83153', '//list#/accessories/smartsuit', 'pcpid']);" data-stat-id="fe8bfbbc28f83153" class="link" href="http://list#/accessories/smartsuit"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/zhinengjiatingtaozhuang-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/zhinengjiatingtaozhuang-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">智能家庭组合</span></a>  </li></ul><ul class="children-list children-list-col children-list-col-3"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-36ddd7ad9e9c7577', '//item#/1153300008.html', 'pcpid']);" data-stat-id="36ddd7ad9e9c7577" class="link" href="http://item#/1153300008.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/lvxin-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/lvxin-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">净化器滤芯</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cbd3ed384d23885f', '//list#/accessories/shouhuan', 'pcpid']);" data-stat-id="cbd3ed384d23885f" class="link" href="http://list#/accessories/shouhuan"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/shouhuan.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/shouhuan.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">手环及配件</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-55692bb186bef4da', '//www#/scale/', 'pcpid']);" data-stat-id="55692bb186bef4da" class="link" href="http://www#/scale/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/scale.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/scale.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">体重秤</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-3d69c90a59a468bf', '//item#/1154300013.html', 'pcpid']);" data-stat-id="3d69c90a59a468bf" class="link" href="http://item#/1154300013.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/leddengpao.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/leddengpao.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">智能灯泡</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-12389ed9e074658f', '//item#/1153200003.html', 'pcpid']);" data-stat-id="12389ed9e074658f" class="link" href="http://item#/1153200003.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/wifiplus.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/wifiplus.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">WiFi放大器</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ae9bf4ae1351d98d', '//list#/26', 'pcpid']);" data-stat-id="ae9bf4ae1351d98d" class="link" href="http://list#/26?cfrom=search"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/smart.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/smart.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">全部智能硬件</span></a>  </li></ul></div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-980118bafc0e2005', '//list#/11', 'pcpid']);" data-stat-id="980118bafc0e2005" class="title" href="http://list#/11">移动电源 插线板<i class="iconfont"></i></a> <div class="children clearfix children-col-1"> <ul class="children-list clearfix">  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-91a3d59b0b79aea9', '//www#/dianyuan/', 'pcpid']);" data-stat-id="91a3d59b0b79aea9" class="link" href="http://www#/dianyuan/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/dianyuan.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/dianyuan.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米移动电源</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9bc2bf0048a7912e', '//list#/accessories/tag', 'pcpid']);" data-stat-id="9bc2bf0048a7912e" class="link" href="http://list#/accessories/tag?id=powerstrip"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/powerscript.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/powerscript.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米插线板</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6f7f17db6378bcd1', '//list#/13', 'pcpid']);" data-stat-id="6f7f17db6378bcd1" class="link" href="http://list#/13"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/yidongdianyuan.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/yidongdianyuan.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">品牌移动电源</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-eedbebacd3aab91d', '//list#/dyfj', 'pcpid']);" data-stat-id="eedbebacd3aab91d" class="link" href="http://list#/dyfj"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/dianyuanfujian.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/dianyuanfujian.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">移动电源附件</span></a>  </li>  </ul> </div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a4277f9d894a1647', '//list#/17', 'pcpid']);" data-stat-id="a4277f9d894a1647" class="title" href="http://list#/17">耳机 音箱<i class="iconfont"></i></a> <div class="children clearfix children-col-2"><ul class="children-list children-list-col children-list-col-1"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-3258c74135aec1ff', '//www#/headphone/', 'pcpid']);" data-stat-id="3258c74135aec1ff" class="link" href="http://www#/headphone/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/headphone.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/headphone.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米头戴式耳机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-430e3e6af8c61ab2', '//www#/quantie/', 'pcpid']);" data-stat-id="430e3e6af8c61ab2" class="link" href="http://www#/quantie/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/quantie.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/quantie.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米圈铁耳机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-02b3321bbaf7e9a5', '//www#/huosai/', 'pcpid']);" data-stat-id="02b3321bbaf7e9a5" class="link" href="http://www#/huosai/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/huosai.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/huosai.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米活塞耳机 标准版</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-847fa5392f7c62b0', '//www#/huosai2/', 'pcpid']);" data-stat-id="847fa5392f7c62b0" class="link" href="http://www#/huosai2/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/jichuban-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/jichuban-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米活塞耳机 基础版</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-62c18b4638511112', '//www#/bluetooth-headset/', 'pcpid']);" data-stat-id="62c18b4638511112" class="link" href="http://www#/bluetooth-headset/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/bluetoothheadset.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/bluetoothheadset.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米蓝牙耳机</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d95ac8c9a040a283', '//list#/18', 'pcpid']);" data-stat-id="d95ac8c9a040a283" class="link" href="http://list#/18"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/erji.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/erji.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">品牌耳机</span></a>  </li></ul><ul class="children-list children-list-col children-list-col-2"><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5e049552b721056d', '//www#/pocketaudio/', 'pcpid']);" data-stat-id="5e049552b721056d" class="link" href="http://www#/pocketaudio/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/pocketaudio.png?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/pocketaudio.png?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米蓝牙音箱</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-433a57f9b3bdf48f', '//www#/yinxiang/', 'pcpid']);" data-stat-id="433a57f9b3bdf48f" class="link" href="http://www#/yinxiang/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xiaogangpao2-hei-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xiaogangpao2-hei-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小钢炮音箱 2</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-20a1fc7f900e00bb', '//item#/1144200023.html', 'pcpid']);" data-stat-id="20a1fc7f900e00bb" class="link" href="http://item#/1144200023.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/xiaogangpao.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/xiaogangpao.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小钢炮音箱</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-213544d15e04b132', '//item#/1154400010.html', 'pcpid']);" data-stat-id="213544d15e04b132" class="link" href="http://item#/1154400010.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/fanghezi.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/fanghezi.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米方盒子音箱</span></a>  </li><li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-fa6cc563ce188a5d', '//list#/accessories/soundbox', 'pcpid']);" data-stat-id="fa6cc563ce188a5d" class="link" href="http://list#/accessories/soundbox"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/pinpaiyinxiang.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/pinpaiyinxiang.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">品牌音箱</span></a>  </li></ul></div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-34a23063dc1ff269', '//list#/135', 'pcpid']);" data-stat-id="34a23063dc1ff269" class="title" href="http://list#/135">电池 存储卡<i class="iconfont"></i></a> <div class="children clearfix children-col-1"> <ul class="children-list clearfix">  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cf28b9b5fe21df81', '//item#/1154300033.html', 'pcpid']);" data-stat-id="cf28b9b5fe21df81" class="link" href="http://item#/1154300033.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/5Battery1.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/5Battery1.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">彩虹5号电池</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-fca1734d01240765', '//item#/1155000010.html', 'pcpid']);" data-stat-id="fca1734d01240765" class="link" href="http://item#/1155000010.html"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/7Battery1.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/7Battery1.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">彩虹7号电池</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4624027b91b17a14', '//list#/14', 'pcpid']);" data-stat-id="4624027b91b17a14" class="link" href="http://list#/14"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/dianchi.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/dianchi.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">电池</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9c61d0e606a6d621', '//list#/15', 'pcpid']);" data-stat-id="9c61d0e606a6d621" class="link" href="http://list#/15"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/chongdianqi-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/chongdianqi-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">充电器</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ef406b16595b222d', '//list#/16', 'pcpid']);" data-stat-id="ef406b16595b222d" class="link" href="http://list#/16"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/xiancai.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/xiancai.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">线材</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8672c4ef1bf1f713', '//list#/27', 'pcpid']);" data-stat-id="8672c4ef1bf1f713" class="link" href="http://list#/27"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/cunchu.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/cunchu.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">存储卡</span></a>  </li>  </ul> </div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d12d562bfff6d5ce', '//list#/7', 'pcpid']);" data-stat-id="d12d562bfff6d5ce" class="title" href="http://list#/7">保护套 后盖<i class="iconfont"></i></a> <div class="children clearfix children-col-1"> <ul class="children-list clearfix">  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0b6ac701197d497e', '//list#/8', 'pcpid']);" data-stat-id="0b6ac701197d497e" class="link" href="http://list#/8"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/baohu.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/baohu.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">保护套/保护壳</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-265d31dc63ffd900', '//list#/2', 'pcpid']);" data-stat-id="265d31dc63ffd900" class="link" href="http://list#/2"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/hougai.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/hougai.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">后盖</span></a>  </li>  </ul> </div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-df011a94c698b75e', '//list#/1', 'pcpid']);" data-stat-id="df011a94c698b75e" class="title" href="http://list#/1">贴膜 其他配件<i class="iconfont"></i></a> <div class="children clearfix children-col-1"> <ul class="children-list clearfix">  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-62d0a851ec0724a8', '//list#/9', 'pcpid']);" data-stat-id="62d0a851ec0724a8" class="link" href="http://list#/9"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/tiemo.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/tiemo.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">贴膜</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b2c4f764ae98c37f', '//search#/search_%E8%87%AA%E6%8B%8D%E6%9D%86', 'pcpid']);" data-stat-id="b2c4f764ae98c37f" class="link" href="http://search#/search_%E8%87%AA%E6%8B%8D%E6%9D%86"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/zipaigan.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/zipaigan.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">自拍杆</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-91ea6d55d6207474', '//list#/3', 'pcpid']);" data-stat-id="91ea6d55d6207474" class="link" href="http://list#/3"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/tizhi.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/tizhi.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">贴纸</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ee98f5467a0e93e5', '//list#/10', 'pcpid']);" data-stat-id="ee98f5467a0e93e5" class="link" href="http://list#/10"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/fangchensai.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/fangchensai.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">防尘塞</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-382f588016d79247', '//list#/5', 'pcpid']);" data-stat-id="382f588016d79247" class="link" href="http://list#/5"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/zhijia.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/zhijia.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">手机支架</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-7258e39a42f041d8', '//www#/wifi/', 'pcpid']);" data-stat-id="7258e39a42f041d8" class="link" href="http://www#/wifi/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/wifi.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/wifi.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">随身WiFi</span></a>  </li>  </ul> </div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-537b92499e4f44af', '//list#/134', 'pcpid']);" data-stat-id="537b92499e4f44af" class="title" href="http://list#/134">米兔 服装<i class="iconfont"></i></a> <div class="children clearfix children-col-1"> <ul class="children-list clearfix">  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9afcea8ab14a2fe7', 'http://mitu#/', 'pcpid']);" data-stat-id="9afcea8ab14a2fe7" class="link" href="http://mitu#/"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/mitu-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/mitu-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">米兔</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c8e1b4343b399d73', '//list#/22', 'pcpid']);" data-stat-id="c8e1b4343b399d73" class="link" href="http://list#/22"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/fuzhuang-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/fuzhuang-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">服装</span></a>  </li>  </ul> </div> </li>  <li class="category-item"> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-416922054764cb9d', '//list#/20', 'pcpid']);" data-stat-id="416922054764cb9d" class="title" href="http://list#/20">箱包 其他周边<i class="iconfont"></i></a> <div class="children clearfix children-col-1"> <ul class="children-list clearfix">  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-15fc25d3d493fd50', '//list#/23', 'pcpid']);" data-stat-id="15fc25d3d493fd50" class="link" href="http://list#/23"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xiangbao-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xiangbao-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">箱包</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-1b0efc2ad5e9da7d', '//search#/search_%E6%97%85%E8%A1%8C%E7%AE%B1', 'pcpid']);" data-stat-id="1b0efc2ad5e9da7d" class="link" href="http://search#/search_%E6%97%85%E8%A1%8C%E7%AE%B1"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/lvxingxiang.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/lvxingxiang.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">90分旅行箱</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-118f49399a48cb6b', '//list#/59', 'pcpid']);" data-stat-id="118f49399a48cb6b" class="link" href="http://list#/59"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/shubiaodian-80.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/shubiaodian-80.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">小米鼠标垫</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b1dc3004db9154b5', '//list#/24', 'pcpid']);" data-stat-id="b1dc3004db9154b5" class="link" href="http://list#/24"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/zhoubian1.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/zhoubian1.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">生活周边</span></a>  </li>  <li> <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-eac2651c4ad80859', '//list#/62', 'pcpid']);" data-stat-id="eac2651c4ad80859" class="link" href="http://list#/62"><img class="thumb" src="../Common/Public/person/placeholder-40.png" data-src="//c1.mifile.cn/f/i/15/goods/sidebar/wan.jpg?width=40&amp;height=40" srcset="//c1.mifile.cn/f/i/15/goods/sidebar/wan.jpg?width=80&amp;height=80 2x" alt="" height="40" width="40"><span class="text">酷玩产品</span></a>  </li>  </ul> </div> </li>  </ul></div></li>
                       
                       
                       
                      <?php 
                        $sql = "select * from `" . PIX . "category` where `pid` = 0";
                        $cateList = query($sql);
                     ?>
                     <?php foreach($cateList as $key => $val): ?>
                     <li class="nav-item">
                    <a href="commoditylist.php?cid=1" data-stat-id="a9318c5014b7997f" class="link" href="javascript:void(0);"><span class="text"><?= $val['name'];?></span><span class="arrow"></span></a>

                    </li>
                    <?php endforeach; ?>       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                                                        </ul></div></div></div>


<div class="breadcrumbs">
    <div class="container">
        <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www#/index.html', 'pcpid']);" data-stat-id="b0bcd814768c68cc" href="http://www#/index.html">首页</a><span class="sep">&gt;</span><span>个人中心</span>    </div>
</div>

<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="uc-box uc-sub-box">
                                        <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8f3d1bffd166dc22', '//static#/order/', 'pcpid']);" data-stat-id="8f3d1bffd166dc22" href="./myorderlist.php">我的订单</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li class="active"><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0690abbde870c06a', '//my#/portal', 'pcpid']);" data-stat-id="0690abbde870c06a" href="http://my#/portal?r=30966.1461039524">我的个人中心</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5294433e80b2c9b0', '//my#/cashAccount', 'pcpid']);" data-stat-id="5294433e80b2c9b0" href="http://my#/cashAccount?r=30966.1461039524">现金账户</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-bad8210fdb9088c4', 'http://order#/ecard/bind', 'pcpid']);" data-stat-id="bad8210fdb9088c4" href="http://order#/ecard/bind?r=30966.1461039524">小米礼品卡</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-593e8c9f8e61bcdc', 'http://order#/huanxin/list', 'pcpid']);" data-stat-id="593e8c9f8e61bcdc" href="http://order#/huanxin/list?r=30966.1461039524">手机换新券</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0c25ea23fee92211', 'http://order#/user/favorite', 'pcpid']);" data-stat-id="0c25ea23fee92211" href="http://order#/user/favorite?r=30966.1461039524">喜欢的商品</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cdcec10f2cbe6b42', 'http://order#/user/coupon', 'pcpid']);" data-stat-id="cdcec10f2cbe6b42" href="http://order#/user/coupon?r=30966.1461039524">优惠券</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-48ecd23c6e6e50ba', 'http://order#/user/address', 'pcpid']);" data-stat-id="48ecd23c6e6e50ba" href="http://order#/user/address?r=30966.1461039524">收货地址</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">售后服务</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f0d2d76d7d477164', 'http://service.order#/user/order/3', 'pcpid']);" data-stat-id="f0d2d76d7d477164" href="http://service.order#/user/order/3">换货单</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9109c45d8e3e5680', 'http://service.order#/user/order/6', 'pcpid']);" data-stat-id="9109c45d8e3e5680" href="http://service.order#/user/order/6">退款单</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5a4f5a0eb9c8cfa2', 'http://service.order#/cservice/repairorder', 'pcpid']);" data-stat-id="5a4f5a0eb9c8cfa2" href="http://service.order#/cservice/repairorder">维修单</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5aedd7982a0a1069', 'http://service.order#/user/compensate', 'pcpid']);" data-stat-id="5aedd7982a0a1069" href="http://service.order#/user/compensate">领取快递报销</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-be6a4d9e4cf827ef', 'http://service.order#/mihome/index', 'pcpid']);" data-stat-id="be6a4d9e4cf827ef" href="http://service.order#/mihome/index">预约亲临门店服务</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-35eef2fd7467d6ca', 'https://account.xiaomi.com/', 'pcpid']);" data-stat-id="35eef2fd7467d6ca" href="https://account.xiaomi.com/" target="_blank">个人信息</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ae5ee0188510f1e6', 'https://account.xiaomi.com/pass/auth/security/home#service=setPassword', 'pcpid']);" data-stat-id="ae5ee0188510f1e6" href="https://account.xiaomi.com/pass/auth/security/home#service=setPassword" target="_blank">修改密码</a></li>
                                <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c130c3dbf41fd4d8', 'http://uvip.xiaomi.cn', 'pcpid']);" data-stat-id="c130c3dbf41fd4d8" href="http://uvip.xiaomi.cn/" target="_blank">社区VIP认证</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box portal-content-box">
            <div class="box-bd">
                                <div class="portal-main clearfix">
                                <!-- 将SESSION信息取出来，显示在这里 -->
                    <div class="user-card">
                        <h2 class="username"><?= $_SESSION['userInfo']['name']?></h2>
                        <!-- <p class="tip">下午好～</p> -->
                        <a data-stat-id="4b099f76f8f470d2" class="link" href="#" target="_blank">修改个人信息 &gt;</a>
                        <img class="avatar" src="../Common/Public/person/photo.jpg" alt="lmq1117" height="150" width="150">
                    </div>
                    <div class="user-actions">
                        <ul class="action-list">
                            <li>账户安全：<span class="level level-3">较高</span></li>
                                                        <li>绑定手机：<span class="tel"><?= isset($_SESSION['userInfo']['tel']) ? $_SESSION['userInfo']['tel'] : '电话未填写'?></span></li>
                                                        
                                                        <li>绑定邮箱：<span class="tel"><?= isset($_SESSION['userInfo']['email']) ? $_SESSION['userInfo']['email'] : '邮箱未填写'?></span></li>
                                                    </ul>
                    </div>
                </div>
                <div class="portal-sub">
                    <ul class="info-list clearfix">
                        <li>
                            <h3>待发货的订单：<span class="num">0</span></h3>
                            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dd6496f77a167a5d', '//static#/order/', 'pcpid']);" data-stat-id="dd6496f77a167a5d" href="#">查看待支付订单<i class="iconfont"></i></a>
                            <img src="../Common/Public/person/portal-icon-1.png" alt="">
                        </li>
                        <li>
                            <h3>待确认收货的订单：<span class="num">0</span></h3>
                            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-92fa860987c1c734', '//static#/order/', 'pcpid']);" data-stat-id="92fa860987c1c734" href="#">查看待收货订单<i class="iconfont"></i></a>
                            <img src="../Common/Public/person/portal-icon-2.png" alt="">
                        </li>
                        <li>
                            <?php 
                                //查询出待评价的商品数量
                                //规则是购买15天内，还没评价过，而且订单详情表里是否可以评价字段为1的
                                //step1 查出购买15天内的订单号
                                $now = time();
                                $sql = "select `id` from `" .PIX. "orders` where {$now} - `addtime` < " . (60 * 60 * 24 * 15) . " and `status` = 2 and `uid` = {$_SESSION['userInfo']['id']}";
                                $orderNum = query($sql);
                                if(is_array($orderNum))
                                {   $in = '(';
                                    foreach($orderNum as $val)
                                    {
                                        $in .= $val['id'] . ',';
                                    }
                                    $in = rtrim($in,',');
                                    $in .= ')';
                                    // echo $in;
                                    
                                    //准备新sql语句，查出可以评论的商品数量
                                    $sql = "select count(`id`) as commentNum from`" . PIX . "detail` where oid in {$in} and `is_comment` = 0"; 
                                    // echo $sql;
                                    $list = query($sql);
                                    if(is_array($list))
                                    {
                                        $commentNum = $list[0]['commentNum'];
                                    }
                                    else
                                    {
                                        $commentNum = 0;
                                    }
                                    
                                    //echo $commentNum;

                                }
                                else
                                {//不是数组，可评论商品数量为0
                                    $commentNum = 0;
                                }


                             ?>

                            <h3>待评价商品数：<span class="num"><?= $commentNum;?></span></h3>
                            <a data-stat-id="b4a31da3923196c8" href="./commentlist.php">查看待评价商品<i class="iconfont"></i></a>
                            <img src="../Common/Public/person/portal-icon-3.png" alt="">
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>        </div>
    </div>
</div>

<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-da46b3d5586757a4', '//www#/service/exchange#repaire', 'pcpid']);" data-stat-id="da46b3d5586757a4" rel="nofollow" href="http://www#/service/exchange#repaire" target="_blank"><i class="iconfont"></i>1小时快修服务</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-78babcae8a619e26', '//www#/service/exchange#back', 'pcpid']);" data-stat-id="78babcae8a619e26" rel="nofollow" href="http://www#/service/exchange#back" target="_blank"><i class="iconfont"></i>7天无理由退货</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d1745f68f8d2dad7', '//www#/service/exchange#free', 'pcpid']);" data-stat-id="d1745f68f8d2dad7" rel="nofollow" href="http://www#/service/exchange#free" target="_blank"><i class="iconfont"></i>15天免费换货</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f1b5c2451cf73123', '//www#/service/exchange#mail', 'pcpid']);" data-stat-id="f1b5c2451cf73123" rel="nofollow" href="http://www#/service/exchange#mail" target="_blank"><i class="iconfont"></i>满150元包邮</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-caf836ab93cdfd31', '//www#/c/service/poststation/', 'pcpid']);" data-stat-id="caf836ab93cdfd31" rel="nofollow" href="http://www#/c/service/poststation/" target="_blank"><i class="iconfont"></i>520余家售后网点</a></li>
                        </ul>
        </div>
        <div class="footer-links clearfix">
            
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2458d0d93e3f7386', '//www#/service/help_center/guide/', 'pcpid']);" data-stat-id="2458d0d93e3f7386" rel="nofollow" href="http://www#/service/help_center/guide/" target="_blank">购物指南</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2109aae4f55e7716', '//www#/service/help_center/pay/', 'pcpid']);" data-stat-id="2109aae4f55e7716" rel="nofollow" href="http://www#/service/help_center/pay/" target="_blank">支付方式</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-fdf4464071458ade', '//www#/service/help_center/delivery/', 'pcpid']);" data-stat-id="fdf4464071458ade" rel="nofollow" href="http://www#/service/help_center/delivery/" target="_blank">配送方式</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8e282b6f669ba990', '//www#/service/exchange', 'pcpid']);" data-stat-id="8e282b6f669ba990" rel="nofollow" href="http://www#/service/exchange" target="_blank">售后政策</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5f2408ab3c808aa2', 'http://fuwu#/', 'pcpid']);" data-stat-id="5f2408ab3c808aa2" rel="nofollow" href="http://fuwu#/" target="_blank">自助服务</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-18c340c920a278a1', 'http://xiazai#/', 'pcpid']);" data-stat-id="18c340c920a278a1" rel="nofollow" href="http://xiazai#/" target="_blank">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>线下门店</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b27b566974e4aa67', '//www#/c/xiaomizhijia/', 'pcpid']);" data-stat-id="b27b566974e4aa67" rel="nofollow" href="http://www#/c/xiaomizhijia/" target="_blank">小米之家</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-bdb16d6645c388ac', '//www#/c/service/poststation/', 'pcpid']);" data-stat-id="bdb16d6645c388ac" rel="nofollow" href="http://www#/c/service/poststation/" target="_blank">服务网点</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2796f409f66cd383', '//www#/static/familyLocation/', 'pcpid']);" data-stat-id="2796f409f66cd383" rel="nofollow" href="http://www#/static/familyLocation/" target="_blank">线下专区</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小米</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f6d386c65b1f4132', '//www#/about', 'pcpid']);" data-stat-id="f6d386c65b1f4132" rel="nofollow" href="http://www#/about" target="_blank">了解小米</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4307a445f5592adb', 'http://hr.xiaomi.com/', 'pcpid']);" data-stat-id="4307a445f5592adb" rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">加入小米</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6842e821365ee45d', '//www#/about/contact', 'pcpid']);" data-stat-id="6842e821365ee45d" rel="nofollow" href="http://www#/about/contact" target="_blank">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-464883aa6e799290', 'http://e.weibo.com/xiaomishouji', 'pcpid']);" data-stat-id="464883aa6e799290" rel="nofollow" href="http://e.weibo.com/xiaomishouji" target="_blank">新浪微博</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-78fdefa9dee561b5', 'http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat', 'pcpid']);" data-stat-id="78fdefa9dee561b5" rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank">小米部落</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-47539f6570f0da90', '#J_modalWeixin', 'pcpid']);" data-stat-id="47539f6570f0da90" rel="nofollow" href="#J_modalWeixin" data-toggle="modal">官方微信</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>特色服务</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-fdc16dd51892a164', '//order#/queue/f2code', 'pcpid']);" data-stat-id="fdc16dd51892a164" rel="nofollow" href="http://order#/queue/f2code" target="_blank">F 码通道</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-99876c8aaf8ef0a4', '//www#/mimobile/', 'pcpid']);" data-stat-id="99876c8aaf8ef0a4" rel="nofollow" href="http://www#/mimobile/" target="_blank">小米移动</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b08be6bd51351e1a', '//order#/misc/checkitem', 'pcpid']);" data-stat-id="b08be6bd51351e1a" rel="nofollow" href="http://order#/misc/checkitem" target="_blank">防伪查询</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7642f0a3475d686', '//www#/service/contact', 'pcpid']);" data-stat-id="a7642f0a3475d686" rel="nofollow" class="btn btn-line-primary btn-small" href="http://www#/service/contact" target="_blank"><i class="iconfont"></i> 24小时在线客服</a>            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <div class="logo ir">小米官网</div>
        <div class="info-text">
            <p>小米旗下网站：<a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4fb589dbb54f257a', '//www#/index.html', 'pcpid']);" data-stat-id="4fb589dbb54f257a" href="http://www#/index.html" target="_blank">小米网</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ed2a0e25c8b0ca2f', 'http://www.miui.com/', 'pcpid']);" data-stat-id="ed2a0e25c8b0ca2f" href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-826b32c1478a98d5', 'http://www.miliao.com/', 'pcpid']);" data-stat-id="826b32c1478a98d5" href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c9d2af1ad828a834', 'http://www.duokan.com/', 'pcpid']);" data-stat-id="c9d2af1ad828a834" href="http://www.duokan.com/" target="_blank">多看书城</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-96f1a8cecc909af2', 'http://www.miwifi.com/', 'pcpid']);" data-stat-id="96f1a8cecc909af2" href="http://www.miwifi.com/" target="_blank">小米路由器</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-347f6dd0d8d9fda3', 'http://call#/', 'pcpid']);" data-stat-id="347f6dd0d8d9fda3" href="http://call#/" target="_blank">视频电话</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4ad42379062eda19', 'http://blog.xiaomi.com/', 'pcpid']);" data-stat-id="4ad42379062eda19" href="http://blog.xiaomi.com/" target="_blank">小米后院</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dfe0fac59cfb15d9', 'http://xiaomi.tmall.com/', 'pcpid']);" data-stat-id="dfe0fac59cfb15d9" href="http://xiaomi.tmall.com/" target="_blank">小米天猫店</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c2613d0d3b77ddff', 'http://shop115048570.taobao.com', 'pcpid']);" data-stat-id="c2613d0d3b77ddff" href="http://shop115048570.taobao.com/" target="_blank">小米淘宝直营店</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2f48f953961c637d', 'http://union#/', 'pcpid']);" data-stat-id="2f48f953961c637d" href="http://union#/" target="_blank">小米网盟</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-6479cd2d041bcf04', '//static#/feedback/', 'pcpid']);" data-stat-id="6479cd2d041bcf04" href="http://static#/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9db137a8e0d5b3dd', '#J_modal-globalSites', 'pcpid']);" data-stat-id="9db137a8e0d5b3dd" href="#J_modal-globalSites" data-toggle="modal" target="_blank">Select Region</a>            </p>
            <p>©<a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-836cacd9ca5b75dd', '//www#/', 'pcpid']);" data-stat-id="836cacd9ca5b75dd" href="http://www#/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 京ICP备10046444号 <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-57efc92272d4336b', 'http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134', 'pcpid']);" data-stat-id="57efc92272d4336b" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank">京公网安备11010802020134号 </a><a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c5f81675b79eb130', '//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg', 'pcpid']);" data-stat-id="c5f81675b79eb130" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank">京网文[2014]0059-0009号</a>
 违法和不良信息举报电话：185-0130-1238</p>
        </div>
        <div class="info-links">
                    <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9e1604cd6612205c', 'https://search.szfw.org/cert/l/CX20120926001783002010', 'pcpid']);" data-stat-id="9e1604cd6612205c" href="https://search.szfw.org/cert/l/CX20120926001783002010" target="_blank"><img src="../Common/Public/person/v-logo-2.png" alt="诚信网站"></a>
                    <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-3e1533699f264eac', 'https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082', 'pcpid']);" data-stat-id="3e1533699f264eac" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082" target="_blank"><img src="../Common/Public/person/v-logo-1.png" alt="可信网站"></a>
                    <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b085e50c7ec83104', 'http://www.315online.com.cn/member/315140007.html', 'pcpid']);" data-stat-id="b085e50c7ec83104" href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img src="../Common/Public/person/v-logo-3.png" alt="网上交易保障中心"></a>
        
        </div>
    </div>
<div class="slogan ir">探索黑科技，小米为发烧而生</div></div>

<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
        <div class="modal-hd">
            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cfd3189b8a874ba4', '', 'pcpid']);" data-stat-id="cfd3189b8a874ba4" class="close" data-dismiss="modal"><i class="iconfont"></i></a>
            <h3>小米手机官方微信二维码</h3>
        </div>
        <div class="modal-bd">
            <p style="margin: 0 0 10px;">打开微信，点击右上角的“+”，选择“扫一扫”功能，<br>对准下方二维码即可。</p>
            <img alt="" src="../Common/Public/person/qr.png" height="375" width="375">
        </div>
    </div>
<!-- .modal-weixin END -->
<div class="modal modal-hide modal-bigtap-queue" id="J_bigtapQueue">
    <div class="modal-body">
        <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont"></i></span>
        <h3>正在排队，请稍候喔！</h3>
        <p class="queue-tip">抱歉，目前排队人数较多，导致服务器压力山大，请您耐心排队等待，<br>我们将在稍后告诉您排队结果。</p>
        <div class="queue-animate">
            <div id="J_mituWalking" class="mitu-walk"> </div>
            <div class="animate-mask animate-mask-left"></div>
            <div class="animate-mask animate-mask-right"></div>
        </div>
    </div>
</div>
<!-- .xm-dm-queue END -->
<div id="J_bigtapError" class="modal modal-hide modal-bigtap-error">
    <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont"></i></span>
    <div class="modal-body">
        <h3>抱歉，网络拥堵无法连接服务器</h3>
        <p class="error-tip">由于访问人数太多导致服务器压力山大，请您稍后再重试。</p>
        <p>
            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c148a4197491d5bd', '', 'pcpid']);" data-stat-id="c148a4197491d5bd" class="btn btn-primary" id="J_bigtapRetry">重试</a>
        </p>
    </div>
</div>


<div id="J_bigtapModeBox" class="modal fade modal-hide modal-bigtap-mode">
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
        <div class="modal-body">
            <h3 class="title">为防黄牛，请您输入下面的验证码</h3>
             <p class="desc">在防黄牛的路上，我们一直在努力，也知道做的还不够。<br>
    所以，这次劳烦您多输一次验证码，我们一起防黄牛。</p>
            <div class="mode-loading" id="J_bigtapModeLoading">
                <img src="../Common/Public/person/loading.gif" alt="" height="32" width="32">
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ce9e5bb5b994ad55', 'javascript:void(0);', 'pcpid']);" data-stat-id="ce9e5bb5b994ad55" id="J_bigtapModeReload" class="reload  hide" href="javascript:void(0);">网络错误，点击重新获取验证码！</a>
            </div>
            <div class="mode-action hide" id="J_bigtapModeAction">
                <div class="mode-con" id="J_bigtapModeContent"></div>
                <input name="bigtapmode" class="input-text" id="J_bigtapModeInput" placeholder="请输入正确的验证码" type="text">
                <p class="tip" id="J_bigtapModeTip"></p>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-7f083d6abed714f8', '', 'pcpid']);" data-stat-id="7f083d6abed714f8" class="btn  btn-gray" id="J_bigtapModeSubmit">确认</a>
            </div>
        </div>
    </div>
<!-- .xm-dm-error END -->
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
       <div class="modal-hd">
            <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d63900908fde14b1', '', 'pcpid']);" data-stat-id="d63900908fde14b1" class="close" data-dismiss="modal"><i class="iconfont"></i></a>
            <h3>Select Region</h3>
        </div>
        <div class="modal-bd">
            <h3>Welcome to Mi.com</h3>
            <p class="modal-globalSites-tips">Please select your country or region</p>
            <p class="modal-globalSites-links clearfix">
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-51fe807618ae85f4', '//www#/index.html', 'pcpid']);" data-stat-id="51fe807618ae85f4" href="http://www#/index.html">Mainland China</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d8e4264197de1747', 'http://www#/hk/', 'pcpid']);" data-stat-id="d8e4264197de1747" href="http://www#/hk/">Hong Kong</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e7bd0f4e372c0b29', 'http://www#/tw/', 'pcpid']);" data-stat-id="e7bd0f4e372c0b29" href="http://www#/tw/">TaiWan</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e9c0506f7e4e7161', 'http://www#/sg/', 'pcpid']);" data-stat-id="e9c0506f7e4e7161" href="http://www#/sg/">Singapore</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-d6299ad30ec761a8', 'http://www#/my/', 'pcpid']);" data-stat-id="d6299ad30ec761a8" href="http://www#/my/">Malaysia</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-22b601cf7b3ada84', 'http://www#/ph/', 'pcpid']);" data-stat-id="22b601cf7b3ada84" href="http://www#/ph/">Philippines</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-441d26d4571e10dc', 'http://www#/in/', 'pcpid']);" data-stat-id="441d26d4571e10dc" href="http://www#/in/">India</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-88ccf9755c488ec5', 'http://www#/id/', 'pcpid']);" data-stat-id="88ccf9755c488ec5" href="http://www#/id/">Indonesia</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c41d871bf5ddcd95', 'http://br#/', 'pcpid']);" data-stat-id="c41d871bf5ddcd95" href="http://br#/">Brasil</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4426c5dac474df5f', 'http://www#/en/', 'pcpid']);" data-stat-id="4426c5dac474df5f" href="http://www#/en/">Global Home</a>
                <a onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-261bb8cf155fb56b', 'http://www#/mena/', 'pcpid']);" data-stat-id="261bb8cf155fb56b" href="http://www#/mena/"> MENA</a>
            </p>
        </div>
    </div>


</body></html>