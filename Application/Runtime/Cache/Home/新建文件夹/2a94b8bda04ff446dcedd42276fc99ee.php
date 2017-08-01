<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家电商城官网 -提供大家电(空调、冰箱、电视机、、洗衣机等)、生活电器、厨房电器等</title>
<link href="/jiadianshop/Public/Css/ec.core.css" rel="stylesheet" type="text/css">
<link href="/jiadianshop/Public/Css/index.css" rel="stylesheet" type="text/css">
<link href="/jiadianshop/Public/Css/ad.css" rel="stylesheet" type="text/css">
<link href="/jiadianshop/Public/Css/aad.css" rel="stylesheet" type="text/css">
<script src="/jiadianshop/Public/Js/jsapi.js" namespace="ec"></script>
<script src="/jiadianshop/Public/Js/jquery-1.4.4.min.js"></script>
<script src="/jiadianshop/Public/Js/ec.core.js"></script>
<script src="/jiadianshop/Public/Js/ec.business.js"></script> 
<script src="/jiadianshop/Public/Js/html5shiv.js"></script>
<script type="text/javascript" src="/jiadianshop/Public/Js/jquery.min.js"></script>
<style type="text/css">
   #searchBar-area  #search_kw{
   
      height:30px;
   }




</style>
</head>

<body class="wide" style="background:#fff">
	
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
    <b>|</b><a  href="<?php echo U('OrderCenter/index');?>"  rel="nofollow"  timetype="timestamp">我的订单</a><span  id="preferential"></span><b>|</b><a  href="<?php echo U('Help/vmall');?>"  rel="nofollow"  class="red">帮助中心</a><b>|</b><a  href="javascript:return  false;"  >商城手机版</a>

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
<script type="text/javascript" src="__JQUERY__"></script>
<header  class="header">
	<div  class="layout">
		
		<div  class="logo"><a  href="{:U('Index/index')}"  title="Vmall.com - 华为商城"><img  src="/jiadianshop/Public/Images/newLogo.png"  alt="Vmall.com - 华为商城"></a></div>
		
		<div  class="searchBar">
			
				<div  class="searchBar-key">
	<b>热门搜索：</b>
	
	    <!--------搜索上的几个关键商品--------->
		<a  href="{:U('Search/index')}?keywords='畅玩版'"  target="_blank">畅玩版</a>
	    
	    
		<a  href="{:U('Search/index')}?keywords=荣耀3C"  target="_blank">荣耀3C</a>
	    
	    
		<a  href="{:U('Search/index')}?keywords=X1"  target="_blank">X1</a>
	    
	    
		<a  href="{:U('Search/index')}?keywords=P7"  target="_blank">华为P7</a>
	    
	    
		<a  href="{:U('Search/index')}?keywords=荣耀立方"  target="_blank">荣耀立方</a>
	   <!--------搜索上的几个关键商品--------->
