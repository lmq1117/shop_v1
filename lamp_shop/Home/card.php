<?php
    //包含初始化文件
    require './init.php'; 

    //查看购物车 需要用户登录状态
    if(empty($_SESSION['userInfo']))
    {
        header('location:./login.php');exit;
    }

    
    //显示
?>
<!DOCTYPE html>
<html xml:lang="zh-CN" lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<title>我的购物车——小米手机官网</title>
<meta name="viewport" content="width=1226">
<link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Common/Public/card/base.css">
<link rel="stylesheet" type="text/css" href="../Common/Public/card/cart.css">
<script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f4006c1551f77f22', '//www.#/index.html', 'pcpid']);" data-stat-id="f4006c1551f77f22" class="logo ir" href="./index.php" title="小米官网">小米官网</a>
        </div>
        <div class="header-title has-more" id="J_miniHeaderTitle"><h2>我的购物车</h2><p>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p></div>
        <div class="topbar-info" id="J_userInfo">


            <?php if(empty($_SESSION['userInfo'])): ?>
            <a href="./login.php" data-stat-id="bf3aa4c80c0ac789" class="link" data-needlogin="true">登录</a><span class="sep">|</span><a  data-stat-id="749b1369201c13fb" class="link" href="./register.php">注册</a>        
            <?php else: ?>
                <?= $_SESSION['userInfo']['name'];?> <span class="sep">|</span> <a  data-stat-id="749b1369201c13fb" class="link" href="./action.php?handler=logout">退出</a>
            <?php endif;?>




  
        </div>
    </div>
</div>

