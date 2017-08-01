<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-cn">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>个人信息_个人中心_家电商城</title>
<link rel="shortcut icon" href="#">
<link href="/jiadianshop/Public/Css/person/ec.core.css" rel="stylesheet" type="text/css">
<link href="/jiadianshop/Public/Css/person/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>
</head>

<body>

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
    <b>|</b><a  href="<?php echo U('OrderCenter/index');?>"  rel="nofollow"  timetype="timestamp">我的订单</a><span  id="preferential"></span><b>|</b><a  href="#"  rel="nofollow"  class="red">帮助中心</a><b>|</b><!--<a  href="javascript:return  false;"  >商城手机版</a>-->

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

<!------------------搜索导航---作者:曹建伟------------------------------->
<script  src="/jiadianshop/Public/Js/base.js"></script>

<div  class="top-banner"  id="top-banner-block"></div>
<!----1----------------------------------------------------------------------------->
<!--------2-搜索条部分---------------------------------------------------------------->
<!--<script type="text/javascript" src="__JQUERY__"></script>-->
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>
<header  class="header">
	<div  class="layout">
		
		<div  class="logo"><a  href="<?php echo U('Index/index');?>"  title="家电商城"><img  src="/jiadianshop/Public/Images/new_logo.png"  alt="家电商城-logo"></a></div>
		
		<div  class="searchBar">
			
				<div  class="searchBar-key">
	<b>热门搜索：</b>
	
	    <!--------搜索上的几个关键商品--------->
		<a  href="<?php echo U('Search/index',array('keywords'=>'格力空调'));?>"  target="_blank">格力空调</a>
	    
	    
		<a  href="<?php echo U('Search/index',array('keywords'=>'美的空调'));?>"  target="_blank">美的空调</a>
	    
	    
		<a  href="<?php echo U('Search/index',array('keywords'=>'海尔冰箱'));?>"  target="_blank">海尔冰箱</a>
	    
	    
		<a  href="<?php echo U('Search/index',array('keywords'=>'小米电视'));?>"  target="_blank">小米电视</a>
	    
	    
	   <!--------搜索上的几个关键商品--------->
</div>
			<div  class="searchBar-form"  id="searchBar-area">
			    <!-----------搜索条------------------->
				<form  method="get"  action="" onsubmit="return false;">					
					
					
					
					<input  type="text"  class="text"  maxlength="100"  id="search_kw"  style="z-index: 1;"  autocomplete="off"  placeholder="请输入搜索关键字" style="height:18px;">
					
					<input  type="submit"  class="button"  value=" " id="submit_go">
					<input  type="hidden"  id="default-search"  value="格力空调">
				</form>
				<!-----------搜索条------------------->
			</div>
		</div>
		<script type="text/javascript">
		   $(function(){
		  
		      var url="<?php echo U('Search/index');?>";
			 
			  $("#submit_go").click(function(){
			     
			      var search_kw=$("#search_kw").val();
				     
				  if(search_kw.length==0){
				       alert('搜索关键字不能为空');
				  
				  }else{
				     window.location.href=url+'?keywords='+search_kw;
				  
				  }
			  
			  
			  
			  
			  });
			  
		   
		   
		   
		   
		   
		   
		   
		   
		   });
		
		
		
		</script>
		
		
		
		<div  class="header-toolbar">
			
			<div  class="header-toolbar-item"  id="header-toolbar-imall">
				
				<div  class="i-mall">
				     <!------------自己的商城---------------->
					<div  class="h"><a  href="<?php echo U('Memeber/index');?>"  rel="nofollow"  timetype="timestamp">我的商城</a>
					
					<i></i><s></s><u></u></div>
					  <!---------登录注册--------------------->
					<div  class="b"  id="header-toolbar-imall-content">
						<div  class="i-mall-prompt"  id="cart_unlogin_info" style="display:block;">
							<p>你好，请&nbsp;&nbsp;<a  href="<?php echo U('Login/index');?>"  rel="nofollow">登录</a> / <a  href="<?php echo U('Sign/index');?>"  rel="nofollow">注册</a></p>
							
						  
						</div>
						<div class="i-mall-prompt" id="cart_login_info" style="display:none">
							<p><a href="<?php echo U('Member/index');?>" id="cart_memeber"></a><em class="vip-state" id="vip-info">&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Member/index');?>" title="VMALL V0会员" id="vip-Active"><i class="icon-vip-level-0"></i></a></em></p>
						</div>
						 <!---------登录注册--------------------->
						<div  class="i-mall-uc "  id="cart_nlogin_info">
							<ul>
							     <!-----------代付款和-------------->
								<li><a  href="<?php echo U('OrderCenter/index');?>"  timetype="timestamp">待付款</a><span  id="toolbar-orderWaitingHandleCount">0</span></li>
								<li><a  href="<?php echo U('OrderCenter/index');?>"  timetype="timestamp">待评论</a><span  id="toolbar-notRemarkCount">0</span></li>
								<!------------代付款------------>
							</ul>
						</div>
						
						
						<div  class="i-mall-uc ">
							<p><br></p>
						</div>
					</div>
				</div>
			</div>