</div>
			<div  class="searchBar-form"  id="searchBar-area">
			    <!-----------搜索条------------------->
				<form  method="get"  action="" onsubmit="return false;">					
					
					
					
					<input  type="text"  class="text"  maxlength="100"  id="search_kw"  style="z-index: 1;"  autocomplete="off"  placeholder="请输入搜索关键字" style="height:18px;">
					
					<input  type="submit"  class="button"  value=" " id="submit_go">
					<input  type="hidden"  id="default-search"  value="荣耀6">
				</form>
				<!-----------搜索条------------------->
			</div>
		</div>
		<script type="text/javascript">
		   $(function(){
		  
		      var url="{:U('Search/index')}";
			 
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
					<div  class="h"><a  href="{:U('Memeber/index')}"  rel="nofollow"  timetype="timestamp">我的商城</a>
					
					<i></i><s></s><u></u></div>
					  <!---------登录注册--------------------->
					<div  class="b"  id="header-toolbar-imall-content">
						<div  class="i-mall-prompt"  id="cart_unlogin_info" style="display:block;">
							<p>你好，请&nbsp;&nbsp;<a  href="{:U('Login/index')}"  rel="nofollow">登录</a> / <a  href="{:U('Sign/index')}"  rel="nofollow">注册</a></p>
							
						  
						</div>
						<div class="i-mall-prompt" id="cart_login_info" style="display:none">
							<p><a href="{:U('Member/index')}" id="cart_memeber"></a><em class="vip-state" id="vip-info">&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('Member/index')}" title="VMALL V0会员" id="vip-Active"><i class="icon-vip-level-0"></i></a></em></p>
						</div>
						 <!---------登录注册--------------------->
						<div  class="i-mall-uc "  id="cart_nlogin_info">
							<ul>
							     <!-----------代付款和-------------->
								<li><a  href="{:U('OrderCenter/index')}"  timetype="timestamp">待付款</a><span  id="toolbar-orderWaitingHandleCount">0</span></li>
								<li><a  href="{:U('OrderCenter/index')}"  timetype="timestamp">待评论</a><span  id="toolbar-notRemarkCount">0</span></li>
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
		     url:"{:U('SmallCat/myShop')}",
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
					<div class="h" id="header-toolbar-minicart-h"><a href="{:U('Cart/index')}" rel="nofollow" timetype="timestamp">我的购物车<span><em id="header-cart-total">0</em><b></b></span></a><i></i><s></s><u></u></div>
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
							<a class="button-minicart-settleup" href="{:U('Cart/index')}">去结算</a>
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
	     
		 url:"{:U('SmallCat/myGoods')}",
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
	     url:"{:U('SmallCat/delGoods')}",
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
<div class="naver-main">
	<div class="layout">
		<!-- 20130909-分类-start -->
		<div class="category category-index" id="category-block">
			<!-- 20130909-分类-start -->
			<div class="h" id="category-h">
				<h2>全部商品</h2>
				<i class="icon-category" id="category-icon"></i>
			</div>
			<div class="b" id="category-list">
				<ul>
					<li>
						<h3><a href="#"><span>大家电</span></a></h3>
							<a href="#"><span>空调</span></a>
							<a href="#"><span>冰箱</span></a>
							<a href="#"><span>平板电视</span></a>
							<a href="#"><span>洗衣机</span></a>
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
		<!-- 20130909-分类-end -->
		<!-- 20130909-导航-start -->
		<nav class="naver">
			<ul id="naver-list">
				<li id="index">
					<a href="#" class="current">
						<span>首 页</span>
					</a>
				</li>
				<li id="nav-sale">
					<a href="<?php echo U('Product/index',array('g'=>2));?>" target="_blank">
					<span>格力空调<s><img src="/jiadianshop/Public/Images/new.png" alt="new"></s></span></a>
				</li>
				
				<li id="club">
					<a href="<?php echo U('Product/index',array('g'=>1));?>" target="_blank">
					<span>海尔冰箱</span></a>
				</li>
				<li>
					<a href="javascript:return false;"><span>精彩频道</span><i></i></a>
					
				</li>
			</ul>
		</nav><<!-- 20130909-导航-end -->
	</div>
</div>

<!-- 20130904-热门板-start -->
<div class="hot-board">
	<script type="text/javascript">
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	 var btn = "<div class='btnBg'></div><div class='btn'>";
 	for(var i=0; i < len; i++) {
 		btn += "<span></span>";
 	}
	 btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
 	$("#focus").append(btn);
	 $("#focus .btnBg").css("opacity",0.5);

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .btn span").css("opacity",0.4).mouseenter(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");

	//上一页、下一页按钮透明度处理
	 $("#focus .preNext").css("opacity",0.2).hover(function() {
		<!-- $(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		 $(this).stop(true,false).animate({"opacity":"0.2"},300);
	 });

	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},3000); //此3000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
});

