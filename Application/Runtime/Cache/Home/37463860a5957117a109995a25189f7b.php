<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-cn">

<link rel="shortcut icon" href="/jiadianshop/Public/Ico/favicon.ico" type="image/x-icon"> 

<link href="/jiadianshop/Public/Css/ec.css" rel="stylesheet" type="text/css"> 
<link href="/jiadianshop/Public/Css/account.css" rel="stylesheet" type="text/css"> 


<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>


<title>找回密码</title>

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
                <form  method="post" autocomplete="off" id="resetByIdFrom" onsubmit="return false;">
                	
                	
                	<div class="form-edit-area">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            	 <tr>
                                	<th>&nbsp;</th>
                                    <td class="forget_head_text"><em>请输入注册过的用户名</em></td>
                                </tr>
                                <tr>
                                	<th> 帐号：</th>
                                    <td>
                                        <label for="formBean_username" style="display: none; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="text vam" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label>
										
										<input style="z-index: 1;" autocomplete="off" class="text vam" id="formBean_username" value="" name="user_name" maxlength="50" tabindex="1" type="text" placeholder="6~20个字符">
										       <span id="msg_username"></span>
                                    </td>
                                </tr>
								<tr>
                                	<th>密保问题：</th>
                                    <td>
                                        <label for="sec" style="display: none; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="text vam" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label>
										 <select name="secure_question" id="secure_question" style="z-index: 1;height:30px;" class="text vam">
										      <?php if(is_array($sec)): $i = 0; $__LIST__ = $sec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["secure_id"]); ?>"><?php echo ($vo["secure_question"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										 </select>
										 <span id="msg_secure"></span>
                                    </td>
                                </tr>
								
								
								
								
								 <tr>
                                	<th>答案：</th>
                                    <td>
                                        <label for="formBean_question" style="display: none; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="text vam" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label>
										
										<input style="z-index: 1;" autocomplete="off" class="text vam" id="formBean_question" value="" name="formBean.username" maxlength="50" tabindex="1" type="text" placeholder="6~20个字符">
										       <span id="msg_question"></span>
                                    </td>
                                </tr>
                                <tr>
                                	<th>验证码：</th>
                                    <td colspan="2">
                                        <label for="randomCode" style="display: block; position: absolute; cursor: text; float: left; z-index: 2; padding-left: 1px; padding-top: 1px;"><div class="verify vam ime-disabled" style="border: medium none; background: none repeat scroll 0% 0% transparent; cursor: text; margin: 2px; color: rgb(204, 204, 204);" tabindex="-1"></div></label>
										
										<input style="z-index: 1;" validator="validator11409906579764" autocomplete="off" class="verify vam ime-disabled" id="randomCode" name="formBean.randomCode" maxlength="4" tabindex="2" type="text" placeholder="不区分大小写">&nbsp;&nbsp;
										
										
                                        <img class="vam pointer" id="randomCodeImg" src="<?php echo U('Forget/verify');?>" onclick="this.src=this.src+'?'+Math.random();">
										
										<img class="vam pointer"  src="/jiadianshop/Public/Images/chg_image.png" id="randomCodeImg_do">
										
                                        <span id="msg_randomCode"></span>
                                    </td>
                                </tr>
                                <tr>
                                	<th>&nbsp;</th>
                                    <td>
                                        <input id="btnSubmit" class="button-next" value="下一步" tabindex="3" type="button">&nbsp;&nbsp;<span class="vam error" id="forget_msg"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="f"></div>
    	</div>
    </div>
	<script type="text/javascript">
	       $(function(){
		         function changeImg(){
				      $("#randomCodeImg")[0].src=$("#randomCodeImg")[0].src+'?'+Math.random();
				    
				 }
		         $("#randomCodeImg_do").click(function(){
						changeImg();
					  
				 });
		         
				 var mark=0;
				 
				 //<span class="vam icon-error">不合法或位数不够</span>
				 //'<span class="vam icon-ok"> </span>'
				 $("#formBean_username").focus(function(){
				 
				      $("#msg_username").html(''); 
				 
				 });
				 $("#formBean_username").blur(function(){
				     var name=$("#formBean_username").val();
					 
					 if((/^(\d|[a-z]){6,20}$/i.test(name))){
					     $.ajax({
						     url:"<?php echo U('Forget/checkName');?>",
							 type:'POST',
							 data:{
							    'name':name,
							 },
							 success:function(responseText,status,xhr){
							     if(status=='success'){
								     if(responseText==1){
									     mark=1;
									     $("#msg_username").html('<span class="vam icon-ok"></span>'); 
									 }else{
									     mark=0;
									     $("#msg_username").html('<span class="vam icon-error">用户不存在</span>'); 
									 }
								 }else{
								     mark=0;
								     $("#msg_username").html('<span class="vam icon-error">错误</span>');
								 
								 }
							 
							 },
							 error:function(){
							      mark=0;
							     $("#msg_username").html('<span class="vam icon-error">错误</span>');
							     
							 },
							 timeout:1000*60,
						 });
					 
					 }else{
					      mark=0;
						 $("#msg_username").html('<span class="vam icon-error">用户名不合法</span>');
					 
					 }
				 
				 
				 
				 
				 
				 });
				 //密保
				 $("#secure_question").focus(function(){
				      $("#msg_secure").html("");
				 
				 
				 });
				 //密保答案
				 $("#formBean_question").focus(function(){
				 
				     $("#msg_question").html("");
				 
				 
				 });
				 
				  
				 
				 
				 //对验证码验证
				 
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
					 
					 
					 //单击验证
					 
					 $("#btnSubmit").click(function(){
					     var name=$("#formBean_username").val();
						 var sec_answer=$("#formBean_question").val();
						 var secure_question=$("#secure_question").val();
						 var randomCode=$("#randomCode").val();
						 
					     if(name.length==0){
						      mark=0;
						     $("#msg_username").html('<span class="vam icon-error">用户不能为空</span>');
							 changeImg();
					     }
						 
					     if(secure_question.length==0){
						     mark=0;
						     $("#msg_secure").html('<span class="vam icon-error">密保需要选择</span>');
							 changeImg();
						  
						 }
						 
						 if(sec_answer.length==0){
						     mark=0;
							 $("#msg_question").html('<span class="vam icon-error">密保答案不能为空</span>');
							 changeImg();
							 
						 }
						 
						 if(randomCodeImg.length==0){
						     mark=0;
						     $("#msg_randomCode").html('<span class="vam icon-error">验证码不能为空</span>');
							 changeImg();
						 
						 }
						 
						 if(mark==1){
						     var url="<?php echo U('Forget/newPwd');?>";
						     $.ajax({
							     url:"<?php echo U('Forget/checkQuestion');?>",
							     type:"POST",
								 data:{
								     "sec_id":secure_question,
									 "sec_answer":sec_answer,
									 "user":name
								 },
								 dataType:'json',
								 success:function(responseText,status,xhr){
								     if(status=="success"){
									     if(responseText.user_status==1){
										     $("#forget_msg").html('<span class="vam icon-ok">验证通过,正在跳转..</span>');
										     window.location.href=url+'?unique='+responseText.unique;
										 }else{
										   $("#forget_msg").html('<span class="vam icon-error">验证不通过,请重试</span>');
										   changeImg();
										 }
									 }else{
									   $("#forget_msg").html('<span class="vam icon-error">失败,请重试</span>');
									   changeImg();
									 
									 }
								 },
								 error:function(){
								    $("#forget_msg").html('<span class="vam icon-error">失败,请重试</span>');
									changeImg();
								 },
								 timeout:60*1000,
							 
							 
							 });
						 
						 }
					 
					 });
					 
					 
					 
				 
				 
				  
		   
		   
		   });
	
	
	
	</script>
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