<script type="text/javascript">
    $(function(){
	     
	    $.ajax({
		     url:"<?php echo U('SmallCat/myShop');?>",
			 type:'POST',
			 dataType:'json',
			 success:function(responseText,status,xhr){
			    
			      if(status=='success'){
				      
				     if(responseText.login_status==1){
					   
					     $("#cart_login_info").show();
					     $("#cart_unlogin_info").hide();
					     var user_name=responseText.user_name;
						 $("#cart_login_info #cart_memeber").html(responseText.user_name);
						  //计算用户的级别
						 var ico_user_level="icon-vip-level-0";
						 switch(responseText.user_level){
						     case 5: ico_user_level="icon-vip-level-5";break;
						     case 4: ico_user_level="icon-vip-level-4";break;
						     case 3: ico_user_level="icon-vip-level-3";break;
						     case 2: ico_user_level="icon-vip-level-2";break;
						     case 1: ico_user_level="icon-vip-level-1";break;
						     case 0: ico_user_level="icon-vip-level-0";break;
							 default:ico_user_level="icon-vip-level-0";
						 }
						 $("#cart_login_info #vip-Active").find('i').addClass('ico_user_level');
						 $("#toolbar-orderWaitingHandleCount").html(responseText.unpay_count);
						  $("#toolbar-notRemarkCount").html(responseText.uncomment_count);
						 
					 }else{
					     $("#cart_unlogin_info").show();
					     $("#cart_login_info").hide();
					 }
				  }else{
				      $("#cart_unlogin_info").show();
					  $("#cart_login_info").hide();
				  
				  }
			 
			 },
			 
			 error:function(){
			       $("#cart_unlogin_info").show();
				   $("#cart_login_info").hide();
			 },
			 
			 timeout:60*1000,
		
		
		
		
		
		
		});
	
	
	
	
	
	
	
	}); 




</script>
			
			
			       <!--------------购物车的商品--------------------->
			<div  class="header-toolbar-item"  id="header-toolbar-minicart">
				
				<div class="minicart">
					<div class="h" id="header-toolbar-minicart-h"><a href="<?php echo U('Cart/index');?>" rel="nofollow" timetype="timestamp">我的购物车<span><em id="header-cart-total">0</em><b></b></span></a><i></i><s></s><u></u></div>
					    <div style="display:block;" class="b" id="header-toolbar-minicart-content">
						<div style="display:block;" class="minicart-pro-empty" id="minicart-pro-empty">
							<span class="icon-minicart">您的购物车是空的，赶紧选购吧！</span>
						</div>
						
						<div style="display:none;" id="minicart-pro-list-block">
						<ul class="minicart-pro-list" id="minicart-pro-list"><!--microCartList start-->
						<!--microCartList end-->
						</ul>
						</div>
						<div style="display:none;" class="minicart-pro-settleup" id="minicart-pro-settleup">
							<p>共<em id="micro-cart-total">1</em>件商品</p>
							<p>共计<b id="micro-cart-totalPrice">¥&nbsp;<span>2888.00<span></b></p>
							<a class="button-minicart-settleup" href="<?php echo U('Cart/index');?>">去结算</a>
						</div>
						
					</div>
				</div>
			</div>