</script>
	<div class="wrapper" style="height:350px">
		<div id="focus">
			<ul>
				<li><a href="#"><img src="/jiadianshop/Public/Images/20140902173833602.jpg" alt="HW商城" /></a></li>
				<li><a href="#"><img src="/jiadianshop/Public/Images/20140903183551979.jpg" alt="HW商城" /></a></li>
				<li><a href="#"><img src="/jiadianshop/Public/Images/20140902135825589.jpg" alt="HW商城" /></a></li>
				<li><a href="#"><img src="/jiadianshop/Public/Images/20140715104638522.jpg" alt="HW商城" /></a></li>
				<li><a href="#"><img src="/jiadianshop/Public/Images/20140702124823618.jpg" alt="HW商城" /></a></li>
			</ul>
		</div>
	</div><!-- wrapper end -->
</div>
<!-- 20130904-热门板-end -->

<div class="hr-20"></div>
<div class="layout">
	<div class="fl u-4-3">
<!-- 20130904-频道-优惠-start -->
<div class="channel-favorable">
	<ul class="channel-pro-list" id="main-sale-list">
		<?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="1" class="channel-pro-item channel-pro-favorable-item-1">
				<div class="channel-pro-panels">
					<div class="pro-info">
						<div class="p-img">
							<a href="<?php echo U('Product/index',array('g'=>$vo['goods_id']));?>" title="{$vo.index_sale_title}" target="_blank"><img src="__UPLOAD__<?php echo ($vo["index_sale_img"]); ?>" alt="#"></a>
						</div>
						<div class="p-name"><a href="/product/1348.html" title="#" target="_blank">
						<?php echo ($vo["index_sale_title"]); ?></a></div>
						<div class="p-shining">
							<div class="p-slogan"><?php echo ($vo["index_sale_keywords"]); ?></div>
						</div>
						<div class="p-price"><em>¥</em><span><?php echo ($vo["goods_original_price"]); ?></span></div>
						<div class="p-button">
							<a href="<?php echo U('Product/index',array('g'=>$vo['goods_id']));?>" target="_blank" class="channel-button">立即抢购</a>
						</div>
						<div class="p-countdown hide">
							<span class="p-time"></span>
							<span class="p-quantity" style="display:none"></span>
						</div>
						
						 <?php if($vo['goods_state'] == '热卖'): ?><i  class="p-tag"><img  src="/jiadianshop/Public/Images/1382542488099.png"  style=""></i>
				         <?php elseif($vo['goods_state'] == '新品'): ?>
					         <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542518162.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '人气'): ?>
				           <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542555129.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '首发'): ?>
				             <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382593860805.png"  style=""></i>  
					 
			              <?php else: ?>
					              <i class="p-tag"></i><?php endif; ?>
					</div>
				</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div><!-- 20130904-频道-优惠-end --></div>
	<div class="fr u-4-1">
<!-- 20130904-频道-促销-start -->
<div class="channel-sale">
	<div class="ec-slider" id="group-slider" style="width: 276px; height: 310px;">
		<ul class="channel-pro-list ec-slider-list" id="slider-sale-list" style="width: 1656px; height: 310px;">
			<li class="channel-pro-item ec-slider-item" data-block="slider" style="width: 276px; height: 310px;">
				<p><a target="_blank" href="#"><img src="/jiadianshop/Public/Images/20140830182737537.jpg" title="荣耀6_联通购机送费.jpg"></a><br></p>
			</li>
		</ul>
	</div>
</div>