<div class="page-main">

    <div class="container">
        <div class="cart-loading loading hide" id="J_cartLoading">
            <div class="loader"></div>
        </div>
        <div class="cart-empty hide" id="J_cartEmpty">
            <h2>您的购物车还是空的！</h2>
            <p class="login-desc">登录后将显示您之前加入的商品</p>
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-7874490dbcbc1e60', '#', 'pcpid']);" data-stat-id="7874490dbcbc1e60" href="#" class="btn btn-primary btn-login" id="J_loginBtn">立即登录</a>
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4658a7dfd89505fc', '//list.#/0', 'pcpid']);" data-stat-id="4658a7dfd89505fc" href="http://list.#/0" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
        </div>
        <div id="J_cartBox" class="">
            <div class="cart-goods-list">
                <div class="list-head clearfix">
                    <div class="col col-check"><i class="iconfont icon-checkbox icon-checkbox-selected" id="J_selectAll">√</i>全选</div>
                    <div class="col col-img">&nbsp;</div>
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price">单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total">小计</div>
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body" id="J_cartListBody">   
                    <div class="item-box"> 
                        <!-- 购物车商品遍历到这里 -->
                        <?php 
                            $totalNum = 0;
                            $totalPrice = 0;
                        ?>
                        <?php if(!empty($_SESSION['card'])): ?>
	                        <?php foreach($_SESSION['card'] as $key => $val):?>
	                        <div class="item-table J_cartGoods" data-info="{ commodity_id:'1160800006', gettype:'buy', itemid:'2160800006_0_buy', num:'1'} "> 
	                            <div class="item-row clearfix"> <div class="col col-check">  <i class="iconfont icon-checkbox icon-checkbox-selected J_itemCheckbox" data-itemid="2160800006_0_buy" data-status="1">√</i>  
	                            </div> 
	                            <div class="col col-img">  <a href="./detail.php?id=<?= $key;?>" target="_blank"> <img alt="" src="../Common/Public/images/commodity/<?= $val['picture'];?>" height="80" width="80"> </a>  </div> 
	                            <div class="col col-name">  
	                                <div class="tags">   </div>  
	                                <h3 class="name">  <a href="./detail.php?id=<?= $key;?>" target="_blank"><?= $val['name'];?></a>  </h3>
	                            </div> 
	                            <div class="col col-price"> <?= $val['price'];?>元 </div> <div class="col col-num">  
	                            <div class="change-goods-num clearfix J_changeGoodsNum"> <a href="./action.php?handler=reducenum&id=<?= $val['id'];?>&num=<?= $val['num'];?>" class="J_minus"><i class="iconfont"></i></a> <input tyep="text" name="2160800006_0_buy" value="<?= $val['num'];?>" data-num="1" data-buylimit="20" autocomplete="off" class="goods-num J_goodsNum"> <a href="./action.php?handler=addnum&id=<?= $val['id'];?>&num=<?= $val['num'];?>" class="J_plus"><i class="iconfont"></i></a>  </div>  </div> 
	                            <div class="col col-total"> <?= ($val['price'] * $val['num']);//单价乘以数量?>元 <p class="pre-info">  </p> </div> 
	                            <div class="col col-action"> <a id="2160800006_0_buy" data-msg="确定删除吗？" href="./action.php?handler=deleteitem&id=<?= $val['id'];?>" title="删除" class="del J_delGoods"><i class="iconfont"></i></a> </div> 
	                            </div> 
	                        </div>
	                        <?php
	                            $totalNum += $val['num'];
                                $totalPrice += $val['num'] * $val['price'];
                                //将总价，总商品数量写入SESSION
	                            $_SESSION['totalPrice'] = $totalPrice;
	         	                $_SESSION['totalNum'] = $totalNum;                   
	                        ?>

	                        <?php endforeach;?>
	                    <?php else: ?>
							<h2 style="margin-left: 10px;">购物车里什么也没有，赶快去挑选你喜欢的商品吧</h2>
							<meta http-equiv="refresh" content="3;url=./index.php">

	                    <?php endif; ?>
                        <!-- 购物车商品遍历到这里 -->       
                    </div>      
                </div>
            </div>


            <div class="cart-bar clearfix" id="J_cartBar">
                <div class="section-left">
                    <a data-stat-id="3d1e5bdd191768c8" href="./index.php" class="back-shopping J_goShoping">继续购物</a>
                    <span class="cart-total">共 <i id="J_cartTotalNum"><?= $totalNum;?></i> 件商品，已选择 <i id="J_selTotalNum"><?= $totalNum;?></i> 件</span>
                    <span class="cart-coudan hide" id="J_coudanTip">
                        ，还需 <i id="J_postFreeBalance">121</i> 元即可免邮费  <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-69b06f1a9d2d512c', 'javascript:void(0);', 'pcpid']);" data-stat-id="69b06f1a9d2d512c" href="javascript:void(0);" id="J_showCoudan">立即凑单</a>
                    </span>
                </div>
                <span class="activity-money hide">
                    活动优惠：减 <i id="J_cartActivityMoney">0</i> 元
                </span>
                <span class="total-price">
                    合计（不含运费）：<em id="J_cartTotalPrice"><?= $totalPrice;?></em>元
                </span>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f975aeb3e19f0f37', 'javascript:void(0);', 'pcpid']);" data-stat-id="f975aeb3e19f0f37" href="./confirm.php????" class="btn btn-a btn btn-primary" id="J_goCheckout">去结算</a>

                <div class="no-select-tip hide" id="J_noSelectTip">
                    请勾选需要结算的商品
                    <i class="arrow arrow-a"></i>
                    <i class="arrow arrow-b"></i>
                </div>
            </div>
        </div>

      
    </div>
</div>

<!-- 商品列表 模板 -->


<!-- 活动商品 -->


<!-- 加价购 -->




<!-- 凑单 -->


<!-- 礼物 -->


<!-- 过期、售罄商品 模版 -->



<!-- 删除开放购买商品提示 -->
<div class="modal fade modal-hide  modal-alert" id="J_modalAlert">
    <div class="modal-bd">
        <div class="text">
            <h3 id="J_alertMsg"></h3>
        </div>
        <div class="actions">
            <button class="btn btn-gray" data-dismiss="modal" id="J_alertCancel">取消</button>
            <button class="btn btn-primary" data-dismiss="modal" id="J_alertOk">确定</button>
        </div>
        <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9cce544f88fddc4d', 'javascript:void(0);', 'pcpid']);" data-stat-id="9cce544f88fddc4d" class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
</div>


<!--结算提示 -->