<script type="text/javascript">
 //购物进行ajax处理
 $(function(){
         //鼠标移入移除事件
	  $("#header-toolbar-minicart-content").hide();
	 $("#header-toolbar-minicart-h").hover(function(){
	      $("#header-toolbar-minicart-content").show();
	 
	 },function(){
	      $("#header-toolbar-minicart-content").hide();
	 });
	 
	  $("#header-toolbar-minicart-content").hover(function(){
	         $(this).show();
	  
	  },function(){
	        $(this).hide();
	  });

     
	  //ajax查询数量和商品
	  
	  do_cat();
	  
function do_cat(){
	 $.ajax({
	     
		 url:"<?php echo U('SmallCat/myGoods');?>",
		 type:'GET',
		 dataType:'json',
		 success:function(responseText,status,xhr){
		     if(status=="success"){
			     if(responseText.cat_status==1){
				     $("#header-cart-total").html(responseText.content.total_nums);
					 $("#minicart-pro-empty").hide();
					 $("#minicart-pro-list-block").show();
					 $("#minicart-pro-list-block #minicart-pro-list").html(responseText.info);
					 $("#minicart-pro-settleup").show();
					 $("#minicart-pro-settleup #micro-cart-total").html(responseText.content.total_nums);
					 $("#minicart-pro-settleup #micro-cart-totalPrice").find('span').html(responseText.content.total_price.toFixed(2));
					 
				 }else{
				  $("#header-cart-total").html('0');
			      $("#minicart-pro-list-block").hide();
			      $("#minicart-pro-settleup").hide();
			      $("#minicart-pro-empty").show();
				 
				 }
			 
			 }else{
			  $("#header-cart-total").html('0');
			  $("#minicart-pro-list-block").hide();
			  $("#minicart-pro-settleup").hide();
			  $("#minicart-pro-empty").show();
			 
			 }
		   
		 },
		 error:function(){
		     $("#header-cart-total").html('0');
			 $("#minicart-pro-list-block").hide();
			 $("#minicart-pro-settleup").hide();
			 $("#minicart-pro-empty").show();
		 },
		 timeout:60*1000,
	 
	 
	 
	 
	 
	 
	 
	 });
 
} 

 //事件委托的形式添加事件

$("#minicart-pro-list").on('click',".icon-minicart-del",function(){
      var goods_id=$(this).next('input').val();
	  var parent_li=$(this).closest('li');
	    //ajax的形式删除元素
	  $.ajax({
	     url:"<?php echo U('SmallCat/delGoods');?>",
		 type:'POST',
		 data:{
		    'goods_id':goods_id,
		 },
		 dataType:'json',
		 success:function(responseText,status,xhr){
		     if(status=='success'){
			      //返回1 说明session 中删除成功!
			     if(responseText.del_status==1){
				    
					    //删除此条信息
					   
					  parent_li.remove();
					   //修改金额和总数量
					  $("#header-cart-total").html(responseText.total_num);
					  $("#minicart-pro-settleup #micro-cart-total").html(responseText.total_num);
					   $("#minicart-pro-settleup #micro-cart-totalPrice").find('span').html(responseText.total_money.toFixed(2));
	                 var lis=$("#minicart-pro-list li").size();
					 
					 if(lis<=0){
					   $("#header-cart-total").html('0');
			           $("#minicart-pro-list-block").hide();
			           $("#minicart-pro-settleup").hide();
			           $("#minicart-pro-empty").show();
					 
					 }else{
					 
					 
					 }
					
				 
				 }
			 }
		 
		 }
		 
	  
	  
	  
	  });
	  
});
 
 
 
 
 
 });
 




</script>			
			 <!--------------购物车的商品--------------------->
			
		</div>
	</div>			
</header>
<!--------2-搜索条部分---------------------------------------------------------------->

<!----------------------3-----导航条部分----------------------------------------------->

<textarea  id="micro-cart-tpl"  class="hide">
</textarea>