<!-- 20130904-频道-促销-end -->
		<div class="hr-20"></div>
		<!-- 新闻公告-start -->
		<div class="ecnews-area">
			<div class="h">
				<div class="h-tab">
					<ul>
						<li class="current" id="tab-notice"><a href="/notice-list">公告</a></li>
						<li id="tab-news"><a href="/news-list">新闻</a></li>
					</ul>
				</div>
			</div>
			<div class="b">
				<ul id="tab-notice-content">
					<li><a href="/notice-388" title="荣耀3C畅玩版&amp;荣耀平板新品首发——诚意之作" target="_blank">荣耀3C畅玩版&amp;荣耀平板新品首发——诚意之作</a></li>
					<li><a href="/notice-387" title="会员福利专场，爆款抢购4折起，  天天报到抽大奖" target="_blank">会员福利专场，爆款抢购4折起，  天天报到抽大奖</a></li>
					<li><a href="/notice-383" title="华为麦芒C199天翼4G手机震撼首发" target="_blank">华为麦芒C199天翼4G手机震撼首发</a></li>
					<li><a href="/notice-382" title="荣耀3C 4G版全系直降，真情回馈新老用户" target="_blank">荣耀3C 4G版全系直降，真情回馈新老用户</a></li>
					<li><a href="/notice-381" title="邮轮旅行荣耀起航，购荣耀家族送500元邮轮现金券" target="_blank">邮轮旅行荣耀起航，购荣耀家族送500元邮轮现金券</a></li>
				</ul>
				<ul id="tab-news-content" class="hide">
					<li><a href="/news-390" title="华为荣耀发布性价比神器荣耀3C畅玩版/平板" target="_blank">华为荣耀发布性价比神器荣耀3C畅玩版/平板</a></li>
					<li><a href="/news-384" title="华为大篷车亮相青海湖199公里磨砺青春麦芒" target="_blank">华为大篷车亮相青海湖199公里磨砺青春麦芒</a></li>
					<li><a href="/news-385" title="荣耀6成为国产最强爆款 比肩苹果三星" target="_blank">荣耀6成为国产最强爆款 比肩苹果三星</a></li>
					<li><a href="/news-321" title="双C设计，华为G6传承与突破" target="_blank">双C设计，华为G6传承与突破</a></li>
					<li><a href="/news-312" title="华为发布多款创新智能终端 4G生活无界限" target="_blank">华为发布多款创新智能终端 4G生活无界限</a></li>
				</ul>
			</div>
		</div><!-- 新闻公告-end -->
		<div class="hr-20"></div>
		<!-- 20130909-ad-218*132-start -->
		<div class="banner">
			<p><a target="_blank" href="#"><img src="/jiadianshop/Public/Images/20140509105527587.jpg"></a></p>
		</div><!-- 20130909-ad-218*132-start -->
		<div class="hr-20"></div>
	</div>
