<?php
    require './init.php';
?>
<!DOCTYPE html>
<html xml:lang="zh-CN" lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<title>填写订单信息</title>
<meta name="viewport" content="width=1226">
<link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Common/Public/confirm/base.css">
<link rel="stylesheet" type="text/css" href="../Common/Public/confirm/checkout.css">
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-ac576a29202325c4', '//www.#/index.html', 'pcpid']);" data-stat-id="ac576a29202325c4" class="logo " href="http://www.#/index.html" title="小米官网"></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle"><h2>确认订单</h2></div>
        <div class="topbar-info" id="J_userInfo">
            
                        <?php if(empty($_SESSION['userInfo'])): ?>
            <a href="./login.php" data-stat-id="bf3aa4c80c0ac789" class="link" data-needlogin="true">登录</a><span class="sep">|</span><a  data-stat-id="749b1369201c13fb" class="link" href="./register.php">注册</a>        
            <?php else: ?>
                <?= $_SESSION['userInfo']['name'];?> <span class="sep">|</span> <a  data-stat-id="749b1369201c13fb" class="link" href="./action.php?handler=logout">退出</a>
            <?php endif;?>


        </div>
    </div>
</div>
<!-- .site-mini-header END -->


<div class="page-main">
    <div class="container">
        <div class="checkout-box">
            <div class="section section-address">
                <div class="section-header clearfix">
                    <h3 class="title">收货地址</h3>
                    <div class="more">
                                            </div>
                                                                            </div>
                <div class="section-body clearfix" id="J_addressList">
                    <!-- addresslist begin -->
                    <?php
                        //如果用户有订单，取以前最新订单的地址作为地址
                        $sql = "select * from `" . PIX . "orders` where `uid`='{$_SESSION['userInfo']['id']}' order by `addtime` desc limit 0,1";
                        @$reUserInfo = query($sql)[0];

                        
                        //echo $sql;
                        //用户没有订单，让用户新建地址
                    ?>
                    <?php if(!empty($reUserInfo)): ?>


                    <!-- 地址信息从这里开始遍历 -->
                    <div class="address-item J_addressItem selected" data-address_id="10151031159640196" data-consignee="齐照义" data-tel="156****9352" data-province_id="17" data-province_name="河南" data-city_id="200" data-city_name="南阳市" data-district_id="1920" data-district_name="卧龙区" data-area="192010" data-address="永安路525巷123" data-tag_name="" data-editable="Y">
                        <dl>
                            <dt>
                                <span class="tag"></span>
                                <em class="uname"><?= $reUserInfo['linkman'];?></em>
                            </dt>
                            <dd class="utel"><?= $reUserInfo['phone'];?></dd>
                            <dd class="uaddress"><?= $reUserInfo['address'];?></dd>
                        </dl>
                        <div class="actions">
                            <a data-stat-id="25baf9d4f33c8f6c" href="#" class="modify J_addressModify">修改</a>
                        </div>
                    </div>
                    
                    <?php else:?>
                    <div class="address-item address-item-new" id="J_newAddress">
                        <form action="./action.php?handler=addaddress" method="post">
                            收货地址：<input type="text" name="address"><br>
                            收 件 人：<input type="text" name="linkman"><br>
                            联系电话：<input type="text" name="phone"><br>
                            邮&nbsp;&nbsp;&nbsp;&nbsp;编：<input type="text" name="code"><br>
                            <input type="hidden" name="uid" value="<?= $_SESSION['userInfo']['id']?>"><br>
                            <input type="submit" value="添加收货地址"><br>
                        </form>
                    </div>
                    <?php endif;?>
                    <!-- 地址信息到这里为一条 -->
                    <!-- addresslist end -->     

                </div>
            </div>

            <div class="section section-options section-payment clearfix">
                <div class="section-header">
                    <h3 class="title">支付方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="J_optionList options ">
                                                <li data-type="pay" class="J_option selected" data-value="1">
                            货到付款                            <span>
                            （支持现金、支付宝、银联、财付通、小米钱包等）                            </span>
                        </li>
                                            </ul>
                </div>
            </div>

            <div class="section section-options section-shipment clearfix">
                <div class="section-header">
                    <h3 class="title">配送方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="clearfix J_optionList options ">
                                                <li data-type="shipment" class="J_option selected" data-amount="10" data-value="2">
                            快递配送(免费)                                                   </li>
                                            </ul>

                    <div style="display: none;" class="service-self-tip" id="J_serviceSelfTip"></div>
                </div>
            </div>



            <div class="section section-goods">
                <div class="section-header clearfix">
                    <h3 class="title">商品信息</h3>
                    <div class="more">
                        <a data-stat-id="e2cb89a0d7ce0e0b" href="./card.php">返回购物车<i class="iconfont"></i></a>
                    </div>
                </div>
                <div class="section-body">
                    <ul class="goods-list" id="J_goodsList">
                        <!--遍历购物车里的产品信息到这里-->
                        <?php foreach($_SESSION['card'] as $val):?>
                        <li class="clearfix">
                            <div class="col col-img">
                            <img src="../Common/Public/images/commodity/<?= $val['picture'];?>" height="30" width="30">
                            </div>
                            <div class="col col-name">
                                <a data-stat-id="75f41141d1ee8321" href="./detail.php?id=<?= $val['id'];?>" target="_blank"><?= $val['name'];?></a>
                            </div>
                            <div class="col col-price">
                                    <?= $val['price']?> x  <?= $val['num']?>                           </div>
                            <div class="col col-status">
                                有货
                            </div>
                            <div class="col col-total">
                                <?= ($val['price'] * $val['num'])?>元
                            </div>
                        </li>
                        <?php endforeach;?>
                        <!--遍历购物车里的产品信息到这里-->
                    </ul>
                </div>
            </div>

            <div class="section section-count clearfix">


                <div class="money-box" id="J_moneyBox">
                    <ul>
                        <li class="clearfix">
                            <label>商品件数：</label>
                            <span class="val"><?= isset($_SESSION['totalNum']) ? $_SESSION['totalNum'] : 0 ;?>件</span>
                        </li>
                        <li class="clearfix">
                            <label>金额合计：</label>
                            <span class="val"><?= $_SESSION['totalPrice']?>元</span>
                        </li>
                        
                        <li class="clearfix total-price">
                            <label>应付总额：</label>
                            <span class="val"><em id="J_totalPrice"><?= $_SESSION['totalPrice'];?></em>元</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="section-bar clearfix">
                <div class="fl">
                    <div class="seleced-address hide" id="J_confirmAddress">
                    </div>
                    <div class="big-pro-tip hide J_confirmBigProTip"></div>
                </div>
                <?php if(!empty($reUserInfo) && !empty($_SESSION['totalPrice']) && !empty($_SESSION['totalNum'])):?>
                <div class="fr">
                    <a data-stat-id="4773f7ffc10003b8" href="./action.php?handler=confirmedorder" class="btn btn-primary" id="J_checkoutToPay">确认订单</a>
                </div>
                <?php else:?>
                    <a data-stat-id="4773f7ffc10003b8" href="./action.php?handler=confirmedorder" class="btn btn-primary" id="J_checkoutToPay">返回检查订单</a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<!-- 大家点缺货提示 -->