<!-- 导航 -->
﻿<!-----------------折叠-导航条---------------------------->
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>
<div  class="naver-main">
	<div  class="layout">
		
		<div  class="category"  id="category-block">
			
			<div  class="h"  id="category-h">
				<h2>全部商品</h2>
				<i  class="icon-category"  id="category-icon"></i>
			</div>
			<div class="b" id="category-list">
				<ul>
					<li>
						<h3><a href="#"><span>大家电</span></a></h3>
							<a href="<?php echo U('Search/index',array('keywords'=>'空调'));?>"><span>空调</span></a>
							<a href="<?php echo U('Search/index',array('keywords'=>'冰箱'));?>"><span>冰箱</span></a>
							<a href="<?php echo U('Search/index',array('keywords'=>'电视'));?>"><span>平板电视</span></a>
							<a href="<?php echo U('Search/index',array('keywords'=>'洗衣机'));?>"><span>洗衣机</span></a>
					</li>
					<li class="odd">
						<h3><a href="#"><span>生活电器</span></a></h3>
						<a href="#"><span>电风扇</span></a>
						<a href="#"><span>净化器</span></a>
						<a href="#"><span>扫地机</span></a>
					</li>
					<li>
						<h3><a href="#"><span>厨房电器</span></a></h3>
						<a href="#"><span>电饭煲</span></a>
						<a href="#"><span>电磁炉</span></a>
						<a href="#"><span>微波炉</span></a>
					</li>
					<li class="odd">
						<h3><a href="#" target="_blank"><span>五金家装</span></a></h3>
						<a href="#" target="_blank"><span>电动工具</span></a>
						<a href="#" target="_blank"><span>LED灯</span></a>
					</li>
				</ul>
			</div>

		</div>
<script type="text/javascript">
   $(function(){
       $.ajax({
	      'url':"<?php echo U('Category/index');?>",
		  'type':'GET',
		  'success':function(responseText,status,xhr){
		     if(status=='success'){
			     $("#category-list").find('ul').html(responseText);
				 $("#category-list ul li:odd").addClass('odd');
			 }else{
			     window.location.reload();
			 }
		  
		  }
	   
	   
	   
	   
	   });
   
   
   
   
   
   });
</script>	
		 <!-------------导航条---------------->
		<nav  class="naver">
				<ul  id="naver-list">
			<li  id="index"><a  href="<?php echo U('Index/index');?>"  class="current"><span>首 页
					</span></a>
					</li>
		<li  id="nav-sale"><a  href="<?php echo U('Search/index',array('keywords'=>'格力空调'));?>"  target="_blank"><span>格力空调
			<s><img  src="/jiadianshop/Public/Images/new.png"  alt="new"></s>
		</span></a> </li>
					
		<li  id="club"><a   href="<?php echo U('Search/index',array('keywords'=>'海尔冰箱'));?>" ><span>海尔冰箱
					</span></a> </li>
		<li  class=""><a  href="javascript:return false;"><span>精彩频道</span></a>
			
		</li>
</ul>
		</nav><!-- 20160516-导航-end -->
	</div>
</div>
<!-------------导航条---------------->
<script>
    
	$(function () {
		$('#naver-list li').hover(function () {
			$(this).addClass('hover');
		},function () {
			$(this).removeClass('hover');
		});
	});
	
	
</script>
			
		</nav>
	</div>
</div>
<script>
(function () {
	//所有分类显示隐藏控制
	var isIndex =  false,
		categoryBlock = gid('category-block');
		
	if(isIndex) return;

	categoryBlock.onmouseover = function () {
		categoryBlock.className = 'category category-hove';
	};
	categoryBlock.onmouseout = function () {
		categoryBlock.className = 'category';
	};
	
}());
$(function () {
	//分类间隔背景色
	$('#category-list li:odd').addClass('odd');
	$('#category-list li a').click(function () {
		setTimeout(function () {
			var id = location.hash.split("#", 2)[1];
			if(id)return ec.product.showCategory(gid('pro-cate-'+ id) , id);
		}, 200);
		
	});
});
</script>
<script>
(function(){
	var n = $("#nav-1");
	n.children("a").addClass("current");
	n.siblings().children("a").removeClass("current");
})();
</script>
<div class="hr-10"></div>
<div class="g">
	<!--面包屑 -->
	<div class="breadcrumb-area icon-breadcrumb fcn">您现在的位置：
		<a href="<?php echo U('Index/index');?>" title="首页">首页</a>&nbsp;&gt;&nbsp;
		<span id="personCenter"><a href="<?php echo U('Member/index');?>" title="个人中心">个人中心</a></span>
		<span id="pathPoint">&nbsp;&gt;&nbsp;</span>
		<b id="pathTitle">个人信息</b>
	</div>
