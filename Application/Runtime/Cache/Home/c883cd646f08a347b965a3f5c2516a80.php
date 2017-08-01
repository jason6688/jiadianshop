<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-cn">
<link rel="shortcut icon" href="/jiadianshop/Public/Ico/favicon.ico" type="image/x-icon"> 

<link href="/jiadianshop/Public/Css/ec.css" rel="stylesheet" type="text/css"> 
<link href="/jiadianshop/Public/Css/account.css" rel="stylesheet" type="text/css"> 

<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>

<title>找回密码</title>
<style type="text/css">
.pwd-letter  span{
	    width:80px;
		height:18px;
		line-height:18px;
		background:#EEEEEE;
		display:inline-block;
		margin-top:3px;
		text-align:center;
	 
	 
	 }
	 .pwd-letter span.power{
	      background:#f00;
		  color:#fff;
	 }





</style>



</head>

<body class="forget">
<!-- 头部  --> 

<div class="customer-header">
	<div class="g">
		 <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td><span>乐享生活</span></td>
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
    	<!--找回密码 -->
    	<div id="mod-forget-area" class="forget-area">
        	<div class="h">
            	<h3><span>找回密码</span></h3>
            </div>
            <div class="b">
                <form id="formid">
                	<!--表单 -->
                	<div class="form-edit-area">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            	<tr>
                                	<th>密码：</th>
                                    <td>
                                        <label for="newPassword" style="display: block; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="text vam" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label><input style="z-index: 1;"  class="text vam" id="newPassword" name="formBean.newPassword" maxlength="32" tabindex="2" value="" type="password" placeholder="6-32字符">
										
										<span id="msg_password"></span>
										
                                    	<div class="pwd-letter">
										     <span>弱</span>
											 <span>中</span>
											 <span>强</span>
									    </div>
                                    </td>
                                </tr>
                                <tr>
                                	<th>确认密码：</th>
                                    <td>
                                        <label for="conformPassword" style="display: block; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="text vam" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label>
										
										
										<input style="z-index: 1;"  class="text vam" id="conformPassword" name="checkPassword" maxlength="32" tabindex="3" value="" type="password" placeholder="请再次输入密码">
										
										
										  <span id="msg_checkPassword"></span>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<th>验证码：</th>
                                    <td>
                                        <label for="randomCode" style="display: block; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="verify vam ime-disabled" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label>
										
										<input style="z-index: 1;" validator="validator31409907277150" autocomplete="off" class="verify vam ime-disabled" id="randomCode" name="formBean.randomCode" maxlength="4" tabindex="4" type="text" placeholder="不区分大小写">&nbsp;&nbsp;
										
										
                                        <img class="vam pointer" id="randomCodeImg" src="<?php echo U('Forget/verify');?>" alt="验证码"  onclick="this.src=this.src+'?='+Math.random();">&nbsp;&nbsp;
										
										<img class="vam pointer"  src="/jiadianshop/Public/Images/chg_image.png" id="randomCodeImg_do">
                                        <span id="msg_randomCode"></span>
                                    </td>
                                </tr>
                                <tr>
                                	<th>&nbsp;</th>
                                    <td>
                                        <input class="button-submit" id="btnSubmit" value="提交" tabindex="5" type="button">&nbsp;&nbsp;<span class="vam error" id="forget_msg"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  
                </form>
            </div>
 <script type="text/javascript">
    $(function(){
	     // js代码 验证
		    //验证
		 function changeImg(){
		       $("#randomCodeImg")[0].src=$("#randomCodeImg")[0].src+'?'+Math.random();
		 
		 }
		 $("#randomCodeImg_do").click(function(){
	         $("#randomCodeImg")[0].src=$("#randomCodeImg")[0].src+'?'+Math.random();
						  
						  
		  });
	       var mark=0;
		 
		  
		  
		   //密码验证
		 
		 //密码验证
					 
			 $("#newPassword").focus(function(){
				  $("#msg_password").html();
			 });
			 
			 $("#newPassword").blur(function(){
				 //获取值进行判断
				 var pwd=$("#newPassword").val();
				
				 if(/^(\d|[a-z]){6,32}$/i.test(pwd)){
					 $("#msg_password").html('<span class="vam icon-ok"> </span>');
					 mark=1;
				 
				 }else{
					 $("#msg_password").html('<span class="vam icon-error">不符合规定</span>');
					 mark=0;
				 }
				 
			 
			 });
				//判断密码强度 6-10 弱  10-20 中  20-30强
			 $("#newPassword").keyup(function(){
				  var pwd=$("#newPassword").val();
				  
				  var pwd_letter=$(".pwd-letter span");
				  
				  var i=0;
				  if(pwd.length>0){
					  if(pwd.length<=10||(/^\d{6,32}$/i.test(pwd))||(/^[a-z]{6,32}$/i.test(pwd))){
						  i=0;
					  }else if(pwd.length>10&&pwd.length<=20){
						  i=1;
					  }else if(pwd.length>20&&pwd.length<=32){
						  i=2;
					  }
					 
					  pwd_letter.eq(i).addClass("power").siblings().removeClass("power");;
				  }else{
					  pwd_letter.removeClass('power');
				  
				  }
				  
			 
			 
			 });
			 
			 //确认密码处理
	          //确认密码处理
				 $("#conformPassword").focus(function(){
					 $("#msg_checkPassword").html('');
				 
				 });
				 $("#conformPassword").blur(function(){
					 var  pwd=$("#newPassword").val();
					 
					 var repwd=$("#conformPassword").val();

					  if((repwd==pwd)&&(/^(\d|[a-z]){6,32}$/.test(repwd))){
						 mark=1;
						 $("#msg_checkPassword").html('<span class="vam icon-ok"> </span>');
					  }else{
						 mark=0;
						 $("#msg_checkPassword").html('<span class="vam icon-error"></span>');
					  }					 
						
					 
				 
				 
				 
				 
			  });
			  
			    //验证码处理
	 
		      $("#randomCode").focus(function(){
				  $("#msg_randomCode").html('');
			  });
			 $("#randomCode").blur(function(){
				 var code_value=$(this).val();
				 if(code_value.length<4||!(/^(\d|[a-z]){4}$/i.test(code_value))){
					  $("#msg_randomCode").html('<span class="vam icon-error">不合法或位数不够</span>');
					  changeImg();
					  mark=0;
				 }else{
					  //ajax去验证
					  $.ajax({
						  url:"<?php echo U('Forget/check_verify');?>",
						  type:"GET",
						  data:{
							 'code':code_value,
						  },
						  success:function(responseText,status,xhr){
							 if(status=='success'){
								if(responseText==1){
								   mark=1;
								   $("#msg_randomCode").html('<span class="vam icon-ok"> </span>');
								}else{
									mark=0;
									$("#msg_randomCode").html('<span class="vam icon-error">不正确</span>');
									changeImg();
								}
							 }else{
								   mark=0;
								   $("#msg_randomCode").html('<span class="vam icon-error">不正确</span>');
								   changeImg();
							 }
						  
						  },
						  
						  error:function(){
							 $("#msg_randomCode").html('<span class="vam icon-error"></span>');
							 changeImg();
						  },
						  
						  timeout:1000*60,
						  
					  
					  });
				 }
			 
			 
			 });
			 
			 //提交表单
			 
			 
		  $("#btnSubmit").click(function(){
					 var pwd=$("#newPassword").val();
					 var repwd=$("#conformPassword").val();
					 var code_value=$("#randomCode").val();
					  //先判断是否有没有输入的
					 if(pwd.length==0){
						 mark=0;
						 $("#msg_password").html('<span class="vam icon-error">密码不能为空</span>');
						 changeImg();
					 
					 }
					  
					 if(repwd.length==0){
						 mark==0;
						 $("#msg_checkPassword").html('<span class="vam icon-error">确认密码不能为空</span>');
						 changeImg();
					 }
					 
					 if(code_value.length==0){
						  mark=0;
						 $("#msg_randomCode").html('<span class="vam icon-error">验证码不能为空</span>');
						 changeImg();
					 
					 }
					 
					 if(mark==1){
						 //成功开始注册
						 var url="<?php echo U('Login/index');?>";
						 $.ajax({
							  url:"<?php echo U('Forget/modifierPwd');?>",
							  type:"POST",
							  data:{
								 'pwd':pwd,
							  },
							  success:function(responseText,status,xhr){
								 if(status=="success"){
								     // 0 失败  1 和原密码相同  2 修改成功
									if(responseText==2){
									  $("#forget_msg").html('<span class="vam icon-ok">修改成功!页面跳转中....</span>');
									   window.location.href=url;
									
									}else if(responseText==1){
									   $("#forget_msg").html('<span class="vam icon-error">密码和原来相同！</span>');
									   changeImg();
									
									}else{
									   $("#forget_msg").html('<span class="vam icon-error">更改失败</span>');
									   changeImg();
									}
								 
								 }else{
								   $("#forget_msg").html('<span class="vam icon-error">更改失败</span>');
								   changeImg();
								 
								 }
							  }
						 
						 });
						
					 }else{
						$("#forget_msg").html('<span class="vam icon-error">更改失败</span>');
						changeImg();
					  
					 }
				 
				 
				 });
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 

	 
	 
	 });


</script> 
            <div class="f"></div>
    	</div>
    </div>
 <div class="hr-60"></div>
<!-- 底部  -->

<div class="customer-footer">
	<div class="g">
		<!--授权  -->
        <div class="warrant-area">
            <p style="text-align: center;height-line:20px;height:20px; "><a style="text-decoration: underline;" target="blank" href="javascript:void(0);" title="《家电商城帐号服务条款、隐私政策》">《家电商城帐号服务条款、隐私政策》</a></p>
        	<p style="text-align: center;height-line:20px;height:20px; ">Copyright&nbsp;©&nbsp;2016-2016&nbsp;&nbsp;
史亚运－毕业设计&nbsp;&nbsp;版权所有&nbsp;&nbsp;保留一切权利&nbsp;&nbsp;豫NB-88888888
号&nbsp;|&nbsp;豫ICP备66668888号-8</p>
        </div>
    </div>
</div>







</body></html>