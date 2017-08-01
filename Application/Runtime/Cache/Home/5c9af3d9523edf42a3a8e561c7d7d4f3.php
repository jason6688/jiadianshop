<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta  charset="utf-8" />
<title>订单创建成功_家电商城</title>
<link rel="shortcut icon" href="/jiadianshop/Public/Ico/favicon.ico"/>
<link href="/jiadianshop/Public/Css/cart.ec.core.css" rel="stylesheet" type="text/css">
<link href="/jiadianshop/Public/Css/cart.main.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]> <![endif]-->
</head>
<body>
<!-- 捷径栏粉红条部分 -->

<!---1---------------------------头部粉红色条--------------------------------------->
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js" /></script>
<div  class="qq-caibei-bar hide"  id="caibeiMsg">
	<div  class="layout">
		<div  class="qq-caibei-bar-tips"  id="HeadShow"></div>
		<div  class="qq-caibei-bar-userInfo"  id="ShowMsg"></div>
	</div>
</div>

<!----------------头部的粉红色条--------------------->
<div  class="shortcut">
	<div  class="layout">
	  <!-----登录注册要去修改地方------>
	<span id="unlogin_status">
	  
	   <a  href="<?php echo U('Login/index');?>"  rel="nofollow">[登录]</a><a  href="<?php echo U('Sign/index');?>"  rel="nofollow">[注册]</a>
	  
	</span>
	 <!-----登录注册要去修改地方------>
	 <!---------登录后的状态----------->
	<span  id="login_status"  class="hide">欢迎您，<a  href="<?php echo U('Member/index');?>"  id="customer_name"  rel="nofollow"  timetype="timestamp"></a>
	<!---------登录后的状态----------->
	
	[<a  href="<?php echo U('Login/quit');?>">退出</a>]</span>
    <b>|</b><a  href="<?php echo U('OrderCenter/index');?>"  rel="nofollow"  timetype="timestamp">我的订单</a><span  id="preferential"></span><b>|</b><a  href="<?php echo U('Help/vmall');?>"  rel="nofollow"  class="red">帮助中心</a><b>|</b><!--<a  href="javascript:return  false;"  >商城手机版</a>-->

	</div>
</div>

<script type="text/javascript">
  // 顶部粉红条 ajax进行处理结果
  $(function(){
      $.ajax({
	      url:'<?php echo U("Login/checkLogin");?>',
		  type:'GET',
		  dataType:'json',
		  success:function(responseText,status,xhr){
		      if(status=="success"){
			     if(responseText.login_status==1){
				     $("#login_status").removeClass('hide');
					 $("#login_status #customer_name").html(responseText.user_name);
					 $("#unlogin_status").addClass('hide');
				 }else{
				     $("#login_status").addClass('hide');
				     $("#unlogin_status").removeClass('hide');
				 
				 }
				
			  }else{
			       $("#login_status").addClass('hide');
				   $("#unlogin_status").removeClass('hide');
			  
			  }
		  
		  },
		  
		  error:function(){
		      $("#login_status").addClass('hide');
		      $("#unlogin_status").removeClass('hide');
		  },
		  
		  timeout:60*1000,
	  
	  
	  
	  
	  
	  
	  
	  
	  });
  
  
  
  
  
  
  });
  

</script>

<!--头部 -->
<div class="order-header">
	<div class="g">
    	<div class="fl">
            <div class="logo"><a href=""><img src="/jiadianshop/Public/images/new_logo.png" /></a></div>
        </div>
        <div class="fr">
            <!--步骤条-三步骤 -->
            <div class="progress-area progress-area-2">
                <!--核对订单 -->
                <div id="progress-confirm" class="progress-co-area hide">填写核对订单信息</div>
                <!--成功提交订单 -->
                <div id="progress-submit" class="progress-sso-area hide" style="display:block;">成功提交订单</div>
            </div>
        </div>
    </div>
</div>

<form action="" id="pay-go-form" method="post" target="_blank" class="hide">
	<input type="hidden" name="orderCode" value="1070054253">
	<input type="hidden" name="paymentMethod" id="order-paymentMethod" value="">	
	<input type="hidden" name="paymentType" id="order-paymentType" value="">
	<input type="hidden" name="state" value="1">
