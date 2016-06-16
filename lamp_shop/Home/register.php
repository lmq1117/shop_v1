<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
		<title>小米帐号 - 注册</title>

		<link type="text/css" rel="stylesheet" href="../Common/Public/register/reset.css">
		<link type="text/css" rel="stylesheet" href="../Common/Public/register/layout.css">

		<link type="text/css" rel="stylesheet" href="../Common/Public/register/registerpwd.css">

	
</head>





<div class="wrapper">
    <div class="wrap">
        <div class="layout">
            <div class="n-frame device-frame reg_frame" id="main_container">
                <div class="external_logo_area"><a class="milogo" href="javascript:void(0)"></a></div>
                <div class="title-item t_c">
                    <h4 class="title_big30">注册小米帐号</h4>
                    <div class="regbox"></div>
                    <div class="step3 email_step2">
                    	<form action="./action.php?handler=register" method="post">
                            <div class="inputbg">
                              <label class="labelbox" for=""><input class="set-password" name="name" placeholder="请输入用户名" type="text"></label>
                            </div>

                            <div class="inputbg">
                              <label class="labelbox" for=""><input class="set-password" name="pass" data-error=".error-password" placeholder="请输入密码" type="password"></label>
                            </div>

                            <div class="inputbg">
                              <label class="labelbox" for=""><input name="repass" data-error=".error-password" data-repeat=".set-password" placeholder="请输入确认密码" type="password"></label>
                            </div>
                            <div class="err_tip pwd_tip error-password" style="display:block;">
                              <div class="dis_box"><em class="icon_error"></em><span data-origin="密码长度8~16位，数字、字母、字符至少包含两种">密码长度8~16位，数字、字母、字符至少包含两种</span></div>
                            </div>
                            <div class="inputbg inputcode dis_box">
                              <label style="margin-left: -5px;" class="labelbox" for="" style="margin-left:-78px;"><input class="code" name="yzm" autocomplete="off" placeholder="图片验证码" type="text"></label>
                              <img style="margin-bottom: -13px;margin-left: 5px;" src="../Common/yzm.php" onclick="this.src='../Common/yzm.php?'+Math.random()" alt="图片验证码" class="icode_image code-image" title="看不清换一张">
                            </div>
                            <div class="err_tip">
                              <div class="dis_box"><em class="icon_error"></em><span></span></div>
                            </div>
                          <div class="fixed_bot mar_mail_dis2">
                          <input class="btn332 btn_reg_1  submit-step" value="提交" type="submit">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="n-footer">
    <div class="nf-link-area clearfix">
        <ul class="lang-select-list">
            <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_CN">简体</a>|</li>
            <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_TW">繁体</a>|</li>
            <li><a class="lang-select-li" href="javascript:void(0)" data-lang="en">English</a></li>

            |<li><a class="a_critical" href="http://static.account.xiaomi.com/html/faq/faqList.html" target="_blank"><em></em>常见问题</a></li>

        </ul>
    </div>
    <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank"><span></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>





</body></html>