<div class="big-pro-tip-pop hide" id="J_popBigProTip"></div>

<!-- 禮品卡提示 S-->
<div class="modal fade modal-hide modal-lipin" id="J_lipinTip">
    <div class="modal-header">
        <h3 class="title">温馨提示</h3>
    </div>
    <div class="modal-body">
        <p>
            为保障您的利益与安全，下单后礼品卡将会被使用，<br>
            且订单信息将不可修改。请确认收货信息：
        </p>
        <ul>
            <li class="clearfix">
                <strong>收&nbsp;&nbsp;货&nbsp;&nbsp;人：</strong>
                <span id="J_lipinUserName"></span>
            </li>
            <li class="clearfix">
                <strong>联系电话：</strong>
                <span id="J_lipinUserPhone"></span>
            </li>
            <li class="clearfix">
                <strong>收货地址：</strong>
                <span id="J_lipinUserAddress"></span>
            </li>
        </ul>
    </div>
    <div class="modal-footer">
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-8e19401adef46ba2', 'javascript:void(0);', 'pcpid']);" data-stat-id="8e19401adef46ba2" href="javascript:void(0);" class="btn btn-primary" id="J_lipinSubmit">确认下单</a>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-28800888dda4eee0', 'javascript:void(0);', 'pcpid']);" data-stat-id="28800888dda4eee0" href="javascript:void(0);" class="btn btn-gray" data-dismiss="modal">返回修改</a>
    </div>