</div>
<div class="hr-15"></div>
<div class="g">
    <div class="fr u-4-5"><!--栏目 -->
		<div class="part-area clearfix">
			<div class="fl">
				<h3 class="userInfo-title"><span>个人信息</span></h3>
			</div>
		</div>
		<div class="hr-20"></div>
		<!--个人信息 -->
		<div class="userInfo-area">
			<form id="personal-save" autocomplete="off" method="post" onsubmit="return return false;">
				<div class="userInfo-form-title">
					<b>基本信息</b>
					<span>（带<em>*</em>为必填项目）</span>
				</div>
				<div class="form-edit-area">
					<div class="form-edit-table">
						<table border="0" cellpadding="0" cellspacing="0" width="90%">
							<tbody>
								<tr>
									<th>用&nbsp;&nbsp;户&nbsp;&nbsp;名：</th>
									<td><span><?php echo ($user_info["user_name"]); ?></span>
										
									</td>
								</tr>
								<tr>
									<th><span class="required">*</span>真实姓名：</th>
									<td><input maxlength="20" name="true_name" id="true_name" type="text" class="text vam span-200" value="<?php echo ($user_info["true_name"]); ?>" ></td>
								</tr>
								<tr>
									<th>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</th>
									<td><input maxlength="20" name="email" type="text" class="text vam span-200" value="<?php echo ($user_info["user_email"]); ?>"  id="user_email"></td>
								</tr>
								
								<tr>
									<th><span class="required">*</span>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</th>
									<td>
									   <?php if($user_info['user_sex'] == 1): ?><input name="sex" id="man" type="radio" class="radio vam" value="1" checked>
										<label for="man" class="vam">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
										<?php else: ?>
										<input name="sex" id="man" type="radio" class="radio vam" value="1">
										<label for="man" class="vam">男</label>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
									 <?php if($user_info['user_sex'] == 2): ?><input name="sex" id="woman" type="radio" class="radio vam" value="2" checked>
										<label for="woman" class="vam">女</label>
									 <?php else: ?>
									     <input name="sex" id="woman" type="radio" class="radio vam" value="2" checked>
										 <label for="woman" class="vam">女</label><?php endif; ?>
									 <?php if($user_info['user_sex'] == 0): ?><input name="sex" id="woman" type="radio" class="radio vam" value="0" checked>
										<label for="woman" class="vam">保密</label>
									 <?php else: ?>
									     <input name="sex" id="woman" type="radio" class="radio vam" value="0" checked>
										 <label for="woman" class="vam">保密</label><?php endif; ?>
									</td>
								</tr>
								<tr>
									<th>注册时间：</th>
									<td><?php echo (date("Y-m-d H:i:s",$user_info["user_login_time"])); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="margin-left:50px;">
					<span class="required">*</span>密保问题：
					
						<select style="height:26px;" name="secure" id="secure_question">
						  <?php if(is_array($secure_info)): $i = 0; $__LIST__ = $secure_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["secure_id"] == $user_info['secure_id']): ?><option value="<?php echo ($vo["secure_id"]); ?>" selected><?php echo ($vo["secure_question"]); ?></option>
							   <?php else: ?>
							    <option value="<?php echo ($vo["secure_id"]); ?>"><?php echo ($vo["secure_question"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select><br/><br/>
						<span class="required">*</span>密保答案：<input type="text" id="secure_answer" value="<?php echo ($user_info['user_answer']); ?>" name="secure_answer" style="width:210px;height:22px;color:">
					
				</div><br/><br/>

				<div class="form-edit-action">
				     
					<input type="button" id="user_info_submit" class="button-action-save vam" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="button-action-cancel-2 vam" value=" " type="reset">
				</div>
				<input type="hidden" id="randomFlag" value="ed8df6720c0590632d7f2ed0425b171a">
			</form>
			<!-- 个人中心会员专享信息 -->
			<p><br></p>	
		</div>
	</div>
<script type="text/javascript">
 $(function(){
     var user_info_submit=$("#user_info_submit");//提交按钮
	
	  //单击按钮进行验证
     user_info_submit.click(function(){
             var submit_status=1;
		     var true_name=$("#true_name").val(); //真实姓名
			 var user_email=$("#user_email").val(); //用户的邮箱
			 var user_sex=$("input[name=sex]").val();//用户性别
			 var secure_question=$("#secure_question").val();//密保问题的按钮
			 var secure_answer=$("#secure_answer").val();//密保答案
             if(true_name.length<1){
			      alert("真实姓名不能为空!");
				  submit_status=0;
				  return ;
			 }
             if(secure_question<0){
			      alert("必须选择密保问题!");
				  submit_status=0;
				  return ; 
			 }
			 
			  if(secure_answer.length<0){
			      alert("密保必须填写!");
				  submit_status=0;
				  return ; 
			 }
			    //进行后台提交修改
			 if(submit_status==1){
			     $.ajax({
				      url:"<?php echo U('PersonCenter/modifierUser');?>",
					  type:"POST",
					  data:{
					     'true_name': true_name,
						 'user_email':user_email,
						 'user_sex':user_sex,
						 "secure_question":secure_question,
						 "secure_answer":secure_answer,
					  },
					  success:function(responseText,status,xhr){
					      
					      if(status=='success'){
						       if(responseText==1){
							      alert("修改成功");
							   }else{
							      alert("修改失败");
							   }
						  }else{
						     alert("修改失败!");
						  }
					  
					  },
					  error:function(){
					     alert("修改失败!");
					  },
					  timeout:60*1000,
				 });
			 
			 
			 }
  
     });
  
	  
 
 
 
 
 
 
 
 });



</script>
	<div class="fl u-1-5">
	<!--左边菜单 -->
		<div class="mc-menu-area">
			<div class="h"><a href="#" class="button-go-mc" title="个人中心"><span>个人中心</span></a></div>
			<div class="b">
		  <ul>
        	<li>
        	<h3>订单中心</h3>
            	<ol>
                	<li id="li-order"><a href="<?php echo U('OrderCenter/index');?>" title="我的订单"><span>我的订单</span></a></li>
                   
                </ol>
            </li>
            <li>
            <h3>个人中心</h3>
            	<ol>
                	<li id="li-account" class='current'><a href="<?php echo U('PersonCenter/index');?>" title="个人信息"><span>个人信息</span></a></li>
                    <li id="li-security"><a href="<?php echo U('PersonCenter/pwd');?>" title="密码管理"><span>密码管理</span></a></li>
                    <li id="li-balance" ><a href="<?php echo U('PersonCenter/account');?>" title="账户余额"><span>账户余额</span></a></li>
                    <li id="li-myAddress"><a href="<?php echo U('PersonCenter/address');?>" title="收货信息"><span>收货信息</span></a></li>
					<li id="li-enterprise" class="hide"></li>
                </ol>
            </li>
            <li>
            <h3>社区中心</h3>
            	<ol>
                	<li id="li-prdRemark"><a href="<?php echo U('Comment/index');?>" title="商品评价"><span>商品评价</span></a></li>
                </ol>
            </li>
        </ul>
			</div>
			<div class="f"></div>
			</div>
		</div>
	</div>
	<div class="hr-60"></div>
<!--20160530 -->


<!--20160523 -->

<div class="slogan">
	<ul>
		<li class="s1"><i></i>666强企业&nbsp;品质保证</li>
		<li class="s2"><i></i>7天退货&nbsp;15天换货</li>
		<li class="s3"><i></i>200元起免运费</li>
		<li class="s4"><i></i>888家维修网点&nbsp;全国联保</li>
	</ul>
</div><!--end -->
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
      //用户意见提交的控制代码
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
	</body>
</html>