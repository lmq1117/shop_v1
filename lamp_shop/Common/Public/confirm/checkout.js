!function(e){function t(o){if(a[o])return a[o].exports;var i=a[o]={exports:{},id:o,loaded:!1};return e[o].call(i.exports,i,i.exports,t),i.loaded=!0,i.exports}var a={};return t.m=e,t.c=a,t.p="",t(0)}([function(e,t,a){e.exports=a(1)},function(e,t,a){a(2),a(3),a(4),MI.checkout=function(){function e(e){if(e.length){var t={};return t.address_id=e.attr("data-address_id"),t.consignee=e.attr("data-consignee"),t.tel=e.attr("data-tel"),t.province_id=e.attr("data-province_id"),t.province_name=e.attr("data-province_name"),t.city_id=e.attr("data-city_id"),t.city_name=e.attr("data-city_name"),t.district_id=e.attr("data-district_id"),t.district_name=e.attr("data-district_name"),t.area=e.attr("data-area")?e.attr("data-area"):"",t.address=e.attr("data-address"),t.tag_name=e.attr("data-tag_name")?e.attr("data-tag_name"):"",t}}function t(e,t){if(e&&t){var a=$('.J_addressItem[data-address_id="'+e+'"]');a.attr({"data-consignee":t.uname,"data-tel":t.phone,"data-province_id":t.province,"data-province_name":t.provinceName,"data-city_id":t.city,"data-city_name":t.cityName,"data-district_id":t.county,"data-district_name":t.countyName,"data-address":t.address,"data-tag_name":t.tag}),a.find(".uname").text(t.uname),a.find(".tag").text(t.tag),a.find(".utel").html(t.phone),a.find(".uaddress").html(t.provinceName+" "+t.cityName+" "+t.countyName+"<br>"+t.address),a.trigger("click")}}function a(){checkoutConfig&&checkoutConfig.invoice&&$.each(checkoutConfig.invoice,function(e,t){var a=$('.J_option[data-invoice-type="'+t.type+'"]');a.length&&(a.removeClass("hide"),a.attr("data-value",t.value),(1===t.value||2===t.value)&&$("#J_paperInvoice").removeClass("hide"),t.checked&&((1===t.value||2===t.value)&&$("#J_paperInvoice").trigger("click"),a.trigger("click")))})}function o(){$(".J_option").each(function(){var e=$(this).hasClass("selected");if(e){var t=$(this).attr("data-type"),a=$(this).attr("data-value");if(!t)return;w.checkoutData[t]=a}}),f()}function i(e){if(w.checkoutData.address){var t="";t+=w.checkoutData.address.consignee+" "+w.checkoutData.address.tel,t+="<br>"+w.checkoutData.address.province_name+" "+w.checkoutData.address.city_name+" ",t+=w.checkoutData.address.district_name+" "+w.checkoutData.address.address+" ",checkoutConfig.hasPresales&&$("#J_yushouAddress").html(t),checkoutConfig.hasGiftcard&&($("#J_lipinUserName").html(w.checkoutData.address.consignee),$("#J_lipinUserPhone").html(w.checkoutData.address.tel),$("#J_lipinUserAddress").html(w.checkoutData.address.province_name+" "+w.checkoutData.address.city_name+" "+w.checkoutData.address.district_name+" "+w.checkoutData.address.address+" ")),e||(t+='<a href="javascript:void(0);" class="modify J_modify">修改</a>'),$("#J_confirmAddress").html(t).removeClass("hide"),!checkoutConfig.hasBigTv&&!checkoutConfig.hasAir||checkoutConfig.hasEvent||s(w.checkoutData.address.city_id,w.checkoutData.address.district_id)}}function c(e,t){if(e){var a=w.urls.editAddress;"new"===e?a+="?bts="+w.bts+"&action="+e+"&address_match="+checkoutConfig.addressMatch+"&hastv="+checkoutConfig.hasBigTv:"edit"===e&&w.checkoutData.address&&(a+="?id="+w.checkoutData.address.address_id+"&area="+w.checkoutData.address.area+"&bts="+w.bts+"&action="+e+"&address_match="+checkoutConfig.addressMatch+"&hastv="+checkoutConfig.hasBigTv);var o=t?$(t):$("#J_addressList").find(".selected");$("#J_modalEditAddress").on("show.bs.modal",function(){$(this).css({top:o.offset().top-10,left:o.offset().left-33}),$(this).find("iframe").attr("src",a)}).modal({show:!0,backdrop:"static"}).removeClass("hide").on("hide.bs.modal",function(){$(this).find("iframe").removeAttr("src")})}}function n(e){var t=doT.template($("#J_newAddressTemplate").html()),a=t(e);$(".J_addressItem").eq(0).length?$(".J_addressItem").eq(0).before(a):$("#J_newAddress").before(a),$(".J_addressItem").eq(0).trigger("click")}function r(){var e=(new Date).getTime();$.ajax({type:"POST",url:w.urls.getPayment+"?v"+e,dataType:"json",data:{region_id:w.checkoutData.address.city_id,pay_id:w.checkoutData.pay,invoice_type:w.checkoutData.invoice,invoice_title:w.checkoutData.invoiceTitle?w.checkoutData.invoiceTitle:"",quick_order:checkoutConfig.quickOrder},timeout:1e4,error:function(){D.tipMsg("网络超时，请刷新重试！")},success:function(e){e&&1===e.code?d(e.data):D.tipMsg(e.msg)}})}function s(e,t){if(e&&t){var a=w.urls.subscribe;$.ajax({url:w.urls.bigProStatus,type:"get",dataType:"jsonp",jsonp:"jsonpcallback",data:{cityId:e,countyId:t},timeout:1e4,error:function(){},success:function(e){if(e&&1===e.code){var t="*";$.each(e.data,function(e,a){1===a.isOutStock&&(t+=a.product_name+", ")}),a+=e.data[0].product_id,t+="该地区暂时缺货";var o="<a href="+a+' target="_blank">登记到货提醒 &gt;</a>';$(".J_confirmBigProTip").html(t).removeClass("hide");var i=$("#J_addressList").find(".selected").offset();$("#J_popBigProTip").html("<p>"+t+"</p>"+o).removeClass("hide").css({top:i.top+202,left:i.left}),checkoutConfig.bigProStatus=0,$("#J_checkoutToPay").addClass("btn-gray").removeClass("btn-primary").html("暂时缺货").val("暂时缺货")}else $(".J_confirmBigProTip").html("").addClass("hide"),checkoutConfig.bigProStatus=1,$("#J_checkoutToPay").addClass("btn-primary").removeClass("btn-gray").html("立即下单").val("立即下单"),$("#J_popBigProTip").html("").addClass("hide").css({top:0,left:0})}})}}function d(e){if(e){checkoutConfig.invoice=e.invoice,a();var t=$('.J_option[data-type="pay"]').parent(".J_optionList"),i="";t.html(""),$.each(e.paylist,function(e,a){i=a.checked?"selected":"","1"===a.pay_id&&(a.brief+=" <span>（支持支付宝、银联、财付通、小米支付等）</span>"),t.append('<li data-type="pay" class="J_option '+i+'" data-value="'+a.pay_id+'">'+a.brief+"</li>")});var c=$('.J_option[data-type="shipment"]').parent(".J_optionList");c.html("");var n="",r=!1;$.each(e.shipmentlist,function(e,t){i=t.checked?"selected":"",t.list&&t.list.length>0&&(n='<p class="hide">温馨提示：预计 '+t.list[0].tips_day+" 天后可去米家自提，具体时间以短信通知为准，记得携带有效证件哦<br/>米家地址："+t.list[0].address+"<br/>联系电话："+t.list[0].tel+"<br/>营业时间："+t.list[0].officeTime+"</p>",n+='<input type="hidden" name="Checkout[pickup_id]" value="'+t.list[0].home_id+'" />',r=!0),e>=1&&c.addClass("options-list"),c.append('<li data-type="shipment" class="J_option '+i+'" data-amount="'+t.amount+'" data-value="'+t.shipment_id+'">'+t.brief+n+"</li>")}),w.serveiceSelf&&!r?(c.find(".J_option").removeClass("selected"),w.checkoutData.shipment=null,w.serveiceSelf=!1,$("#J_serviceSelfTip").html("").hide(),$(".section-time").show()):w.serveiceSelf&&r&&c.find('.J_option[data-value="25"]').addClass("selected").siblings().removeClass("selected"),o()}}function l(){$("#J_useCoupon").on("click",function(){$("#J_couponBox").removeClass("hide").find(".J_tabSwitch > li").eq(0).trigger("click")}),$(".J_couponCancel").on("click",function(){$("#J_couponBox").addClass("hide")}),$("#J_couponList").find("li").on("click",function(){$(this).addClass("selected").siblings().removeClass("selected")}),$("#J_useCouponCode").on("click",function(){var e=$.trim($("#coupon_code").val()),t=/^\d{16,}$/;return t.test(e)?void u(e,"yes"):void $("#coupon_code").trigger("error",["优惠券码不正确"])}),$("#J_useSelectedCoupon").on("click",function(){var e=$("#J_couponList").find(".selected").attr("data-id");e||D.tipMsg("请选择优惠券"),u(e,"no")}),$("#J_changeConpon").on("click",function(){p(),$("#J_useCoupon").trigger("click")}),$("#J_couponList").find("li").length>0&&"1"===$("#J_couponList").find("li").eq(0).attr("data-choose")&&($("#J_couponList").find("li").eq(0).trigger("click"),$("#J_useSelectedCoupon").trigger("click"))}function u(e,t){e&&t&&$.ajax({type:"POST",url:w.urls.coupon,dataType:"json",data:{cardtype:t,value:e,pay_id:w.checkoutData.pay},timeout:1e4,error:function(){},success:function(a){a&&1===a.code?(w.couponInfo.type=t,w.couponInfo.val=e,w.couponInfo.data=a.data,h(a.data),J()):D.tipMsg(a.msg)}})}function h(e){e&&($("#J_couponBox").addClass("hide"),w.couponInfo.couponPostFree=e.postFree?!0:!1,w.couponInfo.postage=parseInt(e.shipment_expense),w.couponInfo.couponPrice=parseFloat(e.replaceMoney),w.couponInfo.couponPrice>0&&$("#J_couponVal").html("-"+w.couponInfo.couponPrice),checkoutConfig.postage=parseFloat(e.shipment_expense),w.couponInfo.title=e.title,$("#J_useCoupon").addClass("hide"),$("#J_couponTitle").html(e.title).parent().removeClass("hide"),m())}function p(){w.couponInfo={couponPrice:0,couponPostFree:!1,title:""},$("#J_useCoupon").removeClass("hide"),$("#J_couponTitle").html("").parent().addClass("hide"),$("#J_couponVal").html("-0"),f(),J(),m()}function f(){w.selfService="6"===w.checkoutData.pay?!0:!1;var e=0;$('.J_option[data-type="shipment"]').each(function(){return $(this).hasClass("selected")?(e=parseFloat($(this).attr("data-amount")),"25"===$(this).attr("data-value")?(w.serveiceSelf=!0,$("#J_serviceSelfTip").html($(this).find("p").html()).show(),$(".section-time").hide()):(w.serveiceSelf=!1,$("#J_serviceSelfTip").html("").hide(),$(".section-time").show()),!1):void 0}),0===e?w.postFree=!0:checkoutConfig.postage=e,m()}function m(){var e=checkoutConfig.postage,t=checkoutConfig.totalPrice-w.couponInfo.couponPrice;checkoutConfig.hasBigPro||(w.postFree=t<checkoutConfig.bcPrice?!1:!0),(w.couponInfo.couponPostFree||checkoutConfig.postFree||w.postFree||w.selfService)&&(e=0),w.couponInfo.postage&&(e=w.couponInfo.postage),w.serveiceSelf&&(e=0),t+=e,t-=w.ecardAmount,checkoutConfig.subsidyPrice>0&&(t-=checkoutConfig.subsidyPrice),0>t&&(t=0),$("#J_totalPrice").html(parseFloat(t).toFixed(2)),$("#J_postageVal").html(e)}function g(){$(".J_raiseBuyItem").on("click",function(e){var t=D.parseJson($(this).attr("data-info")),a=$(this).hasClass("selected");$(e.target).hasClass("warning")||a||("true"===t.isBatch?_("#J_choosePro-"+t.actId,$(this)):($(this).attr({"data-productid":t.productId,"data-itemid":t.itemid}),v(t.goodsId,t.actId,t.type,$(this))))}),$(".J_raiseBuyItem").on("click",".J_del",function(){var e=$(this).parent().parent(),t=D.parseJson(e.attr("data-info")),a=e.attr("data-del-itemid")?e.attr("data-del-itemid"):t.itemid+"_"+t.productId;a&&k(a,e)})}function v(e,t,a,o){var i=MI.GLOBAL_CONFIG.cartSite+"/cart/addCartActivity.php",c={itemid:o.attr("data-itemid"),productid:o.attr("data-productid")};$.ajax({url:i,dataType:"jsonp",data:"id="+e+"&promotion_id="+t+"&promotion_type="+a+"&api=1",jsonp:"jsonpcallback",timeout:1e4,error:function(){D.tipMsg("网络请求超时")},success:function(e){1===e.code?(o.attr("data-del-itemid",c.itemid+"_"+c.productid),o.addClass("selected"),J()):D.tipMsg(e.message)}})}function _(e,t){if(!e||!$(e).length||!t)return!1;var a=$(e),o=a.find(".J_chooseProList"),i=a.find(".J_chooseProBtn"),c=a.attr("data-isadd")||!1,n=a.attr("data-isgift")||!1,r=o.find("li").length;a.addClass("modal-choose-pro-"+r),a.on("shown.bs.modal",function(){$(".modal-backdrop").addClass("modal-backdrop-dark")}).modal({backdrop:"static",show:!0}).removeClass("hide").on("hide.bs.modal",function(){}),o.children("li").on("click",function(){$(this).addClass("selected").siblings().removeClass("selected");var e=$(this).attr("data-gid");i.attr("href","/cart/add/"+e).removeClass("btn-disable").addClass("btn-primary")}),i.off().on("click",function(){if($(this).hasClass("btn-disable"))return!1;var e=o.find(".selected").attr("data-gid"),i=o.find(".selected").attr("data-productid");if("true"===c&&o.find('[data-isbuy="true"]').length>0){e="";var r=!0,s=0;o.find('[data-isbuy="true"]').each(function(){var t=$(this).attr("data-pid"),a=$(this).attr("data-num"),o=$(this).attr("data-actid");$(this).hasClass("selected")&&(a=parseInt(a)+1,r=!1),e+=(s>0?"_":"")+t+"-0-"+a+"-"+o,s+=1}),r&&(e+="_"+o.find(".selected").attr("data-gid"))}if("true"===c||"true"===n){var d=$(this).attr("data-actid"),l=$(this).attr("data-type"),u=D.parseJson(t.attr("data-info"));t.attr({"data-productid":i,"data-itemid":u.itemid}),v(e,d,l,t)}return a.modal("hide"),!1})}function k(e,t){return e&&t?void $.ajax({dataType:"jsonp",url:MI.GLOBAL_CONFIG.cartSite+"/cart/delete/"+e+"?_v="+Math.random(),jsonp:"jsonpcallback",cache:"false",success:function(e){1===e.code?(t.removeClass("selected"),J()):D.tipMsg(e.msg)}}):!1}function C(){var e=$(".J_showBaoxian"),t="selected",a="",o=null;e.on("click",function(){var e=$(this).hasClass(t),i=$(this).attr("data-count"),c=$(this).attr("data-agreementurl");return $(".J_buyBaoxian").html("确认并购买服务"+i+"份"),$(".J_baoxianMore").attr("href",c),e?(o=null,a="",!1):(a=$(this).attr("data-goodsid")+"?parent_itemId="+$(this).attr("data-parent_itemid"),o=$(this),void $("#J_baoxian").modal({backdrop:"static",show:!0}).removeClass("hide").on("hide.bs.modal",function(){$(".J_baoxianAgree").removeClass("selected")}))}),e.on("click",".J_del",function(){var e=$(this).parent().parent(),t=e.attr("data-itemid");t&&k(t,e)}),$(".J_baoxianAgree").on("click",function(){$(this).toggleClass("selected")}),$(".J_buyBaoxian").on("click",function(){var e=$(".J_baoxianAgree").hasClass("selected");e===!0?(MI.addShopCart(a,function(e,a){1===e.code?(a.addClass(t),J()):D.tipMsg(e.message)},o),$("#J_baoxian").modal("hide").addClass("hide")):alert("请先阅读并同意《小米手机意外保障服务》！")})}function J(e,t){var a={ecard:M.config.selCardId.join(","),coupon_code:w.couponInfo.val?w.couponInfo.val:"",coupon_type:w.couponInfo.type?w.couponInfo.type:""};a=$.extend(a,e),$.ajax({type:"POST",url:w.urls.update+"?v"+Math.random(),dataType:"json",data:a,timeout:1e4,error:function(){D.tipMsg("抱歉！网络错误，请刷新重试！")},success:function(e){e&&1===e.code?(y(e.data),e.data.baoxianItems&&b(e.data.baoxianItems),w.checkoutData.address&&$("#J_addressList").find(".selected").trigger("click"),M.checkEcardResult(e.data)):6000011===e.code?M.revertEcardResult():6000009===e.code&&"ecard"===t?(D.tipMsg("您的订单中未包含小米手机产品，无法使用手机换新券"),M.toggleLoading(!1)):("ecard"===t&&M.toggleLoading(!1),D.tipMsg(e.msg))}})}function y(e){var t=doT.template($("#J_checkoutGoodsTemplate").html()),a=t(e.items);$("#J_goodsList").html(a);var o=doT.template($("#J_checkoutMoneyTemplate").html()),i=o(e);$("#J_moneyBox").html(i),checkoutConfig.totalPrice=e.productMoney-e.activityDiscountMoney,w.couponInfo.data?h(w.couponInfo.data):m()}function b(e){return e?void $.each(e,function(e,t){var a=$(".J_showBaoxian[data-parent_itemid="+t.parent_itemId+"]");a.length&&a.attr("data-itemid",t.itemId)}):!1}function I(){if(!w.checkoutData.address||!w.checkoutData.address.address_id)return D.tipMsg("请选择地址！"),void D.docScroll(".checkout-box");if(!w.checkoutData.shipment)return void D.tipMsg("请选择配送方式！");var e={address_id:w.checkoutData.address.address_id,pay_id:w.checkoutData.pay,best_time:w.checkoutData.time,invoice_type:w.checkoutData.invoice,shipment_id:w.checkoutData.shipment,pickup_id:"",coupons_value:w.couponInfo.val?w.couponInfo.val:"",coupons_type:w.couponInfo.type?w.couponInfo.type:""};if("2"===w.checkoutData.invoice&&w.checkoutData.invoiceTitle)e.invoice_title=w.checkoutData.invoiceTitle;else if("2"===w.checkoutData.invoice)return D.tipMsg("请输入发票抬头！"),$("#invoice_title").trigger("blur"),void D.docScroll(".section-invoice");if("1"===checkoutConfig.showCaptcha){var t=$("#J_captchaToken").val(),a=$.trim($("#captcha_code").val());if(!a||!t)return D.tipMsg("请输入验证码"),$("#captcha_code").trigger("blur"),!1;e.captcha_code=a,e.captcha_token=t}if(checkoutConfig.hasGiftcard===!0&&!w.giftCardChecked)return $("#J_lipinTip").modal({backdrop:"static",show:!0}).removeClass("hide"),!1;if(checkoutConfig.hasPresales===!0&&!w.persalesChecked)return $("#J_yushouTip").modal({backdrop:"static",show:!0}).removeClass("hide"),!1;w.serveiceSelf&&(e.pickup_id=$('input[name="Checkout[pickup_id]"]').val()),w.ecard&&(e.ecard=w.ecard.id,e.sms_token=w.ecard.smsToken);var o=$.cookie("miUserRiskToken")||"";$.ajax({type:"POST",url:w.urls.submitUrl+"?"+Math.random(),dataType:"json",data:{Checkout:e,risk_token:o,quick_order:checkoutConfig.quickOrder},timeout:1e4,error:function(){},success:function(e){e&&1===e.code?(w.checkoutData.orderId=e.data.order_id,location.href=w.urls.confirm+"?id="+e.data.order_id):e.data.items&&e.data.items.length?S(e):D.tipMsg(e.msg)}})}function S(e){if(e){$("#J_modalTipGoods").remove();var t=doT.template($("#J_tipGoodsTemplate").html()),a=t(e);$("body").append(a),e.data.items&&e.data.items.length>3&&$("#J_tipGoodskList").carousel({itemPerSlide:3,containerSelector:"#J_modalTipGoods",controlsSelector:".modal-bd",controls:!0,pager:!1}),$("#J_modalTipGoods").modal({backdrop:"static",show:!0})}}function T(){$("#J_captchaBox").removeClass("hide").show();var e="//captcha.hd.mi.com/captcha?style=chinese&service=order.mi.com&sessionId=0";$("#J_captchaChange").on("click",function(){$("#J_captchaImg").attr("src",e+Math.random())});var t=function(){$("#captcha_code").trigger("error",["请输入正确验证码"]),$("#J_captchaChange").trigger("click")};$("#captcha_code").on("blur",function(){var e=$.trim($(this).val()),a=$(this).attr("data-authurl"),o=a.replace("{answer}",e);e?$.ajax({type:"post",url:o+"&v="+Math.random(),dataType:"jsonp",jsonp:"callback",timeout:1e4,error:function(){D.tipMsg("抱歉！验证码验证失败，请刷新页面重试!")},success:function(e){e.data&&e.data.result&&e.data.result===!0&&e.data.token?$("#J_captchaToken").val(e.data.token):t()}}):t()})}function x(){var t=$(".J_addressItem").eq(0),a=!1,o=0,i=function(e){$("#J_addressTopCon").html('<span class="uname">'+e.consignee+'</span><span class="utel">'+e.tel+"</span> "+e.province_name+" "+e.city_name+" "+e.district_name+" "+e.address),$("#J_addressTopBar").addClass("address-top-bar-active")};$(window).on("scroll",function(){if(o=$(this).scrollTop(),!w.checkoutData.address&&t.length&&o>500&&!a){var c=e(t);a=!0,i(c)}else 500>o&&(a=!1,$("#J_addressTopBar").removeClass("address-top-bar-active"))}),$("#J_addressTopBarBtn").on("click",function(){$("html, body").animate({scrollTop:0},500),t.trigger("click")})}var w={selectedCla:"selected",checkoutData:{},couponInfo:{couponPrice:0},ecardAmount:0,postFree:!1,selfService:!1,urls:{editAddress:MI.GLOBAL_CONFIG.orderSite+"/address/add.php",getPayment:MI.GLOBAL_CONFIG.orderSite+"/buy/getRegionPayment.php",submitUrl:MI.GLOBAL_CONFIG.orderSite+"/buy/submit",bigProStatus:MI.GLOBAL_CONFIG.orderSite+"/api/checkTvAddressStock.php",subscribe:MI.GLOBAL_CONFIG.orderSite+"/misc/subscribe/goods/",confirm:MI.GLOBAL_CONFIG.orderSite+"/buy/confirm",coupon:MI.GLOBAL_CONFIG.orderSite+"/buy/validateCoupon.php",update:MI.GLOBAL_CONFIG.orderSite+"/buy/checkoutAjax.php"}};window.getUserTiskToken=function(){return $.cookie("miUserRiskToken")||""},window.editAddressCallback={save:function(e,a,o){1===e.code?($("#J_modalEditAddress").modal("hide"),"edit"===a?t(e.data.address_id,o):"new"===a&&(o.address_id=e.data.address_id,n(o))):D.tipMsg(e.msg)},cancel:function(){$("#J_modalEditAddress").modal("hide")},getAddress:function(){return w.checkoutData.address}};var M={config:{captchaUrl:"//captcha.hd.mi.com/captcha?style=chinese&service=order.mi.com&sessionId=0",smsUrl:MI.GLOBAL_CONFIG.orderSite+"/ecard/sendSms.php?r=",checkSmsUrl:MI.GLOBAL_CONFIG.orderSite+"/ecard/checkSms.php?r=",bindUrl:MI.GLOBAL_CONFIG.orderSite+"/ecard/postBind.php?r=",listUrl:MI.GLOBAL_CONFIG.orderSite+"/ecard/getUsableList.php?r=",smsToken:null,ecardData:null,selEcard:null,selCardId:[],cardType:"recycle"},init:function(){var e=this;$("#J_useEcard").on("click",function(){return e.config.ecardResultShow&&"recycle"===e.config.cardType?(D.tipMsg("手机换新券不能和礼品卡同时使用！"),!1):(e.showBox($(this)),!1)}),$("#J_useRecycle").on("click",function(){return e.config.ecardResultShow&&"normal"===e.config.cardType?(D.tipMsg("礼品卡不能和手机换新券同时使用！"),!1):(e.showBox($(this)),!1)}),$(".J_ecardCancel, .J_recycleCancel").on("click",function(){return e.hideBox().trigger("hide.checkout"),!1}),$("#ecard_password").formatter({formatPattern:[5,5,5,5],maxlength:23}),$("#J_useSelEcard, #J_useSelRecycle").on("click",function(){return e.config.selCardId.length&&e.sendSms(),!1}),$("#J_checkEcardSms").on("click",function(){return e.checkSms(),!1}),$("#J_cancelEcardSms").on("click",function(){return $("#J_ecardSmsBox").addClass("hide"),"normal"===e.config.cardType?$("#J_ecardList").removeClass("hide"):$("#J_recycleList").removeClass("hide"),!1}),$("#J_bindEcard").on("click",function(){return e.checkCaptcha(),!1}),$("#J_ecardCaptchaImg").on("click",function(){$(this).attr("src",e.config.captchaUrl+"&r="+Math.random())}),$("#J_ecardBox").on("hide.checkout",function(){e.config.selCardId.length&&e.revertEcard()}),$("#J_ecardQa").on("click",function(){$("#J_ecardQaDetail").toggleClass("hide")}),e.getList()},showBox:function(e){var t=this,a=$(e);if(a){var o=$("#J_ecardBox"),i=a.attr("data-type"),c={normal:"100px",recycle:"100px"},n=$("#J_recycleBox");t.config.cardType=i,o.css({top:c[i]}).removeClass("hide"),"normal"===i?(o.find(".J_tabSwitch").removeClass("hide").find("li").eq(0).trigger("click"),o.find(".tab-container").removeClass("hide"),n.addClass("hide")):"recycle"===i&&(o.find(".J_tabSwitch, .tab-container").addClass("hide"),n.removeClass("hide"),$("#J_recycleList").removeClass("hide"));var r=$('<div class="modal-backdrop J_ecardBackdrop" />');r.css({width:"100%",height:$("body").height(),"z-index":"100"}),$("body").append(r),t.getList(),$("#J_ecardCaptchaImg").trigger("click"),t.setEcardInfo()}},hideBox:function(){var e=this;return $("#J_ecardBox").addClass("hide"),$(".J_ecardBackdrop").remove(),e.revertInput(),$("#J_ecardBox")},revertEcard:function(){var e=this;e.config.selCardId=[],e.config.smsToken=null,e.config.bindCardId=null,w.ecardAmount=0,J()},revertEcardResult:function(){var e=this;e.config.ecardResultShow?($("#J_useEcard").removeClass("hide"),$("#J_ecardResult").addClass("hide"),$("#J_ecardVal").html("0元"),w.ecard={},e.config.ecardResultShow=!1,e.revertEcard()):(e.toggleLoading(!1),D.tipMsg("您的订单中没有可以用礼品卡抵扣的商品"))},setEcardInfo:function(){var e=checkoutConfig.postage;(w.couponInfo.couponPostFree||checkoutConfig.postFree||w.postFree||w.selfService)&&(e=0),w.couponInfo.postage&&(e=w.couponInfo.postage),w.serveiceSelf&&(e=0);var t=this,a=checkoutConfig.totalPrice+e-w.ecardAmount-w.couponInfo.couponPrice,o=$("#J_ecardInfo"),i="礼品卡",c='<span class="tip">（暂不支持抵扣运费、意外保、电话卡等）</span>';"recycle"===t.config.cardType&&(o=$("#J_recycleInfo"),i="手机换新券"),o.html(w.ecardAmount>0&&a>0?"已选择"+i+" <span>"+w.ecardAmount+"元</span>，还需支付 <span>"+a.toFixed(2)+"元</span>"+c:w.ecardAmount>0?"已选择"+i+" <span>"+w.ecardAmount+"元</span>":"未选择"+i+"，还需支付 <span>"+a.toFixed(2)+"元</span>"+c)},toggleLoading:function(e){var t=$("#J_ecardBox").find(".loading");e?t.removeClass("hide"):t.addClass("hide")},getList:function(){var e=this;$.ajax({type:"POST",url:e.config.listUrl+Math.random(),dataType:"json",data:{bts:w.bts,card_type:e.config.cardType},timeout:1e4,error:function(){D.tipMsg("抱歉！网络错误，请刷新重试！")},success:function(t){1===t.code?(e.config.ecardData=t.data.data,e.formatList()):D.tipMsg(t.msg)}})},formatList:function(){var e=this;if(e.config.ecardData){if(e.toggleLoading(!1),!e.config.ecardData.length&&"normal"===e.config.cardType)return void $("#J_ecardEmpty").removeClass("hide");e.config.ecardData.length&&"recycle"===e.config.cardType&&$("#J_useRecycle").removeClass("hide");var t=doT.template($("#J_ecardTemplate").html()),a=t({data:e.config.ecardData,type:e.config.cardType});"normal"===e.config.cardType?($("#J_ecardEmpty").addClass("hide"),$("#J_ecardList").html(a).parent().removeClass("hide")):"recycle"===e.config.cardType&&$("#J_recycleList").removeClass("hide").html(a).parent().removeClass("hide"),e.config.bindCardId&&(e.checkCard($('.J_ecardItem[data-id="'+e.config.bindCardId+'"]')),e.config.bindCardId=null),$(".J_ecardCheckbox").on("click",function(){var t=$(this).parents("tr"),a=t.hasClass("disabled");a||e.checkCard(t)})}},checkCard:function(e){if(e){var t=this,a=$(e),o="selected",i=a.attr("data-id"),c=a.hasClass(o),n="";if(c){var r=$.inArray(i,t.config.selCardId);t.config.selCardId.splice(r,1),n=t.config.selCardId.length?t.config.selCardId.join(","):""}else n=t.config.selCardId.length?t.config.selCardId.join(",")+","+i:i;t.toggleLoading(!0),J({ecard:n},"ecard")}},checkEcardResult:function(e){if(e){var t,a=this,o=parseFloat(e.need_pay_amount)-checkoutConfig.postage>0?!0:!1;if(w.ecardAmount=e.ecards.ecard_amount,m(),a.toggleLoading(!1),a.setEcardInfo(),"recycle"===a.config.cardType&&$("#J_ecardMoneyLabel").html("手机换新券："),e.ecards.ecard_amount>0){if(a.config.selCardId=[],$(".J_ecardItem").each(function(){$(this).removeClass("selected disabled");var e=$(this).attr("data-balance");$(this).find(".J_income").html("0"),$(this).find(".J_balance").html(e)}),$.each(e.ecards.details,function(e,o){t=$('.J_ecardItem[data-id="'+o.card_id+'"]'),t.addClass("selected"),t.find(".J_income").html(Math.abs(o.income)),t.find(".J_balance").html(o.new_balance),a.config.selCardId.push(o.card_id)}),!o){var i=null;$(".J_ecardItem").each(function(){i=$(this).hasClass("selected"),i||$(this).addClass("disabled")})}}else a.formatList();a.config.ecardResultShow&&a.setEcardResult()}},sendSms:function(){var e=this;e.toggleLoading(!0),$("#ecard_sms").trigger("valid").parent().removeClass("form-section-active");var t="ecard_check";"recycle"===e.config.cardType&&(t="huanxin_check"),$.ajax({type:"POST",url:e.config.smsUrl+Math.random(),dataType:"json",data:{sms_action:t,bts:w.bts,sms_token:e.config.smsToken?e.config.smsToken:""},timeout:1e4,error:function(){D.tipMsg("抱歉！网络错误，请刷新重试！")},success:function(t){if(e.toggleLoading(!1),t&&1===t.code){if(t.data.safe_mobile){$("#J_ecardMobile").html("（"+t.data.safe_mobile+"）"),"normal"===e.config.cardType?$("#J_ecardList").addClass("hide"):"recycle"===e.config.cardType&&$("#J_recycleList").addClass("hide"),$("#J_ecardSmsBox").removeClass("hide");var a,o=$("#J_smsCountdown"),i=$("#J_repeatSms"),c=$("#J_smsCountdown").find("i"),n=60;o.removeClass("hide"),i.addClass("hide"),c.html(n),a=setInterval(function(){return 0>=n?(o.addClass("hide"),i.removeClass("hide").one("click",function(){return e.sendSms(),!1}),void clearInterval(a)):(n-=1,void c.html(n))},1e3)}}else 500311===t.code?e.setEcardResult():D.tipMsg(t.msg)}})},checkSms:function(){var e=this,t=$("#ecard_sms"),a=$.trim(t.val()),o=function(e){var a=e?e:"验证码错误";t.trigger("error",[a]).focus()};return a.length<6?void o():void $.ajax({type:"POST",url:e.config.checkSmsUrl+Math.random(),dataType:"json",data:{sms_code:a,bts:w.bts},timeout:1e4,error:function(){D.tipMsg("抱歉！网络错误，请刷新重试！")},success:function(t){t&&1===t.code?(e.config.smsToken=t.data.sms_token,e.setEcardResult()):o(t.msg)}})},setEcardResult:function(){var e=this;e.hideBox(),$("#J_cancelEcardSms").trigger("click");var t,a,o,i;"normal"===e.config.cardType?(a=$("#J_useEcard"),t=$("#J_ecardResult"),o=$("#J_ecardVal"),i=$("#J_ecardModify")):"recycle"===e.config.cardType&&(a=$("#J_useRecycle"),t=$("#J_recycleResult"),o=$("#J_recycleVal"),i=$("#J_recycleModify")),t.removeClass("hide"),a.addClass("hide"),o.html("-"+w.ecardAmount+"元"),w.ecard={id:e.config.selCardId.length>1?e.config.selCardId.join(","):e.config.selCardId[0],smsToken:e.config.smsToken},e.config.ecardResultShow=!0,i.off().one("click",function(){return e.showBox(a),a.removeClass("hide"),t.addClass("hide"),w.ecard={},e.config.ecardResultShow=!1,J(),!1})},checkCaptcha:function(){var e=this,t=$("#ecard_captcha"),a=$("#J_ecardCaptchaImg"),o=$.trim(t.val()),i=function(){t.trigger("error",["请输入正确验证码"]).focus(),a.trigger("click")};if(!o)return i(),!1;var c=t.attr("data-authurl");c=c.replace("{answer}",o)+"​&timestamp="+(new Date).getTime(),$.ajax({url:c,dataType:"jsonp",timeout:1e4,error:function(){},success:function(t){t.data&&t.data.result&&t.data.result===!0&&t.data.token?e.bindCard({token:t.data.token,answer:o}):i()}})},bindCard:function(e){var t=this,a=$("#ecard_password"),o=a.attr("data-origin-value");if(e){if(!o)return a.trigger("error",["密码错误"]).focus(),!1;t.toggleLoading(!0),$.ajax({type:"POST",url:t.config.bindUrl+Math.random(),dataType:"json",data:{bts:w.bts,card_cipher:o,captcha_code:e.answer,captcha_token:e.token},timeout:1e4,error:function(){},success:function(e){t.toggleLoading(!1),1===e.code?($("#J_ecardBox").find(".J_tabSwitch > li").eq(0).trigger("click"),t.getList(),t.config.selCardId=[],t.config.bindCardId=e.data.ecard_id,t.revertInput()):t.bindError(e)}})}},revertInput:function(){$("#ecard_password").val("").trigger("valid").parent().removeClass("form-section-active"),$("#ecard_captcha").val("").trigger("valid").parent().removeClass("form-section-active"),$("#ecard_sms").val("").trigger("valid").parent().removeClass("form-section-active"),$("#J_ecardCaptchaImg").trigger("click")},bindError:function(e){var t={60000010:{title:"您的账号未绑定安全手机！",desc:"为了您的资金安全，请前往小米账号中心绑定安全手机使用礼品卡支付时，需安全手机接收验证码"},100405:{title:"该礼品卡未激活或已绑定!",desc:"请联系购买人，确认订单收货并激活礼品卡，每个礼品卡密码只能被绑定一次，若已被绑定，将不能再次绑定。"},100404:{title:"输入的礼品卡号或密码有误！",desc:"如果您使用的是电子密码，可联系购买者询问正确的卡号和密码，如果您使用的是实物礼品卡，请核对您所输入的和卡片背面印有的卡号和密码是否一致"},100406:{title:"输入的礼品卡号或密码有误！",desc:"如果您使用的是电子密码，可联系购买者询问正确的卡号和密码，如果您使用的是实物礼品卡，请核对您所输入的和卡片背面印有的卡号和密码是否一致"}};t[e.code]?D.tipMsgs(t[e.code]):D.tipMsg(e.msg)}},L=function(){$("#J_miniHeaderTitle").html("<h2>确认订单</h2>"),MI.form.init(),w.bts=$.cookie("xm_order_btauth")?$.cookie("xm_order_btauth"):null,$("#J_addressList").on("click",".J_addressItem",function(t){t.preventDefault(),$(this).addClass("selected").siblings(".J_addressItem").removeClass("selected"),w.checkoutData.address=e($(this));var a="N"===$(this).attr("data-editable")?!0:!1;if(r(),i(a),(checkoutConfig.hasBigTv||checkoutConfig.hasAir)&&!checkoutConfig.hasEvent){var o=$(this).offset();$(".J_bigProTip").css({top:o.top+$(this).outerHeight(),left:o.left})}}),$("#J_showMoreAddress").on("click",function(){var e=$("#J_addressList").find(".selected");e.length&&e.index()>2&&e.insertBefore($(".J_addressItem").eq(0)),$(".J_addressItem:gt(2)").toggleClass("hide"),$(this).find(".text").toggleClass("hide")}),$("#J_addressList").on("click",".J_addressItem  .J_addressModify",function(e){e.stopPropagation(),MI.checkUserRisk.init({action:"addr_add",callback:function(){c("edit")}})}),$("#J_confirmAddress").on("click",".J_modify",function(){$("#J_addressList").find(".selected").find(".J_addressModify").trigger("click"),D.docScroll(".checkout-box")}),$("#J_newAddress").on("click",function(){MI.checkUserRisk.init({action:"addr_add",callback:function(){c("new","#J_newAddress")}})}),$(".J_tabSwitch").tabSwitch({onShow:function(e){e.removeClass("hide").show(),e.find(".J_tabSwitch > li").eq(0).trigger("click")}}),$(".J_optionList").on("click",".J_option",function(){$(this).addClass("selected").siblings(".J_option").removeClass("selected");var e=$(this).attr("data-type"),t=$(this).attr("data-value");if(e){if("invoice"===e&&($('.J_option[data-type="invoice"]').removeClass("selected"),$(this).addClass("selected")),w.checkoutData[e]=t,"invoice"===e){var a=$(this).attr("data-invoice-type");w.checkoutData.invoiceType=a}f()}}),$("#invoice_title").on("blur",function(){var e=$.trim($(this).val());return e.length?e.length>50?($(this).trigger("error",["发票抬头必须少于50个字"]),!1):($(this).trigger("valid"),void("company"===w.checkoutData.invoiceType&&"2"===w.checkoutData.invoice&&(w.checkoutData.invoiceTitle=e))):($(this).trigger("error",["发票抬头不能为空"]),!1)}),$("#J_showEinvoiceDetail").on("click",function(){$("#J_einvoiceDetail").removeClass("hide")}),a(),o(),l(),g(),C(),$("#J_checkoutToPay").on("click",function(){var e=$(this).hasClass("btn-gray");return e?!1:void MI.checkUserRisk.init({action:"buy_submit",callback:function(){I()}})}),"1"===checkoutConfig.showCaptcha&&T(),$(".J_carouselList").carousel({itemPerSlide:3,containerSelector:".J_carouselContainer",controlsSelector:".J_carouselControl",controls:!1,pager:!0}),$("#J_yushouSubmit").on("click",function(){$("#J_yushouTip").modal("hide"),w.persalesChecked=!0,I()}),$("#J_lipinSubmit").on("click",function(){$("#J_lipinTip").modal("hide"),w.giftCardChecked=!0,I()}),x(),M.init(),$(document).on("mouseup",function(e){var t=["#J_einvoiceDetail","#J_couponBox","#J_ecardQaDetail"];$.each(t,function(t,a){$(a).is(e.target)||0!==$(a).has(e.target).length||$(a).addClass("hide")})})},D={tipMsg:function(e){e?$("#J_modalAlert").one("show.bs.modal",function(){$("#J_alertMsg").html(e)}).modal({show:!0,backdrop:"static"}).removeClass("hide").one("hidden.bs.modal",function(){$(this).addClass("hide"),$("#J_alertMsg").html("");

}):$("#J_modalAlert").modal("hide")},tipMsgs:function(e){e?$("#J_modalAlert").addClass("modal-alerts").one("show.bs.modal",function(){$("#J_alertMsg").html(e.title).after("<p>"+e.desc+"</p>")}).modal({show:!0,backdrop:"static"}).removeClass("hide").one("hide.bs.modal",function(){$(this).addClass("hide").removeClass("modal-alerts"),$("#J_alertMsg").html("").siblings("p").remove()}):$("#J_modalAlert").modal("hide")},docScroll:function(e){if($(e).length){var t=$(e).offset().top;$("html, body").animate({scrollTop:t},500)}},parseJson:function(e){return new Function("return "+e)()}};return{init:L}}(),$(document).ready(function(){MI.checkout.init()})},function(e,t){!function(e){function t(a,o){function i(t){n=t.find(l.tabSelector),n.on(l.events,function(a){var o=n.index(e(this));if(a.preventDefault(),e(this).attr("href")&&e(this).attr("href").split("#")[1]){var i=e(window).scrollTop();window.location.hash=e(this).attr("href").split("#")[1],e("body, html").scrollTop(i)}c.each(function(){e(this).find(l.tabSelector).eq(o).addClass("tab-active").siblings(l.tabSelector).removeClass("tab-active")}),"function"==typeof l.onShow?l.onShow(s.eq(o),o):s.eq(o).removeClass("hide").show(),"function"==typeof l.onHide?l.onHide(s.eq(o).siblings(l.contentSelector),o):s.eq(o).siblings(l.contentSelector).addClass("hide").hide(),l.onLoad(t,o,l)})}var c,n,r,s,d,l;if(d={isSync:!1,events:"click",tabSelector:"li",containerSelector:".tab-container",contentSelector:".tab-content",onShow:null,onHide:null,onLoad:e.noop},l=e.extend({},d,o),l.isSync===!1){if(0===a.length)return a;if(a.length>1)return a.each(function(){t(e(this),o)}),a}c=e(a),r=c.first().attr("data-tab-target")?e("#"+c.first().attr("data-tab-target")):c.first().siblings(l.containerSelector),s=r.children(l.contentSelector),c.each(function(){i(e(this))}),l.onLoad(c,l)}e.fn.tabSwitch=function(e){return t(this,e),this}}(jQuery)},function(e,t){!function(e){function t(t){function a(){return 0>=_?!1:(k&&clearInterval(k),void(k=setTimeout(function(){var e=C===_-1?0:C+1;o(e),a()},f.pause)))}function o(e){return C===e?!1:($.css({marginLeft:-g*m*e,transition:"margin-left "+f.speed/1e3+"s "+f.easing}),f.controls&&(0===e?l.addClass("control-disabled"):l.removeClass("control-disabled"),e===_-1?u.addClass("control-disabled"):u.removeClass("control-disabled")),f.pager&&h.find("li").eq(e).addClass("pager-active").siblings().removeClass("pager-active"),void(C=e))}function i(){for(var t='<ul class="xm-pagers">',a=0,i=_;i>a;a+=1)t+='<li class="pager'+(0===a?" pager-active":"")+'"><span class="dot">'+(a+1)+"</span></li>";t+="</ul>",h.html(t),h.find("li").off(".carousel").on("click.carousel",function(){e(this).addClass("pager-active").siblings().removeClass("pager-active"),o(h.find("li").index(e(this)))})}function c(){m=f.itemPerSlide||Math.ceil(r.width()/g),_=Math.ceil(s.length/m),1>=_||(o(0),f.pager&&i(),f.auto&&(a(),f.controls&&d.find(".control").off(".carousel").on({"mouseenter.carousel":function(){k&&clearTimeout(k)},"mouseleave.carousel":function(){a()}}),f.pager&&h.find(".pager").off(".carousel").on({"mouseenter.carousel":function(){k&&clearTimeout(k)},"mouseleave.carousel":function(){a()}})))}var n,r,s,d,l,u,h,p,f,m,g,v,_,$=e(this),k=0,C=-1;return p={itemSelector:"> li",itemWidth:null,itemHeight:null,itemPerSlide:null,containerSelector:null,controlsSelector:null,pagersSelector:null,speed:500,easing:"ease",auto:!1,pause:5e3,controls:!0,controlsClass:"xm-controls-line-small",pager:!1,onLoad:e.noop},f=e.extend({},p,t),s=$.find(f.itemSelector),f.itemPerSlide&&s.length<=f.itemPerSlide?this:(g=f.itemWidth||s.outerWidth(!0),v=f.itemHeight||s.outerHeight(),n=f.containerSelector?$.closest(f.containerSelector):$.parent(),n.addClass("xm-carousel-container"),r=$.wrap('<div class="xm-carousel-wrapper"></div>').closest(".xm-carousel-wrapper").css({height:v,overflow:"hidden"}),$.css("width",g*s.length),f.controls&&(d=e('<div class="xm-controls '+f.controlsClass+' xm-carousel-controls"><a class="control control-prev iconfont" href="javascript: void(0);">&#xe628;</a><a class="control control-next iconfont" href="javascript: void(0);">&#xe623;</a></div>'),f.controlsSelector?n.find(f.controlsSelector).append(d):d.insertAfter(r),l=d.find(".control-prev"),u=d.find(".control-next"),l.on("click",function(t){t.preventDefault(),e(this).hasClass("control-disabled")||o(C-1)}),u.on("click",function(t){t.preventDefault(),e(this).hasClass("control-disabled")||o(C+1)})),f.pager&&(h=e('<div class="xm-pagers-wrapper"></div>'),f.pagersSelector?n.find(f.pagersSelector).append(h):h.insertAfter(r)),c(),f.onLoad($),void e(window).on("resize",c))}e.fn.carousel=function(e){return this.each(function(){t.call(this,e)}),this}}(jQuery)},function(e,t){!function(e){function t(a,o){function i(e){var t="undefined"!=typeof navigator?navigator.userAgent:null,a=/iphone/i.test(t);return 8===e||46===e||a&&127===e}function c(e){var t={35:"end",36:"home",37:"leftarrow",38:"uparrow",39:"rightarrow",40:"downarrow"};return t[e]}function n(e){return"Meta"===e||"Control"===e||"Alt"===e||"Shift"===e}function r(e){return f.inputPattern.test(e)}function s(e,t){return t=t>e.length?e.length:t,0>t?0:s(e,t-1)+e[t]}function d(t){var a,o=e(t)[0];if("number"==typeof o.selectionStart)return{begin:o.selectionStart,end:o.selectionEnd};if(a=document.selection.createRange(),a&&a.parentElement()===o){var i=o.createTextRange(),c=o.createTextRange(),n=o.value.length;return i.moveToBookmark(a.getBookmark()),c.collapse(!1),i.compareEndPoints("StartToEnd",c)>-1?{begin:n,end:n}:{begin:-i.moveStart("character",-n),end:-i.moveEnd("character",-n)}}return{begin:0,end:0}}function l(t,a){var o=e(t)[0];if(o.setSelectionRange)o.focus(),o.setSelectionRange(a,a);else if(o.createTextRange){var i=o.createTextRange();i.collapse(!0),i.moveStart("character",a),i.moveEnd("character",a),i.select()}}function u(e){return e.split(f.sepSymbol).join("")}function h(t){var a,o=e(t),i=o.val(),c=u(i),n=c,r=0,h=f.formatPattern.length,p=d(o).end,m=!0,g=0;for(p!==o.val().length&&(m=!1,g=0);h>r&&(a=s(f.formatPattern,r)+r,!(c.length+r+1<=a));r+=1)m&&p>a?g+=1:p===a&&(g+=1),n=[n.slice(0,a),n.slice(a)].join(f.sepSymbol);f.maxlength>0&&(n=n.slice(0,f.maxlength)),p+=g,o.val(n),l(o,p)}function p(e){e.attr("data-origin-value",u(e.val()))}var f,m={elmType:"input",formatPattern:[5,5,5,5],maxlength:parseInt(a.attr("maxlength")),inputPattern:"all",sepSymbol:"-"},g=!1;return 0===a.length?a:a.length>1?(a.each(function(){t(e(this),o)}),a):(f=e.extend({},m,o),void a.on({keydown:function(e){return"all"===f.inputPattern||r(e.key)?(n(e.key)&&(g=!0),void(g&&(g="both"))):!1},keyup:function(t){var a=e(this);return n(t.key)||"both"!==g?void(i(t.which)||c(t.which)||n(t.key)||(h(a),p(a))):void(g=!1)},paste:function(){var t=e(this);setTimeout(function(){h(t),p(t)},10)},change:function(){var t=e(this);p(t)}}))}e.fn.formatter=function(e){return t(this,e),this}}(jQuery)}]);