</div>
<!--  禮品卡提示 E-->

<!-- 预售提示 S-->
<div class="modal fade modal-hide modal-yushou" id="J_yushouTip">
    <div class="modal-header">
        <h3 class="title">请确认收货地址及发货时间</h3>
    </div>
    <div class="modal-body">
        <ul class="content">
            <li>
                <h3>请确认配送地址，提交后不可变更：</h3>
                <p id="J_yushouAddress"> </p>
                <span class="icon icon-1"></span>
            </li>
            <li>
                <h3>支付后发货</h3>
                <p>如您随预售商品一起购买的商品，将与预售商品一起发货</p>
                <span class="icon icon-2"></span>
            </li>
            <li>
                <h3>以支付价格为准</h3>
                <p>如预售产品发生调价，已支付订单价格将不受影响。</p>
                <span class="icon icon-3"></span>
            </li>
        </ul>
    </div>
    <div class="modal-footer">
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-adbbe3abff3f506a', 'javascript:void(0);', 'pcpid']);" data-stat-id="adbbe3abff3f506a" href="javascript:void(0);" class="btn btn-gray" data-dismiss="modal">返回修改地址</a>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-49b440ef95b2b913', 'javascript:void(0);', 'pcpid']);" data-stat-id="49b440ef95b2b913" href="javascript:void(0);" class="btn btn-primary" id="J_yushouSubmit">确认并继续下单</a>
    </div>
</div>
<!--  预售提示 E-->

<div class="modal fade modal-hide modal-edit-address" id="J_modalEditAddress">
    <div class="modal-body">
        <iframe allowfullscreen="" frameborder="0" height="100%" width="100%"></iframe>
    </div>
</div>

<div class="modal fade modal-hide fade modal-alert" id="J_modalAlert">
    <div class="modal-bd">
        <div class="text">
            <h3 id="J_alertMsg"></h3>
        </div>
        <div class="actions">
            <button class="btn btn-primary" data-dismiss="modal">确定</button>
        </div>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-b718c74de11bb9a0', 'javascript:void(0);', 'pcpid']);" data-stat-id="b718c74de11bb9a0" class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
</div>

<div class="address-top-bar" id="J_addressTopBar">
    <div class="container">
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-0263b2497800ada5', 'javascript:void(0);', 'pcpid']);" data-stat-id="0263b2497800ada5" href="javascript:void(0);" class="btn btn-primary" id="J_addressTopBarBtn">选择该收货地址</a>
        <div class="content" id="J_addressTopCon"><span class="uname">齐照义</span><span class="utel">156****9352</span> 河南 南阳市 卧龙区 永安路525巷123</div>
    </div>
</div>


<div class="modal modal-warning modal-hide" id="warning-bargain-1463">
    <div class="modal-hd">
        <h2 class="title">温馨提示</h2>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-bdb508f1f15790d3', 'javascript:void(0);', 'pcpid']);" data-stat-id="bdb508f1f15790d3" class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
    <div class="modal-bd">
        <p>
            <b>换卡说明：</b>
            <br><br>移动2G / 3G卡升级为移动4G卡
            <br>传统SIM大卡换小米手机适配的micro卡
        </p>
    </div>