</div>
<div class="layout">
	<!-- 20130903-ad-1000*160-start -->
	<div class="banner">
		<!-- 20130903-ad-图片轮换-start -->
		<script type="text/javascript">
			$(function() {
			var sWidth = $("#focuss").width(); //获取焦点图的宽度（显示面积）
			var len = $("#focuss ul li").length; //获取焦点图个数
			var index = 0;
			var picTimer;
	
			//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
			var btn = "<div class='btnBg'></div><div class='btn'>";
			for(var i=0; i < len; i++) {
			btn += "<span></span>";
			}
			btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
			$("#focuss").append(btn);
			$("#focuss .btnBg").css("opacity",0.5);

			//为小按钮添加鼠标滑入事件，以显示相应的内容
			$("#focuss .btn span").css("opacity",0.4).mouseenter(function() {
				index = $("#focuss .btn span").index(this);
				showPics(index);
			}).eq(0).trigger("mouseenter");

			//上一页、下一页按钮透明度处理
			$("#focuss .preNext").css("opacity",0.2).hover(function() {
				$(this).stop(true,false).animate({"opacity":"0.5"},300);
			},function() {
				$(this).stop(true,false).animate({"opacity":"0.2"},300);
			});

			//上一页按钮
			$("#focuss .pre").click(function() {
				index -= 1;
				if(index == -1) {index = len - 1;}
				showPics(index);
			});

			//下一页按钮
			$("#focuss .next").click(function() {
				index += 1;
				if(index == len) {index = 0;}
				showPics(index);
			});

			//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
			$("#focuss ul").css("width",sWidth * (len));
	
			//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
			$("#focuss").hover(function() {
				clearInterval(picTimer);
			},function() {
				picTimer = setInterval(function() {
					showPics(index);
					index++;
					if(index == len) {index = 0;}
				},3000); //此4000代表自动播放的间隔，单位：毫秒
			}).trigger("mouseleave");
	
			//显示图片函数，根据接收的index值显示相应的内容
			function showPics(index) { //普通切换
				var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
				$("#focuss ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
				//$("#focuss .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
				$("#focuss .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
			}
		});
		</script>
		<div class="wrapper" style="height:160px">
			<div id="focuss" style="height:160px">
				<ul>
					<li><a href="#"><img src="/jiadianshop/Public/Uploads/Focus/focus01.jpg" alt="焦点图" /></a></li>
					<li><a href="#"><img src="/jiadianshop/Public/Uploads/Focus/focus02.jpg" alt="焦点图" /></a></li>
					<li><a href="#"><img src="/jiadianshop/Public/Uploads/Focus/focus03.jpg" alt="焦点图" /></a></li>
					<li><a href="#"><img src="/jiadianshop/Public/Images/20140830171414397.jpg" alt="HW商城" /></a></li>
					<li><a href="#"><img src="/jiadianshop/Public/Images/20140904180339478.jpg" alt="HW商城" /></a></li>
				</ul>
			</div>
		</div><!-- wrapper end -->
	</div><!-- 20130903-ad-1000*160-end -->
</div>

<div class="layout">
	<!-- 20130904-频道-楼层-start -->
	<div class="channel-floor">
		<div class="h">
			<h2><a href="javascript:void(0)" title="空调">空调</a></h2>
			<em class="channel-subtitle">品牌空调</em>
			<ul class="channel-nav">
				<li><a href="javascript:void(0)" >空调</a></li>
				<li><a href="javascript:void(0)" >配件</a></li>
			</ul>
		</div>
		<div class="b">
			<ul class="channel-pro-list">
				<?php if(is_array($kongtiao)): $k = 0; $__LIST__ = $kongtiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if(($vo['index_sale_id']) == "9"): ?><li id="<?php echo ($vo["index_sale_id"]); ?>" class="channel-pro-item channel-pro-rec-item">
							<div class="channel-pro-panels">
								<div class="pro-info">
									<div class="p-img">
										<a href="<?php echo U('Goods/index',array('g'=>$vo['goods_id']));?>" title="<?php echo ($vo["index_sale_title"]); ?>" target="_blank" rel="nofollow">
											<img src="__UPLOAD__<?php echo ($vo["index_sale_img"]); ?>">
										</a>
									</div>
									<div class="p-name">
										<a href="<?php echo U('Product/index',array('g'=>$vo['goods_id']));?>" title="#" target="_blank">
									<?php echo ($vo["index_sale_title"]); ?>
										</a>
									</div>
									<div class="p-shining">
										<div class="p-slogan"><?php echo ($vo["index_sale_keywords"]); ?></div>
										<div class="p-promotions">尊享配件豪礼</div>
									</div>
									<div class="p-price"><em>¥</em><span>{$vo.goods_original_price}</span></div>
									<div class="p-button"><a href="<?php echo U('Product/index',array('g'=>$vo['goods_id']));?>" target="_blank" class="channel-button" title="立即抢购">立即抢购</a></div>
									
									
									 <?php if($vo['goods_state'] == '热卖'): ?><i  class="p-tag"><img  src="/jiadianshop/Public/Images/1382542488099.png"  style=""></i>
				         <?php elseif($vo['goods_state'] == '新品'): ?>
					         <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542518162.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '人气'): ?>
				           <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542555129.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '首发'): ?>
				             <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382593860805.png"  style=""></i>  
					 
			              <?php else: ?>
					              <i class="p-tag"></i><?php endif; ?>
									
									
								</div>
							</div>
						</li>
					<?php else: ?>
						<li id="<?php echo ($vo["index_sale_id"]); ?>" class="channel-pro-item">
							<div class="channel-pro-panels">
								<div class="pro-info">
									<div class="p-img">
										<a href="#" title="<?php echo ($vo["index_sale_title"]); ?>" target="_blank" rel="nofollow">
											<img alt="" src="<?php echo ($vo["goods_thumb_img"]); ?>">
										</a>
									</div>
									<div class="p-name">
										<a href="<?php echo U('Product/index',array('g'=>$vo['goods_id']));?>" title="<?php echo ($vo["index_sale_title"]); ?>" target="_blank">
									     <?php echo ($vo["goods_name"]); ?>
											<span class="p-slogan"><?php echo ($vo["index_sale_keywords"]); ?></span>
										</a>
									</div>
									<div class="p-price"><em>¥</em><span><?php echo ($vo["market_price"]); ?></span></div>
									 <?php if($vo['goods_state'] == '热卖'): ?><i  class="p-tag"><img  src="/jiadianshop/Public/Images/1382542488099.png"  style=""></i>
				         <?php elseif($vo['goods_state'] == '新品'): ?>
					         <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542518162.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '人气'): ?>
				           <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542555129.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '首发'): ?>
				             <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382593860805.png"  style=""></i>  
					 
			              <?php else: ?>
					              <i class="p-tag"></i><?php endif; ?>
								</div>
							</div>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div><!-- 20130904-频道-楼层-end -->