<!-- 保险弹窗 -->
<!-- 保险弹窗 -->
<div class="modal fade in modal-hide modal-baoxian" id="J_baoxian">
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
                <dd>· 本保障服务目前仅适用于小米手机/平板用户。</dd>
                <dd>· 本保障服务自您收到设备起生效，有效期为一年，若您在收到设备7日内需要取消保障服务，请连同设备一起申请退货。</dd>
                <dd>· 故意行为导致的设备损坏以及盗窃、抢劫、遗失设备等不在服务保障范围内（具体以小米意外保障服务条款为准）。<br>
                    <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-bbe4cc973798c9b1', '//cart.#/static/insuranceAgreement.php', 'pcpid']);" data-stat-id="bbe4cc973798c9b1" href="http://cart.#/static/insuranceAgreement.php?type=" target="_blank" class="J_baoxianMore">了解《小米意外保障服务》详细条款&gt;</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="modal-footer clearfix">
        <p>
            <span class="J_baoxianAgree"><i class="iconfont icon-checkbox">√</i> 我已经阅读并同意</span>《<a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-af8203aaabe128b0', '//cart.#/static/insuranceAgreement.php', 'pcpid']);" data-stat-id="af8203aaabe128b0" href="http://cart.#/static/insuranceAgreement.php?type=" target="_blank" class="J_baoxianMore">小米意外保障服务条款</a>》
        </p>
        <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-a7880a1d650986e4', '', 'pcpid']);" data-stat-id="a7880a1d650986e4" class="btn btn-primary J_buyBaoxian">确认并购买服务</a>
    </div>
</div>


<!-- 电视挂架弹窗 -->
<div class="modal fade in modal-hide modal-guajia" id="J_modalGuajia">
    <div class="modal-header">
        <h3>预约电视挂架安装服务</h3>
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
    </div>
    <div class="modal-body">
        <h4>购买须知：</h4>
        <ol class="icon-list clearfix">
            <li>本服务采用线上预约，安装时工作人员上门收费的服务模式。</li>
            <li>确认预约之后，工作人员将在商品（小米电视）到货后的3个工作日内，与您取得联系并上门安装。</li>
            <li>具体安装台数请与小米工作人员沟通。</li>
            <li>往返距离大于30公里的上门服务属于远程服务，对超出30公里的路程部分收取远程费，收费标准为1元/公里。</li>
            <li style="color: #ff6700">为了确保您的权益，请核实为您提供服务的工程师工牌信息，如有疑问现场拨打400-100-5678电话进行确认。</li>
        </ol>
        <table>
            <caption>
                材料费用：
            </caption>
            <thead>
                <tr>
                    <th class="th-1">
                        附件名称
                    </th>
                    <th class="th-2">
                        使用说明
                    </th>
                    <th class="th-3">
                        价格
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        小米电视壁挂架
                    </td>
                    <td>
                        用于墙面挂装，由小米授权服务商进行安装
                    </td>
                    <td>
                        99元
                    </td>
                </tr>
                <tr>
                    <td>
                        小米电视主机/条形音响挂架
                    </td>
                    <td>
                        用于墙面挂装，由小米授权服务商进行安装
                    </td>
                    <td>
                        80元
                    </td>
                </tr>
            </tbody>
        </table>

       
        <table>
            <caption>小米电视安装服务费标准</caption>
            <thead>
                <tr>
                    <th rowspan="2" colspan="2" width="50%">机型</th>
                    <th colspan="3">安装类型</th>
                </tr>
                <tr>
                    <th>挂装</th>
                    <th>座装</th>
                    <th>移机</th>
                </tr>
            </thead>
            <tbody>
             <tr>
                <td rowspan="2">一体电视 / 分体屏幕</td>
                <td>≤60 吋</td>
                <td>100元/台</td>
                <td>100元/台</td>
                <td>100元/台</td>
            </tr>
            <tr>
                <td>61-70 吋</td>
                <td>200元/台</td>
                <td>200元/台</td>
                <td>200元/台</td>
            </tr>
            <tr>
                <td rowspan="3">附件 / 商品</td>
                <td>小米电视主机</td>
                <td>50元/台</td>
                <td>50元/台</td>
                <td>50元/台</td>
            </tr>
            <tr>
                <td>小米 soundbar</td>
                <td>50元/台</td>
                <td>50元/台</td>
                <td>50元/台</td>
            </tr>
            <tr>
                <td>小米低音炮</td>
                <td>－－</td>
                <td>50元/台</td>
                <td>50元/台</td>
            </tr>
            </tbody>
        </table>

        <dl>
            <dt>如何计算费用：</dt>
            <dd>如网点到您家里单程22公里，需要安装电视挂装</dd>
            <dd>总计费用：手工费（100元）+挂架材料费（99元）+路程补贴 （22*2-30=14元）=213元</dd>
            <dd>*网点到家往返超出30公里，需另外收取1元/公里的远程服务费</dd>
        </dl>
        <p>
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2f2752dd70aa94be', 'http://bbs.xiaomi.cn/thread/index/tid/11435552', 'pcpid']);" data-stat-id="2f2752dd70aa94be" href="http://bbs.xiaomi.cn/thread/index/tid/11435552" target="_blank">了解更多细则&gt;</a>
        </p>
    </div>
    <div class="modal-footer clearfix">
        <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f1134d3619b6ab4c', '', 'pcpid']);" data-stat-id="f1134d3619b6ab4c" class="btn btn-primary J_buyGuaJia">确认预约</a>
    </div>