</div>

<div class="modal modal-warning modal-hide" id="warning-bargain-1464">
    <div class="modal-hd">
        <h2 class="title">温馨提示</h2>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-bdb508f1f15790d3', 'javascript:void(0);', 'pcpid']);" data-stat-id="bdb508f1f15790d3" class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
    <div class="modal-bd">
        <p>
            <b>换卡说明：</b>
            <br><br>移动2G / 3G卡升级为移动4G卡
            <br>传统SIM大卡换小米手机适配的nano卡
        </p>
    </div>
</div>

<!-- 保险弹窗 -->
<!-- 保险弹窗 -->

<div class="modal in hide modal-baoxian" id="J_baoxian">
    <div class="modal-header">
        <h3>小米意外保障服务</h3>
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
    </div>
    <div class="modal-body">
        <div class="con-1">
            <h4>购买保障服务的设备在意外受损时可获得免费维修</h4>
            <ul class="icon-list clearfix">
                <li>
                    <span class="icon icon-1"></span>
                    屏幕碎裂免费换新屏
                </li>
                <li>
                    <span class="icon icon-2"></span>
                    进水、摔落免费修
                </li>
                <li>
                    <span class="icon icon-3"></span>
                    修好为止
                </li>
            </ul>
            <dl class="xuzhi">
                <dt>为保障您的权益，购买前请仔细阅读：</dt>
                <dd>· 本保障服务目前仅适用于小米/平板用户。</dd>
                <dd>· 本保障服务自您收到设备起生效，有效期为一年，若您在收到设备7日内需要取消保障服务，请连同设备一起申请退货。</dd>
                <dd>· 故意行为导致的设备损坏以及盗窃、抢劫、遗失设备等不在服务保障范围内（具体以小米意外保障服务条款为准）。<br>
                    <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-759c252ae808a3da', 'http://www.#/service/safe', 'pcpid']);" data-stat-id="759c252ae808a3da" href="http://www.#/service/safe" target="_blank" class="J_baoxianMore">了解《小米意外保障服务》详细条款&gt;</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="modal-footer clearfix">
        <p>
            <span class="J_baoxianAgree"><i class="iconfont icon-checkbox">√</i> 我已经阅读并同意</span>《<a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-76edd269d90d91e2', 'http://www.#/service/safe', 'pcpid']);" data-stat-id="76edd269d90d91e2" href="http://www.#/service/safe" target="_blank" class="J_baoxianMore">小米意外保障服务条款</a>》
        </p>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-c26631409e7d95f9', '', 'pcpid']);" data-stat-id="c26631409e7d95f9" class="btn btn-primary J_buyBaoxian">确认并购买服务</a>
        <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-821a98207fa653c1', '', 'pcpid']);" data-stat-id="821a98207fa653c1" class="btn btn-gray" data-dismiss="modal" aria-hidden="true">取消</a>
    </div>
</div>


