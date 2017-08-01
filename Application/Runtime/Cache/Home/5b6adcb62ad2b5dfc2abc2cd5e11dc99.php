<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-cn">
	
<title>登录_帐号</title>

<link rel="shortcut icon" href="/jiadianshop/Public/Ico/favicon.ico" type="image/x-icon"> 

<link href="/jiadianshop/Public/Css/ec.css" rel="stylesheet" type="text/css"> 
<link href="/jiadianshop/Public/Css/account.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>

<!-- edit third fastlogin -->
<style type="text/css">

</style>
<!-- end edit -->
</head>
<body class="login">
<!-- 头部  --> 

<div class="customer-header">
	<div class="g">
		 <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td><!--<img src="/jiadianshop/Public/Images/logo2.png">-->
						<span>乐享生活</span>
                    </td>
                    <td style="padding-left:5px;"><img src="/jiadianshop/Public/Images/split1.png"></td>
                    <td>
	                    <span>
	                    	<!-- edit Logo font -->
	                    		
								家电商城 
							<!-- end edit -->
	                    </span>
                    </td>
                </tr>
            </tbody></table>
    </div>
</div>
	<div class="g">
		<iframe class="advise" src="" allowtransparency="true" scrolling="no" style="height:0px;position: absolute;width: 550px;top: 10px;left: 60px;overflow: hidden;border: 0px" frameborder="0"></iframe>
		<!--------保存上一个url----------------->
		<input type="hidden" name='preUrl' value="<?php echo ($url); ?>">
		<!--登录 -->
		<div class="login-area">
			<div class="h">
				<h3 class="login-area-marginTop"><span>欢迎登录</span></h3>
			</div>
			<div class="b">
				<form action=" " method="post" name="myform" autocomplete="off" class="login-form-marginTop" onsubmit="return false;" >
					
					
					
					
					
					<div class="form-edit-area">
						<table border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td><input autocomplete="off" class="text vam" id="login_userName" name="userAccount" maxlength="50" tabindex="1" type="text" placeHolder="用户名:6-20位,数字字母组合"></td>
								</tr>
								<tr>
									<td><input id="login_password" class="text vam" name="password" value="" maxlength="32" tabindex="2" type="password"  placeHolder="密码:(6-32字符)"></td>
								</tr>
								 
								<tr>
									<td>
										<table>
											<tbody><tr>
												<td>							
													<input autocomplete="off" class="verify vam" id="randomCode" name="authcode" maxlength="4" tabindex="3" type="text" placeholder='不区分大小写'>&nbsp;&nbsp;
												</td>
												<td>
													<img class="vam pointer" id="randomCodeImg" src="<?php echo U('Login/verify');?>" alt="验证码" onclick="this.src=this.src+'?'+Math.random()" width="130" >
													&nbsp;&nbsp;
												</td>
												<td>
													<img class="vam pointer" id="randomCodeImg_do"
												       src="/jiadianshop/Public/Images/chg_image.png">
												</td>
												
												<td>
														<span class="vam" style="margin:0px;" id="randomCodeError"></span>
												</td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								
								<tr>
									<td>
										<input class="checkbox vam" id="remember_name" tabindex="4" checked="checked" type="checkbox"><label class="vam" for="remember_name">记住用户名</label>&nbsp;&nbsp;&nbsp;&nbsp;
										<a class="forgot vam" href="<?php echo U('Forget/index');?>"  title="忘记密码？ ">忘记密码？ </a>
									</td>
								</tr>
								<tr>
									<td>
									    
										<div style="margin-bottom:0px;">
										<span class="vam error" id="login_msg" style="margin-bottom:5px;display:block">
										 
										</span></div>
										<input class="button-login" id="btnLogin"  value="登录" tabindex="5" type="button">&nbsp;&nbsp;
										
										<img class="load" src="/jiadianshop/Public/Images/loading3.gif">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</form>
				<script type="text/javascript">
				      //进行ajax验证
				      $(function(){
					      function changeImg(){
						      $("#randomCodeImg")[0].src=$("#randomCodeImg")[0].src+'?'+Math.random();
						  
						  }
					      $("#randomCodeImg_do").click(function(){
						      
						      changeImg();
						  
						  });
						   var mark=0;
						  $("#login_userName").keyup(function(){
						     var name=$(this).val();
							 if(/^([\d|[a-z]){6,20}$/i.test(name)){
							     $("#login_msg").html("");
								 mark=1;
							 
							 }else{
							     $("#login_msg").html("用户名不符合要求");
								
							     mark=0;
							 }
						  
						  
						  
						  });
						  
						  $("#login_password").keyup(function(){
						     var pwd=$(this).val();
							 if(/^(\d|[a-z]){6,32}$/i.test(pwd)){
							      $("#login_msg").html("");
								  mark=1;
							 }else{
							     $("#login_msg").html("密码不符合要求");
							      mark=0;
							 }
						     
							 
						  
						  
						  });
						  
						   //验证码判断
						  $("#randomCode").blur(function(){
						        var code=$(this).val();
							  if(!/^(\d|[a-z]){4}$/i.test(code)){
							     $("#login_msg").html("验证码输入不符合要求");
								  changeImg();
							      mark=0;
							  }else{
							       $("#login_msg").html("");
							       //ajax验证验证码
								   
								   $.ajax({
								      url:"<?php echo U("Login/check_verify");?>",
								      type:"GET",
									  data:{
									       'code':code,
									  },
									  datatType:'json',
									  success:function(responseText,status,xhr){
									      if(responseText==1){
										      mark=1;
										  }else{
										    $("#login_msg").html("验证码输入错误请重新输入");
											 changeImg();
										  
										  }
									  
									  }
									  
								   });
							  }
							  
						      
						  
						  });
						  
						  //进行ajax验证用户是否正确
						 $("#btnLogin").click(function(){
						     if(mark==1){
							     var name=$("#login_userName").val();
								 var pwd=$("#login_password").val();
								  var rembername=0;
								 var rember_name=$("#remember_name").prop("checked");
								 if(rember_name==true){
								     rembername=1;
								 }else if(rember_name==false){
								     rembername=0;
								 
								 }
								 var url=$("input[name=preUrl]").val();
								
								 
								 $.ajax({
								      url:"<?php echo U('Login/remoteLogin');?>",
									  type:"POST",
									  data:{
									     'uname':name,
										 'pwd':pwd,
										 'rembername':rembername
									  },
									  
									  success:function(responseText,status,xhr){
									     //0 表示失败 1 账号锁定 2 登录成功
									     if(responseText==0){
										     $("#login_msg").html("用户名或密码错误,登录失败!");
											  changeImg();
										 }else if(responseText==1){
                                             $("#login_msg").html("你的账号被锁了,不可登录!"); 
											 changeImg();									 
										 
										 }else if(responseText==2){
										   //成功就进行跳转
										   window.location.href=url;
										 
										 }else{
										     $("#login_msg").html("登录失败!请重新登录!");
											  changeImg();
										 
										 }
									     
									  
									  },
									  
									  error:function(){
									  
									      $("#login_msg").html("登录超时!请重新登录!");
										   changeImg();
									  
									  
									  },
									  
									  timeout:1000*600,
									  
								 
								 
								 
								 
								 
								 
								 
								 });
							 
							 
							 
							 
							 }
						 
						 
						 
						 });
						 
						 
						 
						 
						  
						  
						  
						  
						  
						  
						  
						  
						 
					  
					  });
				
				
				</script>
				
				<!-- edit third fastlogin -->
				 <span style="color:#666;" class="thirdAccountSpan">使用合作网站帐号登录：</span>
	        <span class="alipayLogin" title="支付宝" onclick="thirdAccountLogin(this)"><a href="javascript:void(0);" tourl="/alipay/alipay_auth_authorize.jsp"><s></s></a></span>
	    
	        <span class="qqLogin" title="QQ" onclick="thirdAccountLogin(this)"><a href="javascript:void(0);" tourl="/qq/authorize.jsp"> <s></s></a></span>
	     
				<!-- end edit -->
				
				<p>
					没有帐号？ &nbsp;&nbsp;<a href="<?php echo U('Sign/index');?>" title="免费注册">免费注册</a>
				</p>
                <p style="margin-top:0px; padding-top:0xp;color:#929292;border-top: none">
                	技术支持：史亚运
                </p>
				
			</div>
		</div>
	</div>
	 <div class="hr-60"></div>
<!-- 底部  -->

<div class="customer-footer">
	<div class="g">
		<!--授权  -->
        <div class="warrant-area">
            <p style="text-align: center;height-line:20px;height:20px; "><a style="text-decoration: underline;" target="blank" href="javascript:void(0)" title="《帐号服务条款、隐私政策》">《服务条款、隐私政策》</a></p>
        	<p style="text-align: center;height-line:20px;height:20px; ">Copyright&nbsp;©&nbsp;2016-2116&nbsp;&nbsp;
史亚运-毕业设计&nbsp;&nbsp;版权所有&nbsp;&nbsp;保留一切权利&nbsp;&nbsp;豫NB-88888888
号&nbsp;|&nbsp;豫ICP备66668888号-8</p>
        </div>
    </div>
</div>



	<div id="layer">
		<div class="mc"></div>
	</div>
	

<script>

</script>

</body></html>