</div>
<div class="hr-20"></div>
<div class="layout">
	<!-- 20130904-频道-楼层-start -->
	<div class="channel-floor">
		<div class="h">
			<h2><a href="javascript:void(0)" title="平板电脑" target="_blank">平板电脑</a></h2>
			<em class="channel-subtitle">华为精品平板</em>
			<ul class="channel-nav">
				<li><a href="/list-9#10" target="_blank">平板电脑</a></li>
				<li><a href="/list-9#11" target="_blank">配件</a></li>
			</ul>
		</div>
		<div class="b">
			<ul class="channel-pro-list">
			  <?php if(is_array($compt)): $k = 0; $__LIST__ = $compt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if(($vo['index_sale_id']) == "16"): ?><li id="{$vo.index_sale_id}" class="channel-pro-item channel-pro-rec-item">
							<div class="channel-pro-panels">
								<div class="pro-info">
									<div class="p-img">
										<a href="{:U('Product/index',array('g'=>$vo['goods_id']))}" title="{$vo.index_sale_title}" target="_blank" rel="nofollow">
											<img src="__UPLOAD__{$vo.index_sale_img}">
										</a>
									</div>
									<div class="p-name">
										<a href="{:U('Product/index',array('g'=>$vo['goods_id']))}" title="#" target="_blank">
									{$vo.index_sale_title}
										</a>
									</div>
									<div class="p-shining">
										<div class="p-slogan">{$vo.index_sale_keywords}</div>
									</div>
									<div class="p-price"><em>¥</em><span>{$vo.goods_original_price}</span></div>
									<div class="p-button"><a href="{:U('Product/index',array('g'=>$vo['goods_id']))}" target="_blank" class="channel-button" title="立即抢购">立即抢购</a></div>
									
									
									<?php if($vo['goods_state'] == '热卖'): ?><i  class="p-tag"><img  src="/jiadianshop/Public/Images/1382542488099.png"  style=""></i>
				         <?php elseif($vo['goods_state'] == '新品'): ?>
					         <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542518162.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '人气'): ?>
				           <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542555129.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '首发'): ?>
				             <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382593860805.png"  style=""></i>  
					 
			              <?php else: ?>
					              <i class="p-tag"></i><?php endif; ?>
								</div>
							</div>
						</li>
					<?php else: ?>
						<li id="{$vo.index_sale_id}" class="channel-pro-item">
							<div class="channel-pro-panels">
								<div class="pro-info">
									<div class="p-img">
										<a href="{:U('Product/index',array('g'=>$vo['goods_id']))}" title="{$vo.index_sale_title}" target="_blank" rel="nofollow">
											<img alt="" src="__UPLOAD__{$vo.index_sale_img}">
										</a>
									</div>
									<div class="p-name">
										<a href="{:U('Product/index',array('g'=>$vo['goods_id']))}" title="{$vo.index_sale_title}" target="_blank">
									{$vo.index_sale_title}
											<span class="p-slogan">{$vo.index_sale_keywords}</span>
										</a>
									</div>
									<div class="p-price"><em>¥</em><span>{$vo.goods_original_price}</span></div>
									
									
									 <?php if($vo['goods_state'] == '热卖'): ?><i  class="p-tag"><img  src="/jiadianshop/Public/Images/1382542488099.png"  style=""></i>
				         <?php elseif($vo['goods_state'] == '新品'): ?>
					         <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542518162.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '人气'): ?>
				           <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382542555129.png"  style=""></i>
				        <?php elseif($vo['goods_state'] == '首发'): ?>
				             <i class="p-tag"><img  src="/jiadianshop/Public/Images/1382593860805.png"  style=""></i>  
					 
			              <?php else: ?>
					              <i class="p-tag"></i><?php endif; ?>
								</div>
							</div>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div><!-- 20130904-频道-楼层-end -->