</div>
<!-- 净水器或水龙头安装服务 -->
<div class="modal fade in modal-hide modal-water-install" id="J_modalWaterInstall">
    <div class="modal-header">
        <h3>预约小米净水器或水龙头安装服务</h3>
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
    </div>
    <div class="modal-body">
        <h4>购买须知：</h4>
        <ol class="icon-list clearfix">
            <li>本服务采用线上预约，安装时工作人员采取上门收费的服务形式。</li>
            <li>确认预约之后，工作人员将在商品（小米净水器）出库后（订单可查询）的3个工作日内，与您取得联系并上门安装。</li>
            <li>同一次上门安装小米净水器和不锈钢无铅水龙头，只收取一次安装人工费用（50元/台）。</li>
            <li>往返距离大于30公里的上门服务属于远程服务,对超出30公里的路程部分收取远程费,收费标准为1元/公里。</li>
            <li style="color: #ff6700">为了确保您的权益，请核实为您提供服务的工程师工牌信息，如有疑问现场拨打400-100-5678电话进行确认。</li>
        </ol>
        <p>
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-7acb93f147ed4870', 'http://bbs.xiaomi.cn/t-11515570', 'pcpid']);" data-stat-id="7acb93f147ed4870" href="http://bbs.xiaomi.cn/t-11515570" target="_blank">了解更多细则 &gt;</a>
        </p>
        <table>
            <caption>
                收费标准：
            </caption>
            <thead>
                <tr>
                    <th>
                        项目名称
                    </th>
                    <th>
                        安装人工费用
                    </th>
                    <th>
                        材料费用
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        安装小米净水器
                    </td>
                    <td>
                        50元/台
                    </td>
                    <td>
                        －－
                    </td>
                </tr>
                <tr>
                    <td>
                        安装不锈钢无铅水龙头
                    </td>
                    <td>
                        50元/台
                    </td>
                    <td>
                        240元
                    </td>
                </tr>
            </tbody>
        </table>

        <p>温馨提示：如果您无需更换水龙头，自己动手就可以完成净水器安装哦。<a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-684f3996556aafe0', '//www.#/water/gallery/', 'pcpid']);" data-stat-id="684f3996556aafe0" href="http://www.#/water/gallery/?showInstall" target="_blank">参考安装演示 »</a></p>
    </div>
    <div class="modal-footer clearfix">
        <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-effd269afea217cb', '', 'pcpid']);" data-stat-id="effd269afea217cb" class="btn btn-primary J_buyWaterInstall">确认预约</a>
    </div>