</form>
<div class="layout">
	<!-- 20160527-订单-确认-鼠标悬停增加ClassName： order-confirm-expand -->
    <div class="order-confirm" id="order-confirm-detail">
		<div class="h">
			<s class="icon-success-7"></s>
			<h3>订单提交成功，请您尽快付款！</h3>			
			<p>订单号：&nbsp;&nbsp;<?php echo ($order_info["order_no"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;付款金额（元）：&nbsp;&nbsp;<b><?php echo ($order_info["order_money"]); ?></b>&nbsp;<b>元</b></p>
			<div class="tips">请您尽快完成支付。</div>
		</div>
		<div class="b">
			<table>
				<tbody>
					<tr>
						<th>订单金额：</th>
						<td><?php echo ($order_info["order_money"]); ?>元</td>
					</tr>
					
					<tr>
						<th>收货信息：</th>
						<td>
							<?php echo ($address_info['address_content']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php echo ($address_info['address_phone']); ?>
						</td>
					</tr>
					<tr>
						<th>购买日期：</th>
						<td><?php echo (date("Y-m-d H:i:s",$order_info["order_time"])); ?></td>
					</tr>
					<tr>
						<th>配送方式：</th>
						<td>
							快递应收费用&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							运费￥<?php echo ($express_money); ?>						
						</td>
					</tr>
				
					<tr>
						<th>订单编号：</th>
						<td><?php echo ($order_info["order_no"]); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="f"><a href="javascript:;" onclick="$('#order-confirm-detail').toggleClass('order-confirm-expand')">订单详情<i></i><s></s><b></b></a></div>
	</div><!-- 20160527-订单-确认-end -->
	<div class="hr-15"></div>
	<!--订单-表单-支付方式-20160527 -->
<!--订单-表单-支付方式-20160527 -->
<div class="order-payment" id="order-payment-mod">
	<h3 class="title">选择支付方式</h3>
    <div class="order-payment-list" id="order-payment-list">
	    <dl>
		<dd>
			<div class="order-payment-area">
				<div class="h"><b>账户余额支付：</b>余额支付。</div>
				<div class="b clearfix" id="payment-bank-list-shortcut">
					<ul>
						<li>
							<div class="payment-area">
								<input id="input-CMB-5" class="radio vam" type="radio" seed="payment_1_1" data-type="5" name="bankName-input" value="CMB">
							<label class="vam" for="input-CMB-5">
							    账户余额:
								<b style="color:red">&yen;<span><?php echo ($money); ?></span></b>
							</label>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
			<div class="order-payment-area">
				<div class="h"><b>支付宝：</b></div>
				<div class="payment-area alipay">
					<input id="input-alipay-1" class="radio vam" type="radio" seed="payment_1_1" data-type="1" name="bankName-input" value="alipay">
							<label class="vam" for="input-alipay-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/alipay_logo.gif" alt="支付宝" title="支付宝" disabled="">
							<div class="bank-tips">
								<p>支付宝交易单笔最高限额20000</p>
							<s></s>
							</div>
				</div>

				<div class="h"><b>银行网银：</b>支持以下各银行储蓄卡及信用卡，<a href="javascript:return false;"title="查看支付限额" target="_blank">查看支付限额</a></div>
				<div class="b clearfix" id="payment-bank-list-bank">
					<ul>
						<li>
							<div class="payment-area">
								<input id="input-ABC-1" class="radio vam" type="radio" seed="payment_1_1" data-type="1" name="bankName-input" value="ABC">
							<label class="vam" for="input-ABC-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/ABC_OUT.gif" alt="中国农业银行" title="中国农业银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-BJRCB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="BJRCB">
							<label class="vam" for="input-BJRCB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/BJRCB_OUT.gif" alt="北京农商银行" title="北京农商银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-BOCB2C-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="BOCB2C">
							<label class="vam" for="input-BOCB2C-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/BOC_OUT.gif" alt="中国银行" title="中国银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-CCB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="CCB">
							<label class="vam" for="input-CCB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/CCB_OUT.gif" alt="中国建设银行" title="中国建设银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-CEB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="CEB">
							<label class="vam" for="input-CEB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/CEB_OUT.gif" alt="中国光大银行" title="中国光大银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-CIB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="CIB">
							<label class="vam" for="input-CIB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/CIB_OUT.gif" alt="兴业银行" title="兴业银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-CITIC-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="CITIC">
							<label class="vam" for="input-CITIC-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/CITIC_OUT.gif" alt="中信银行" title="中信银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-CMB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="CMB">
							<label class="vam" for="input-CMB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/CMB_OUT.gif" alt="招商银行" title="招商银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-CMBC-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="CMBC">
							<label class="vam" for="input-CMBC-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/CMBC_OUT.gif" alt="中国民生银行" title="中国民生银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-COMM-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="COMM">
							<label class="vam" for="input-COMM-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/COMM_OUT.gif" alt="交通银行" title="交通银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-GDB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="GDB">
							<label class="vam" for="input-GDB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/GDB_OUT.gif" alt="广发银行" title="广发银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-HZCB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="HZCB">
							<label class="vam" for="input-HZCB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/HZCB_OUT.gif" alt="杭州银行" title="杭州银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-ICBC-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="ICBC">
							<label class="vam" for="input-ICBC-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/ICBC_OUT.gif" alt="中国工商银行" title="中国工商银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-PSBC-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="PSBC">
							<label class="vam" for="input-PSBC-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/PSBC_OUT.gif" alt="中国邮政储蓄银行" title="中国邮政储蓄银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
						<li>
							<div class="payment-area">
								<input id="input-SPDB-1" class="radio vam" type="radio" seed="payment_1_8" data-type="1" name="bankName-input" value="SPDB">
							<label class="vam" for="input-SPDB-1">
								<img class="vam pointer" src="/jiadianshop/Public/images/SPDB_OUT.gif" alt="上海浦东银行" title="上海浦东银行" disabled="">
							<div class="bank-tips">
								<p>储蓄卡单笔最高限额10000.00元，信用卡单笔最高限额5000.00元</p>
							<s></s>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="order-payment-area">
				
		    </div>	
		</dd>
	    </dl>
		<div class="order-payment-action-area"><a class="button-sytle-5" href="<?php echo U('Payment/index');?>">确认支付</a></div>
    </div>
	<!--订单-表单-支付方式列表结束 -->
	
	
</div>


</div>

<!--口号-20160527 -->

<!--口号-20160523 -->

<div class="slogan">
	<ul>
		<li class="s1"><i></i>500强企业&nbsp;品质保证</li>
		<li class="s2"><i></i>7天退货&nbsp;15天换货</li>
		<li class="s3"><i></i>200元起免运费</li>
		<li class="s4"><i></i>448家维修网点&nbsp;全国联保</li>
	</ul>
</div><!--口号-end -->
<!--服务-20160525 -->
<div class="service">
		<dl class="s1">
			<dt><i></i>帮助中心</dt>
			<dd>
				<ol>        
					<li><a   href="javascript:void(0)">购物指南</a></li>
					<li><a   href="javascript:void(0)">配送方式</a></li>
					<li><a   href="javascript:void(0)">支付方式</a></li>
					<li><a   href="javascript:void(0)">常见问题</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s2">
			<dt><i></i>售后服务</dt>
			<dd>
				<ol>
					<li><a target="_blank" href="javascript:void(0)">保修政策</a></li>
					<li><a target="_blank" href="javascript:void(0)">退换货政策</a></li>
					<li><a target="_blank" href="javascript:void(0)">退换货流程</a></li>
					<li><a target="_blank" href="javascript:void(0)">家电寄修服务</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s3">
			<dt><i></i>技术支持</dt>
			<dd>
				<ol>        
					<li><a   href="javascript:void(0)">售后网点</a></li>
					<li><a   href="javascript:void(0)">常见问题</a></li>
					<li><a   href="javascript:void(0)">产品手册</a></li>
					<li><a   href="javascript:void(0)">软件下载</a></li>
				</ol>       
			</dd>
		</dl>
		<dl class="s4">
			<dt><i></i>关于商城</dt>
			<dd>
				<ol>
					<li><a   href="javascript:void(0)">公司介绍</a></li>
					<li><a   href="javascript:void(0)">商城简介</a></li>
					<li><a   href="javascript:void(0)">联系客服</a></li>
					<li><a   href="javascript:void(0)">商务合作</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s5">
			<dt><i></i>关注我们</dt>
			<dd>
				<ol>
					<li><a class="sina" href="javascript:void(0)" target="_blank">新浪微博</a></li>
					<li><a class="qq" href="javascript:void(0)" target="_blank">腾讯微博</a></li>
					<li><a class="huafen" href="javascript:void(0)" target="_blank">粉丝社区</a></li>
					<li><a href="javascript:void(0)" >商城手机版</a></li>
				</ol>
			</dd>
		</dl>
</div>
<!--服务-end -->

<!--确认对话框-->
<div id="ec_ui_confirm" class="popup-area popup-define-area hide">
    <div class="b">
        <p id="ec_ui_confirm_msg"></p>
        <div class="popup-button-area"><a id="ec_ui_confirm_yes" href="javascript:;" class="button-action-yes" title="是"><span>是</span></a><a id="ec_ui_confirm_no" href="javascript:;" class="button-action-no" title="否"><span>否</span></a></div>
    </div>
    <div class="f"><s class="icon-arrow-down"></s></div>
</div>

<!--提示对话框-->
<div id="ec_ui_tips" class="popup-area popup-define-area hide">
    <div class="b">
        <p id="ec_ui_tips_msg" class="tac"></p>
        <div class="popup-button-area tac"><a id="ec_ui_tips_yes" href="javascript:;" class="button-action-yes" title="确定"><span>确定</span></a></div>
    </div>
    <div class="f"><s class="icon-arrow-down"></s></div>
</div>

<!--在线客服-->
<div style="top: 230px; left: 1301px; z-index: 500; position: fixed;" class="hungBar" id="tools-nav">
	<a style="opacity: 1;" title="返回顶部" class="hungBar-top" href="#" id="hungBar-top">返回顶部</a>
	<a style="display: block;" id="tools-nav-survery" title="意见反馈" class="hungBar-feedback hide" href="javascript:;" >意见反馈</a>		
	
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>
	<!--意见反馈box-- hide-->
	<div id="survery-box" class="form-feedback-area  hide">
		<div class="h">
			<a class="form-feedback-close" title="关闭" href="javascript:;"></a>
		</div>
		<div class="b">
				<div class="form-edit-area">
					<form onsubmit="return false;" autocomplete="off">
						<div class="form-edit-table">
							<table border="0" cellpadding="0" cellspacing="0">
								<tbody>
							    <tr>
                                    <td>
                                        <b>疑问类型：</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select id="type" name="type">
                                        	
                                          
                        
                                        </select>
                                    </td>
                                </tr>
								
								<tr>
									<td><b>您的问题或建议：</b><span id="errMsg" style="color:red;font-size:14px;"></span></td>
								</tr>
								<tr>
									<td><textarea class="textarea" type="textarea" name="content" id="surveryContent" placeholder="200字内"></textarea></td>
								</tr>
								<tr>
									<td>您的联系方式：</td>
								</tr>
								<tr>
									<td><input class="text" name="contact" id="surveryContact" type="text" placeholder="邮箱或手机号"></td>
								</tr>
								<tr>
									<td><div class="fl"><input name="code" id="surveryVerify" class="verify vam" maxlength="4" type="text">&nbsp;&nbsp;<img id="surveryVerifyImg" onclick="this.src=this.src+'?'+Math.random()" class="vam" alt="验证码" src="<?php echo U('Advice/verify');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="vam"><a 
									 id="surveryVerify_do"  class="u" >看不清，换一张</a></span></div><div class="fr"><input value="提交" id="advice_submit" type="button"></div></td>
								</tr>
								</tbody>
							</table>
						</div>
					</form>
				</div>
		</div>
	</div>
	
</div>
<script type="text/javascript">
      //用户意见提交的控制代码 曹建伟提供
    $(function(){
	      //控制验证码的更改
		  function changeImg(){
		     
			 $("#surveryVerifyImg").attr('src',function(i,v){
			      return v+'?='+Math.random();
			 });
		   
		  }
		  $("#surveryVerify_do").click(function(){
		       
		        changeImg();
		  
		  });
		 //控制窗口的显示
	    $("#tools-nav-survery").toggle(function(){
		     $("#survery-box").removeClass("hide");
			 changeImg();
		},function(){
		      $("#survery-box").addClass("hide");
			  changeImg();
		
		});
	    
		$(".form-feedback-close").click(function(){
		   
		      $("#survery-box").addClass("hide");
			  changeImg();
 
		});
		//获取疑问问题ajax的形式返回
		$.ajax({
		      url:"<?php echo U('Advice/makeCategory');?>",
			  type:"POST",
			  dataType:'json',
			  success:function(responseText,status,xhr){
			        if(status=='success'){
					    if(responseText.status==1){
						
						    $("#type").html(responseText.content);
						}
					}else{
					   alert("加载分类失败");
					}
			  },
			  error:function(){
			     alert("加载分类失败");
			  },
			  timeout:1000*60,
		     
		
		
		});
		
		
		var select=$("#type"); //选择类型
		var content=$("#surveryContent");//内容
		var connect=$("#surveryContact");//联系方式
		var code=$("#surveryVerify");//验证码
		var errMsg=$("#errMsg");
		$(select).focus(function(){
		     errMsg.html("");
		});
		$(content).focus(function(){
		     errMsg.html("");
		});
		$(connect).focus(function(){
		     errMsg.html("");
		});
		$(code).focus(function(){
		     errMsg.html("");
		});
		$("#advice_submit").click(function(){
		    //单击提交按钮进行数据判断
		 	
		     var select_val=select.val();
			 var content_val=content.val();
			 var connect_val=connect.val();
			 var code_val=code.val();
			
			 if(select_val<0){
			     errMsg.html("请选择疑问类型"); 
                
				 changeImg()
                  return;				 
			 }else if(content_val.length<1){
			    errMsg.html("请输入建议"); 
			  
				changeImg();
				return ;
			 }else if(connect.length<1){
			    errMsg.html("请输入联系方式"); 
				changeImg();
				
				 return;
			 }else if(code.length<1){
			     errMsg.html("请输入验证码"); 
				 changeImg();
				 
				 return;
			}
			//进行ajax验证验证码
			$.ajax({
			     url:"<?php echo U('Advice/checkVerify');?>",
				 type:"GET",
				 data:{
				    code:code_val,
				 },
				 success:function(responseText,statuss,xhr){
				     if(statuss=="success"){
					     if(responseText==0){
						    errMsg.html("验证码错误"); 
						    changeImg();
							return;
						 }else{
						    $.ajax({
							    url:"<?php echo U('Advice/index');?>",
                                type:"POST",
                                data:{
								   'select': select_val,
								   'content':content_val,
								   'conect':connect_val,
								},
                                success:function(responseText,status,xhr){
								      alert('提交成功!感谢你的宝贵建议');
									  $("#survery-box").addClass("hide");
								},
                                timeout:60*1000,								
							    
							});
						 
						 }
					 }else{
					  errMsg.html("验证码错误"); 
					   changeImg();
					   status=0;
					   return;
					 }
				 },
				 
				 error:function(){
				    errMsg.html("验证码错误"); 
					 changeImg();
					 status=0;
					 return;
				 },
				 timeout:60*1000,
			
			});
			
		    
			
			
			
			
			
			
			
		
		});
		
		
		 
	
	
	});


</script>
<!--
<div id="globleParameter" class="hide" context="" stylepath="http://res.vmall.com/20140826/css" scriptpath="http://res.vmall.com/20140826/js" imagepath="http://res.vmall.com/20140826/images" mediapath="http://res.vmall.com/pimages/"></div>
-->
<!--底部 -->

<footer class="footer">
    <!-- 20160523-底部-友情链接-start -->
	<!--
	<div class="footer-otherLink">
		<p>热门<a href="javascript:void(0)" ></a>：<a href="javascript:void(0)" target="_blank"></a> | <a href="javascript:void(0)" target="_blank"></a> | <a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | <a href="javascript:void(0)" target="_blank"></a> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span><a href="javascript:void(0)" target="_blank" style="line-height:1.5;"></a><span style="line-height:1.5;"> | </span></p><p><br></p>
	</div>
	-->

</footer>



<div id="AutocompleteContainter_d3d73" style="position: absolute; z-index: 9999; top: 93px; left: 556.5px;"><div class="autocomplete-w1"><div class="autocomplete" id="Autocomplete_d3d73" style="display: none; width: 315px; max-height: 400px;"></div></div></div>
<!--底部 -->

</body>
</html>