</div>
<div class="hr-20"></div>
<div class="layout">
	<!-- 20130903-ad-762*132-start -->
	<div class="ad fl"><a target="_blank" href="#"><img src="/jiadianshop/Public/Images/20140825101353417.jpg" title="M1" style="float:none;"></a></div>
	<!-- 20130903-ad-762*132-end -->
</div>
<div class="hr-40"></div>
<!-- 20130902-关注-start -->
<div class="follow">
	<div class="layout">
		<ul>
			<li><a href="#" class="follow-sina"><img alt="关注新浪微博" src="/jiadianshop/Public/Images/follow_sina.png"></a></li>
			<li><a href="#" class="follow-weibo"><img alt="关注腾讯微博" src="/jiadianshop/Public/Images/follow_weibo.png"></a></li>
			<li onmouseout="this.className=''" onmouseover="this.className='hover'" class=""><a href="javascript:;" class="follow-android"><img alt="下载手机客户端" src="/jiadianshop/Public/Images/follow_android.png"></a><div class="follow-panel follow-panel-qrcode"><img src="/jiadianshop/Public/Images/img67.png"><p><b>扫描二维码下载</b></p><s></s></div></li>
		</ul>
	</div>
</div>
<!-- 20130902-关注-end -->
<!--口号-20121025 -->
<div class="slogan">
	<ul>
		<li class="s1"><i></i>500强企业&nbsp;品质保证</li>
		<li class="s2"><i></i>7天退货&nbsp;15天换货</li>
		<li class="s3"><i></i>200元起免运费</li>
		<li class="s4"><i></i>448家维修网点&nbsp;全国联保</li>
	</ul>
</div>
<!--口号-end -->
<!--服务-20121025 -->
<div class="service">
		<dl class="s1">
			<dt><i></i>帮助中心</dt>
			<dd>
				<ol>
					<li><a target="_blank" href="#">购物指南</a></li>
					<li><a target="_blank" href="#">配送方式</a></li>
					<li><a target="_blank" href="#">支付方式</a></li>
					<li><a target="_blank" href="#">常见问题</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s2">
			<dt><i></i>售后服务</dt>
			<dd>
				<ol>
					<li><a target="_blank" href="#">保修政策</a></li>
					<li><a target="_blank" href="#">退换货政策</a></li>
					<li><a target="_blank" href="#">退换货流程</a></li>
					<li><a target="_blank" href="#">手机寄修服务</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s3">
			<dt><i></i>技术支持</dt>
			<dd>
				<ol>
					<li><a target="_blank" href="#">售后网点</a></li>
					<li><a target="_blank" href="#">常见问题</a></li>
					<li><a target="_blank" href="#">产品手册</a></li>
					<li><a target="_blank" href="#">软件下载</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s4">
			<dt><i></i>关于商城</dt>
			<dd>
				<ol>
					<li><a target="_blank" href="#">公司介绍</a></li>
					<li><a target="_blank" href="#">华为商城简介</a></li>
					<li><a target="_blank" href="#">联系客服</a></li>
					<li><a target="_blank" href="#">商务合作</a></li>
				</ol>
			</dd>
		</dl>
		<dl class="s5">
			<dt><i></i>关注我们</dt>
			<dd>
				<ol>
					<li><a class="sina" href="#" target="_blank">新浪微博</a></li>
					<li><a class="qq" href="#" target="_blank">腾讯微博</a></li>
					<li><a class="huafen" href="#" target="_blank">花粉社区</a></li>
					<li><a href="#" target="_blank">商城手机版</a></li>
				</ol>
			</dd>
		</dl>