</div>
<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-da46b3d5586757a4', '//www.#/service/exchange#repaire', 'pcpid']);" data-stat-id="da46b3d5586757a4" rel="nofollow" href="http://www.#/service/exchange#repaire" target="_blank"><i class="iconfont"></i>1小时快修服务</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-78babcae8a619e26', '//www.#/service/exchange#back', 'pcpid']);" data-stat-id="78babcae8a619e26" rel="nofollow" href="http://www.#/service/exchange#back" target="_blank"><i class="iconfont"></i>7天无理由退货</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d1745f68f8d2dad7', '//www.#/service/exchange#free', 'pcpid']);" data-stat-id="d1745f68f8d2dad7" rel="nofollow" href="http://www.#/service/exchange#free" target="_blank"><i class="iconfont"></i>15天免费换货</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f1b5c2451cf73123', '//www.#/service/exchange#mail', 'pcpid']);" data-stat-id="f1b5c2451cf73123" rel="nofollow" href="http://www.#/service/exchange#mail" target="_blank"><i class="iconfont"></i>满150元包邮</a></li>
                            <li><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-caf836ab93cdfd31', '//www.#/c/service/poststation/', 'pcpid']);" data-stat-id="caf836ab93cdfd31" rel="nofollow" href="http://www.#/c/service/poststation/" target="_blank"><i class="iconfont"></i>520余家售后网点</a></li>
                        </ul>
        </div>
        <div class="footer-links clearfix">
            
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2458d0d93e3f7386', '//www.#/service/help_center/guide/', 'pcpid']);" data-stat-id="2458d0d93e3f7386" rel="nofollow" href="http://www.#/service/help_center/guide/" target="_blank">购物指南</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2109aae4f55e7716', '//www.#/service/help_center/pay/', 'pcpid']);" data-stat-id="2109aae4f55e7716" rel="nofollow" href="http://www.#/service/help_center/pay/" target="_blank">支付方式</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-fdf4464071458ade', '//www.#/service/help_center/delivery/', 'pcpid']);" data-stat-id="fdf4464071458ade" rel="nofollow" href="http://www.#/service/help_center/delivery/" target="_blank">配送方式</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-8e282b6f669ba990', '//www.#/service/exchange', 'pcpid']);" data-stat-id="8e282b6f669ba990" rel="nofollow" href="http://www.#/service/exchange" target="_blank">售后政策</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-5f2408ab3c808aa2', 'http://fuwu.#/', 'pcpid']);" data-stat-id="5f2408ab3c808aa2" rel="nofollow" href="http://fuwu.#/" target="_blank">自助服务</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-18c340c920a278a1', 'http://xiazai.#/', 'pcpid']);" data-stat-id="18c340c920a278a1" rel="nofollow" href="http://xiazai.#/" target="_blank">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>小米之家</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b27b566974e4aa67', '//www.#/c/xiaomizhijia/', 'pcpid']);" data-stat-id="b27b566974e4aa67" rel="nofollow" href="http://www.#/c/xiaomizhijia/" target="_blank">小米之家</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-bdb16d6645c388ac', '//www.#/c/service/poststation/', 'pcpid']);" data-stat-id="bdb16d6645c388ac" rel="nofollow" href="http://www.#/c/service/poststation/" target="_blank">服务网点</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-443642eacd664bd9', 'http://service.order.#/mihome/index', 'pcpid']);" data-stat-id="443642eacd664bd9" rel="nofollow" href="http://service.order.#/mihome/index" target="_blank">预约服务</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小米</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f6d386c65b1f4132', '//www.#/about', 'pcpid']);" data-stat-id="f6d386c65b1f4132" rel="nofollow" href="http://www.#/about" target="_blank">了解小米</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4307a445f5592adb', 'http://hr.xiaomi.com/', 'pcpid']);" data-stat-id="4307a445f5592adb" rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">加入小米</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-6842e821365ee45d', '//www.#/about/contact', 'pcpid']);" data-stat-id="6842e821365ee45d" rel="nofollow" href="http://www.#/about/contact" target="_blank">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-464883aa6e799290', 'http://e.weibo.com/xiaomishouji', 'pcpid']);" data-stat-id="464883aa6e799290" rel="nofollow" href="http://e.weibo.com/xiaomishouji" target="_blank">新浪微博</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-78fdefa9dee561b5', 'http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat', 'pcpid']);" data-stat-id="78fdefa9dee561b5" rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank">小米部落</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-47539f6570f0da90', '#J_modalWeixin', 'pcpid']);" data-stat-id="47539f6570f0da90" rel="nofollow" href="#J_modalWeixin" data-toggle="modal">官方微信</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>特色服务</dt>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-fdc16dd51892a164', '//order.#/queue/f2code', 'pcpid']);" data-stat-id="fdc16dd51892a164" rel="nofollow" href="http://order.#/queue/f2code" target="_blank">F 码通道</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-99876c8aaf8ef0a4', '//www.#/mimobile/', 'pcpid']);" data-stat-id="99876c8aaf8ef0a4" rel="nofollow" href="http://www.#/mimobile/" target="_blank">小米移动</a></dd>
                
                <dd><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b08be6bd51351e1a', '//order.#/misc/checkitem', 'pcpid']);" data-stat-id="b08be6bd51351e1a" rel="nofollow" href="http://order.#/misc/checkitem" target="_blank">防伪查询</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-a7642f0a3475d686', '//www.#/service/contact', 'pcpid']);" data-stat-id="a7642f0a3475d686" rel="nofollow" class="btn btn-line-primary btn-small" href="http://www.#/service/contact" target="_blank"><i class="iconfont"></i> 24小时在线客服</a>            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <div class="logo ir">小米官网</div>
        <div class="info-text">
            <p class="sites"><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4fb589dbb54f257a', '//www.#/index.html', 'pcpid']);" data-stat-id="4fb589dbb54f257a" href="http://www.#/index.html" target="_blank">小米网</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-ed2a0e25c8b0ca2f', 'http://www.miui.com/', 'pcpid']);" data-stat-id="ed2a0e25c8b0ca2f" href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-826b32c1478a98d5', 'http://www.miliao.com/', 'pcpid']);" data-stat-id="826b32c1478a98d5" href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c9d2af1ad828a834', 'http://www.duokan.com/', 'pcpid']);" data-stat-id="c9d2af1ad828a834" href="http://www.duokan.com/" target="_blank">多看书城</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-96f1a8cecc909af2', 'http://www.miwifi.com/', 'pcpid']);" data-stat-id="96f1a8cecc909af2" href="http://www.miwifi.com/" target="_blank">小米路由器</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-347f6dd0d8d9fda3', 'http://call.#/', 'pcpid']);" data-stat-id="347f6dd0d8d9fda3" href="http://call.#/" target="_blank">视频电话</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4ad42379062eda19', 'http://blog.xiaomi.com/', 'pcpid']);" data-stat-id="4ad42379062eda19" href="http://blog.xiaomi.com/" target="_blank">小米后院</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-dfe0fac59cfb15d9', 'http://xiaomi.tmall.com/', 'pcpid']);" data-stat-id="dfe0fac59cfb15d9" href="http://xiaomi.tmall.com/" target="_blank">小米天猫店</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c2613d0d3b77ddff', 'http://shop115048570.taobao.com', 'pcpid']);" data-stat-id="c2613d0d3b77ddff" href="http://shop115048570.taobao.com/" target="_blank">小米淘宝直营店</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2f48f953961c637d', 'http://union.#/', 'pcpid']);" data-stat-id="2f48f953961c637d" href="http://union.#/" target="_blank">小米网盟</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-6479cd2d041bcf04', '//static.#/feedback/', 'pcpid']);" data-stat-id="6479cd2d041bcf04" href="http://static.#/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9db137a8e0d5b3dd', '#J_modal-globalSites', 'pcpid']);" data-stat-id="9db137a8e0d5b3dd" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>            </p>
            <p>©<a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-836cacd9ca5b75dd', '//www.#/', 'pcpid']);" data-stat-id="836cacd9ca5b75dd" href="http://www.#/" target="_blank" title="#">#</a> 京ICP证110507号 京ICP备10046444号 <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-57efc92272d4336b', 'http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134', 'pcpid']);" data-stat-id="57efc92272d4336b" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank">京公网安备11010802020134号 </a><a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c5f81675b79eb130', '//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg', 'pcpid']);" data-stat-id="c5f81675b79eb130" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank">京网文[2014]0059-0009号</a>
 违法和不良信息举报电话：185-0130-1238</p>
        </div>
        <div class="info-links">
                    <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9e1604cd6612205c', 'https://search.szfw.org/cert/l/CX20120926001783002010', 'pcpid']);" data-stat-id="9e1604cd6612205c" href="https://search.szfw.org/cert/l/CX20120926001783002010" target="_blank"><img src="../Common/Public/card/v-logo-2.png" alt="诚信网站"></a>
                    <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-3e1533699f264eac', 'https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082', 'pcpid']);" data-stat-id="3e1533699f264eac" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082" target="_blank"><img src="../Common/Public/card/v-logo-1.png" alt="可信网站"></a>
                    <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b085e50c7ec83104', 'http://www.315online.com.cn/member/315140007.html', 'pcpid']);" data-stat-id="b085e50c7ec83104" href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img src="../Common/Public/card/v-logo-3.png" alt="网上交易保障中心"></a>
                </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>