<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-da46b3d5586757a4', '//www.#/service/exchange#repaire', 'pcpid']);" data-stat-id="da46b3d5586757a4" rel="nofollow" href="http://www.#/service/exchange#repaire" target="_blank"><i class="iconfont"></i>1小时快修服务</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-78babcae8a619e26', '//www.#/service/exchange#back', 'pcpid']);" data-stat-id="78babcae8a619e26" rel="nofollow" href="http://www.#/service/exchange#back" target="_blank"><i class="iconfont"></i>7天无理由退货</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-d1745f68f8d2dad7', '//www.#/service/exchange#free', 'pcpid']);" data-stat-id="d1745f68f8d2dad7" rel="nofollow" href="http://www.#/service/exchange#free" target="_blank"><i class="iconfont"></i>15天免费换货</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-f1b5c2451cf73123', '//www.#/service/exchange#mail', 'pcpid']);" data-stat-id="f1b5c2451cf73123" rel="nofollow" href="http://www.#/service/exchange#mail" target="_blank"><i class="iconfont"></i>满150元包邮</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-caf836ab93cdfd31', '//www.#/c/service/poststation/', 'pcpid']);" data-stat-id="caf836ab93cdfd31" rel="nofollow" href="http://www.#/c/service/poststation/" target="_blank"><i class="iconfont"></i>520余家售后网点</a></li>
                        </ul>
        </div>
        <div class="footer-links clearfix">
            
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-2458d0d93e3f7386', '//www.#/service/help_center/guide/', 'pcpid']);" data-stat-id="2458d0d93e3f7386" rel="nofollow" href="http://www.#/service/help_center/guide/" target="_blank">购物指南</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-2109aae4f55e7716', '//www.#/service/help_center/pay/', 'pcpid']);" data-stat-id="2109aae4f55e7716" rel="nofollow" href="http://www.#/service/help_center/pay/" target="_blank">支付方式</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-fdf4464071458ade', '//www.#/service/help_center/delivery/', 'pcpid']);" data-stat-id="fdf4464071458ade" rel="nofollow" href="http://www.#/service/help_center/delivery/" target="_blank">配送方式</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-8e282b6f669ba990', '//www.#/service/exchange', 'pcpid']);" data-stat-id="8e282b6f669ba990" rel="nofollow" href="http://www.#/service/exchange" target="_blank">售后政策</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-5f2408ab3c808aa2', 'http://fuwu.#/', 'pcpid']);" data-stat-id="5f2408ab3c808aa2" rel="nofollow" href="http://fuwu.#/" target="_blank">自助服务</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-18c340c920a278a1', 'http://xiazai.#/', 'pcpid']);" data-stat-id="18c340c920a278a1" rel="nofollow" href="http://xiazai.#/" target="_blank">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>小米之家</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-b27b566974e4aa67', '//www.#/c/xiaomizhijia/', 'pcpid']);" data-stat-id="b27b566974e4aa67" rel="nofollow" href="http://www.#/c/xiaomizhijia/" target="_blank">小米之家</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-bdb16d6645c388ac', '//www.#/c/service/poststation/', 'pcpid']);" data-stat-id="bdb16d6645c388ac" rel="nofollow" href="http://www.#/c/service/poststation/" target="_blank">服务网点</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-443642eacd664bd9', 'http://service.order.#/mihome/index', 'pcpid']);" data-stat-id="443642eacd664bd9" rel="nofollow" href="http://service.order.#/mihome/index" target="_blank">预约服务</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小米</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-f6d386c65b1f4132', '//www.#/about', 'pcpid']);" data-stat-id="f6d386c65b1f4132" rel="nofollow" href="http://www.#/about" target="_blank">了解小米</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-4307a445f5592adb', 'http://hr.xiaomi.com/', 'pcpid']);" data-stat-id="4307a445f5592adb" rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">加入小米</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-6842e821365ee45d', '//www.#/about/contact', 'pcpid']);" data-stat-id="6842e821365ee45d" rel="nofollow" href="http://www.#/about/contact" target="_blank">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-464883aa6e799290', 'http://e.weibo.com/xiaomishouji', 'pcpid']);" data-stat-id="464883aa6e799290" rel="nofollow" href="http://e.weibo.com/xiaomishouji" target="_blank">新浪微博</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-78fdefa9dee561b5', 'http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat', 'pcpid']);" data-stat-id="78fdefa9dee561b5" rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank">小米部落</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-47539f6570f0da90', '#J_modalWeixin', 'pcpid']);" data-stat-id="47539f6570f0da90" rel="nofollow" href="#J_modalWeixin" data-toggle="modal">官方微信</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>特色服务</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-fdc16dd51892a164', '//order.#/queue/f2code', 'pcpid']);" data-stat-id="fdc16dd51892a164" rel="nofollow" href="http://order.#/queue/f2code" target="_blank">F 码通道</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-99876c8aaf8ef0a4', '//www.#/mimobile/', 'pcpid']);" data-stat-id="99876c8aaf8ef0a4" rel="nofollow" href="http://www.#/mimobile/" target="_blank">小米移动</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-b08be6bd51351e1a', '//order.#/misc/checkitem', 'pcpid']);" data-stat-id="b08be6bd51351e1a" rel="nofollow" href="http://order.#/misc/checkitem" target="_blank">防伪查询</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-a7642f0a3475d686', '//www.#/service/contact', 'pcpid']);" data-stat-id="a7642f0a3475d686" rel="nofollow" class="btn btn-line-primary btn-small" href="http://www.#/service/contact" target="_blank"><i class="iconfont"></i> 24小时在线客服</a>            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <span class="logo ir">小米官网</span>
        <div class="info-text">
            <p>小米旗下网站：<a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-4fb589dbb54f257a', '//www.#/index.html', 'pcpid']);" data-stat-id="4fb589dbb54f257a" href="http://www.#/index.html" target="_blank">小米网</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-ed2a0e25c8b0ca2f', 'http://www.miui.com/', 'pcpid']);" data-stat-id="ed2a0e25c8b0ca2f" href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-826b32c1478a98d5', 'http://www.miliao.com/', 'pcpid']);" data-stat-id="826b32c1478a98d5" href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-c9d2af1ad828a834', 'http://www.duokan.com/', 'pcpid']);" data-stat-id="c9d2af1ad828a834" href="http://www.duokan.com/" target="_blank">多看书城</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-96f1a8cecc909af2', 'http://www.miwifi.com/', 'pcpid']);" data-stat-id="96f1a8cecc909af2" href="http://www.miwifi.com/" target="_blank">小米路由器</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-347f6dd0d8d9fda3', 'http://call.#/', 'pcpid']);" data-stat-id="347f6dd0d8d9fda3" href="http://call.#/" target="_blank">视频电话</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-4ad42379062eda19', 'http://blog.xiaomi.com/', 'pcpid']);" data-stat-id="4ad42379062eda19" href="http://blog.xiaomi.com/" target="_blank">小米后院</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-dfe0fac59cfb15d9', 'http://xiaomi.tmall.com/', 'pcpid']);" data-stat-id="dfe0fac59cfb15d9" href="http://xiaomi.tmall.com/" target="_blank">小米天猫店</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-c2613d0d3b77ddff', 'http://shop115048570.taobao.com', 'pcpid']);" data-stat-id="c2613d0d3b77ddff" href="http://shop115048570.taobao.com/" target="_blank">小米淘宝直营店</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-2f48f953961c637d', 'http://union.#/', 'pcpid']);" data-stat-id="2f48f953961c637d" href="http://union.#/" target="_blank">小米网盟</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-6479cd2d041bcf04', '//static.#/feedback/', 'pcpid']);" data-stat-id="6479cd2d041bcf04" href="http://static.#/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-9db137a8e0d5b3dd', '#J_modal-globalSites', 'pcpid']);" data-stat-id="9db137a8e0d5b3dd" href="#J_modal-globalSites" data-toggle="modal" target="_blank">Select Region</a>            </p>
            <p>©<a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-836cacd9ca5b75dd', '//www.#/', 'pcpid']);" data-stat-id="836cacd9ca5b75dd" href="http://www.#/" target="_blank" title="#">#</a> 京ICP证110507号 京ICP备10046444号 <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-57efc92272d4336b', 'http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134', 'pcpid']);" data-stat-id="57efc92272d4336b" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank">京公网安备11010802020134号 </a><a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-c5f81675b79eb130', '//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg', 'pcpid']);" data-stat-id="c5f81675b79eb130" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank">京网文[2014]0059-0009号</a>
 违法和不良信息举报电话：185-0130-1238</p>
        </div>
        <div class="info-links">
                    <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-9e1604cd6612205c', 'https://search.szfw.org/cert/l/CX20120926001783002010', 'pcpid']);" data-stat-id="9e1604cd6612205c" href="https://search.szfw.org/cert/l/CX20120926001783002010" target="_blank"><img src="../Common/Public/confirm/v-logo-2.png" alt="诚信网站"></a>
                    <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-3e1533699f264eac', 'https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082', 'pcpid']);" data-stat-id="3e1533699f264eac" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082" target="_blank"><img src="../Common/Public/confirm/v-logo-1.png" alt="可信网站"></a>
                    <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-b085e50c7ec83104', 'http://www.315online.com.cn/member/315140007.html', 'pcpid']);" data-stat-id="b085e50c7ec83104" href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img src="../Common/Public/confirm/v-logo-3.png" alt="网上交易保障中心"></a>
        
        </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>