</div>
<!--服务-end -->
<!--在线客服-->
<div class="hungBar" id="tools-nav" style="top: 246.5px; left: 1301px; z-index: 500; position: fixed;">
	<a title="返回顶部" class="hungBar-top" href="#" id="hungBar-top"">返回顶部</a>
	<a id="tools-nav-survery" title="意见反馈" class="hungBar-feedback hide" href="javascript:;" onclick="ec.survery.open();" style="display: block;">意见反馈</a>		
	<!--意见反馈box-->
	<div id="survery-box" class="form-feedback-area hide">
		<div class="h">
			<a class="form-feedback-close" title="关闭" onclick="ec.survery.close();return false;" href="javascript:;"></a>
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
									<td><div class="fl"><input name="code" id="surveryVerify" class="verify vam" maxlength="4" type="text">&nbsp;&nbsp;<img id="surveryVerifyImg" onclick="this.src=this.src+'?'+Math.random()" class="vam" alt="验证码" src="{:U('Advice/verify')}">&nbsp;&nbsp;&nbsp;&nbsp;<span class="vam"><a 
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
		      url:"{:U('Advice/makeCategory')}",
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
			     url:"{:U('Advice/checkVerify')}",
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
							    url:"{:U('Advice/index')}",
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
<div id="globleParameter" class="hide" context="" stylepath="/jiadianshop/Public/Css" scriptpath="/jiadianshop/Public/Js" imagepath="/jiadianshop/Public/Images" mediapath="/jiadianshop/Public/Images/"></div>
<!--底部 -->
<footer class="footer">
    <!-- 20130902-底部-友情链接-start -->
	<div class="footer-otherLink">
		<p style="text-align:left;">
		<span style="line-height:1.5;">
		<span style="font-family:宋体;"> 友情链接：</span></span>
		<span style="line-height:1.5;">
		<span style="font-family:宋体;">
		<a href="#" target="_blank">华为官网</a>
		<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>| <a href="{$vo.link_url}" target="_blank" style="line-height:1.5;font-family:宋体;">{$vo.link_name}</a> <span style="line-height:1.5;font-family:宋体;"><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="{:U('Links/Index')}" target="_blank" style="line-height:1.5;font-family:宋体;">申请友情链接>></a> <span style="line-height:1.5;font-family:宋体;">
		<br></p>
	</div>
	<div class="footer-warrant-area"><p>Copyright © 2011-2013  华为软件技术有限公司  版权所有  保留一切权利  苏B2-20130048号 | 苏ICP备09062682号-9            </p><p><a target="_blank" href="/jiadianshop/Public/Images/wwwz.jpg">网络文化经营许可证苏网文[2012]0401-019号</a></p><p class="footer-warrant-img">   <a href="#" target="_blank"><img title="经营性网站" alt="经营性网站" src="/jiadianshop/Public/Images/certificate_01_112_40.png"></a> <a title="诚信网站" href="#" rel="nofollow" target="_blank"><img alt="诚信网站" src="/jiadianshop/Public/Images/certificate_02_112_40.png"></a> <a title="诚信网站" href="#" rel="nofollow" target="_blank"><img alt="诚信网站" src="/jiadianshop/Public/Images/certificate_03_112_40.png"></a></p></div><!--授权结束 -->
</footer>
<!--Hit 2014-09-02 00:15:31,1-->
<div id="AutocompleteContainter_92ea" style="position: absolute; z-index: 9999; top: 503px; left: 556.5px;">
	<div class="autocomplete-w1">
		<div class="autocomplete" id="Autocomplete_92ea" style="display: none; width: 315px; max-height: 400px;"></div>
	</div>
</div>
</body>
</html>