<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
        <div class="modal-hd">
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-cfd3189b8a874ba4', '', 'pcpid']);" data-stat-id="cfd3189b8a874ba4" class="close" data-dismiss="modal"><i class="iconfont"></i></a>
            <h3>小米手机官方微信二维码</h3>
        </div>
        <div class="modal-bd">
            <p style="margin: 0 0 10px;">打开微信，点击右上角的“+”，选择“扫一扫”功能，<br>对准下方二维码即可。</p>
            <img alt="" src="../Common/Public/card/qr.png" height="375" width="375">
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
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c148a4197491d5bd', '', 'pcpid']);" data-stat-id="c148a4197491d5bd" class="btn btn-primary" id="J_bigtapRetry">重试</a>
        </p>
    </div>
</div>
<!-- .xm-dm-error END -->
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
       <div class="modal-hd">
            <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d63900908fde14b1', '', 'pcpid']);" data-stat-id="d63900908fde14b1" class="close" data-dismiss="modal"><i class="iconfont"></i></a>
            <h3>Select Region</h3>
        </div>
        <div class="modal-bd">
            <h3>Welcome to Mi.com</h3>
            <p class="modal-globalSites-tips">Please select your country or region</p>
            <p class="modal-globalSites-links clearfix">
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-51fe807618ae85f4', '//www.#/index.html', 'pcpid']);" data-stat-id="51fe807618ae85f4" href="http://www.#/index.html">Mainland China</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d8e4264197de1747', 'http://www.#/hk/', 'pcpid']);" data-stat-id="d8e4264197de1747" href="http://www.#/hk/">Hong Kong</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-e7bd0f4e372c0b29', 'http://www.#/tw/', 'pcpid']);" data-stat-id="e7bd0f4e372c0b29" href="http://www.#/tw/">TaiWan</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-e9c0506f7e4e7161', 'http://www.#/sg/', 'pcpid']);" data-stat-id="e9c0506f7e4e7161" href="http://www.#/sg/">Singapore</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d6299ad30ec761a8', 'http://www.#/my/', 'pcpid']);" data-stat-id="d6299ad30ec761a8" href="http://www.#/my/">Malaysia</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-22b601cf7b3ada84', 'http://www.#/ph/', 'pcpid']);" data-stat-id="22b601cf7b3ada84" href="http://www.#/ph/">Philippines</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-441d26d4571e10dc', 'http://www.#/in/', 'pcpid']);" data-stat-id="441d26d4571e10dc" href="http://www.#/in/">India</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-88ccf9755c488ec5', 'http://www.#/id/', 'pcpid']);" data-stat-id="88ccf9755c488ec5" href="http://www.#/id/">Indonesia</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c41d871bf5ddcd95', 'http://br.#/', 'pcpid']);" data-stat-id="c41d871bf5ddcd95" href="http://br.#/">Brasil</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4426c5dac474df5f', 'http://www.#/en/', 'pcpid']);" data-stat-id="4426c5dac474df5f" href="http://www.#/en/">Global Home</a>
                <a onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-261bb8cf155fb56b', 'http://www.#/mena/', 'pcpid']);" data-stat-id="261bb8cf155fb56b" href="http://www.#/mena/"> MENA</a>
            </p>
        </div>
    </div>