<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
        <div class="modal-hd">
            <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-cfd3189b8a874ba4', '', 'pcpid']);" data-stat-id="cfd3189b8a874ba4" class="close" data-dismiss="modal"><i class="iconfont"></i></a>
            <h3>小米手机官方微信二维码</h3>
        </div>
        <div class="modal-bd">
            <p style="margin: 0 0 10px;">打开微信，点击右上角的“+”，选择“扫一扫”功能，<br>对准下方二维码即可。</p>
            <img alt="" src="../Common/Public/confirm/qr.png" height="375" width="375">
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
            <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-c148a4197491d5bd', '', 'pcpid']);" data-stat-id="c148a4197491d5bd" class="btn btn-primary" id="J_bigtapRetry">重试</a>
        </p>
    </div>
</div>
<!-- .xm-dm-error END -->
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
       <div class="modal-hd">
            <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-d63900908fde14b1', '', 'pcpid']);" data-stat-id="d63900908fde14b1" class="close" data-dismiss="modal"><i class="iconfont"></i></a>
            <h3>Select Region</h3>
        </div>
        <div class="modal-bd">
            <h3>Welcome to Mi.com</h3>
            <p class="modal-globalSites-tips">Please select your country or region</p>
            <p class="modal-globalSites-links clearfix">
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-51fe807618ae85f4', '//www.#/index.html', 'pcpid']);" data-stat-id="51fe807618ae85f4" href="http://www.#/index.html">Mainland China</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-d8e4264197de1747', 'http://www.#/hk/', 'pcpid']);" data-stat-id="d8e4264197de1747" href="http://www.#/hk/">Hong Kong</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-e7bd0f4e372c0b29', 'http://www.#/tw/', 'pcpid']);" data-stat-id="e7bd0f4e372c0b29" href="http://www.#/tw/">TaiWan</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-e9c0506f7e4e7161', 'http://www.#/sg/', 'pcpid']);" data-stat-id="e9c0506f7e4e7161" href="http://www.#/sg/">Singapore</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-d6299ad30ec761a8', 'http://www.#/my/', 'pcpid']);" data-stat-id="d6299ad30ec761a8" href="http://www.#/my/">Malaysia</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-22b601cf7b3ada84', 'http://www.#/ph/', 'pcpid']);" data-stat-id="22b601cf7b3ada84" href="http://www.#/ph/">Philippines</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-441d26d4571e10dc', 'http://www.#/in/', 'pcpid']);" data-stat-id="441d26d4571e10dc" href="http://www.#/in/">India</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-88ccf9755c488ec5', 'http://www.#/id/', 'pcpid']);" data-stat-id="88ccf9755c488ec5" href="http://www.#/id/">Indonesia</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-c41d871bf5ddcd95', 'http://br.#/', 'pcpid']);" data-stat-id="c41d871bf5ddcd95" href="http://br.#/">Brasil</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-4426c5dac474df5f', 'http://www.#/en/', 'pcpid']);" data-stat-id="4426c5dac474df5f" href="http://www.#/en/">Global Home</a>
                <a onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-261bb8cf155fb56b', 'http://www.#/mena/', 'pcpid']);" data-stat-id="261bb8cf155fb56b" href="http://www.#/mena/"> MENA</a>
            </p>
        </div>
    </div>
<!-- .modal-globalSites END -->


</body></html>