<!-- .modal-globalSites END -->



  <div class="modal fade modal-hide modal-choose-pro J_modalRaisebuy J_carouselContainer" id="J_choosePro-1896" data-isadd="true"> <div class="modal-header"> <span class="close" data-dismiss="modal"><i class="iconfont"></i></span> <h3>选择产品</h3> </div> <div class="modal-body"> <ul class="clearfix list J_chooseProList  J_carouselList ">    <li class="span4" data-gid="2153000001-0-1-1896" data-num="0" data-maxnum="" data-pid="2153000001" data-actid="1896">  <img disabled="" data-src="//i1.mifile.cn/a1/T1b.K_Bj_T1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">多彩便携USB线 120cm 橙色</p> <p class="g-price">12.9元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2153000002-0-1-1896" data-num="0" data-maxnum="" data-pid="2153000002" data-actid="1896">  <img disabled="" data-src="//i1.mifile.cn/a1/T1YlxjBKbT1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">多彩便携USB线 120cm 蓝色</p> <p class="g-price">12.9元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2153000003-0-1-1896" data-num="0" data-maxnum="" data-pid="2153000003" data-actid="1896">  <img disabled="" data-src="//i1.mifile.cn/a1/T1hgWjBCbT1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">多彩便携USB线 120cm 绿色</p> <p class="g-price">12.9元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2153000004-0-1-1896" data-num="0" data-maxnum="" data-pid="2153000004" data-actid="1896">  <img disabled="" data-src="//i1.mifile.cn/a1/T1uMLjBCKT1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">多彩便携USB线 120cm 玫红</p> <p class="g-price">12.9元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2153200003-0-1-1896" data-num="0" data-maxnum="" data-pid="2153200003" data-actid="1896">  <img disabled="" data-src="//i1.mifile.cn/a1/T1lQZjB4dT1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">多彩便携USB线 120cm 灰色</p> <p class="g-price">12.9元</p> <i class="icon-radio"></i> </li>   </ul> </div> <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-gray btn-disable J_chooseProBtn" data-actid="1896" data-type="1">加入购物车</a> </div> </div>  <div class="modal fade modal-hide modal-choose-pro J_modalRaisebuy J_carouselContainer" id="J_choosePro-1699" data-isadd="true"> <div class="modal-header"> <span class="close" data-dismiss="modal"><i class="iconfont"></i></span> <h3>选择产品</h3> </div> <div class="modal-body"> <ul class="clearfix list J_chooseProList ">    <li class="span4" data-gid="2154000009-0-1-1699" data-num="0" data-maxnum="" data-pid="2154000009" data-actid="1699">  <img disabled="" data-src="//i1.mifile.cn/a1/T17xJvBbET1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">ZONOKI 中锘基运动蓝牙耳机 黑蓝</p> <p class="g-price">108元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2154000010-0-1-1699" data-num="0" data-maxnum="" data-pid="2154000010" data-actid="1699">  <img disabled="" data-src="//i1.mifile.cn/a1/T1SbbvB4Wv1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">ZONOKI 中锘基运动蓝牙耳机 活力橙</p> <p class="g-price">108元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2154000011-0-1-1699" data-num="0" data-maxnum="" data-pid="2154000011" data-actid="1699">  <img disabled="" data-src="//i1.mifile.cn/a1/T1tph_BbCT1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">ZONOKI 中锘基运动蓝牙耳机 青春蓝</p> <p class="g-price">108元</p> <i class="icon-radio"></i> </li>   </ul> </div> <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-gray btn-disable J_chooseProBtn" data-actid="1699" data-type="1">加入购物车</a> </div> </div>  <div class="modal fade modal-hide modal-choose-pro J_modalRaisebuy J_carouselContainer" id="J_choosePro-1497" data-isadd="true"> <div class="modal-header"> <span class="close" data-dismiss="modal"><i class="iconfont"></i></span> <h3>选择产品</h3> </div> <div class="modal-body"> <ul class="clearfix list J_chooseProList ">    <li class="span4" data-gid="2135200033-0-1-1497" data-num="0" data-maxnum="" data-pid="2135200033" data-actid="1497">  <img disabled="" data-src="//i1.mifile.cn/a1/T1zL_vByCT1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">小米随身WIFI 黑色</p> <p class="g-price">17.9元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2140800026-0-1-1497" data-num="0" data-maxnum="" data-pid="2140800026" data-actid="1497">  <img disabled="" data-src="//i1.mifile.cn/a1/T14o_TBvDv1RXrhCrK!220x220.jpg" alt="" height="220" width="220"> <p class="g-name">小米随身WIFI 白色</p> <p class="g-price">17.9元</p> <i class="icon-radio"></i> </li>   </ul> </div> <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-gray btn-disable J_chooseProBtn" data-actid="1497" data-type="1">加入购物车</a> </div> </div> </body></html>
