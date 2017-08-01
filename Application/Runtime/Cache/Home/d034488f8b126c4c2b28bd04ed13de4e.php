<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-cn">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>购物车_家电商城</title>
<link rel="shortcut icon" href="/jiadianshop/Public/Ico/favicon.ico">
<link href="/jiadianshop/Public/Css/cart.ec.core.css" rel="stylesheet" type="text/css">
<link href="/jiadianshop/Public/Css/cart.main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/jiadianshop/Public/Jquery/jquery-1.7.2.js"></script>
</head>
<body class="sc">
<!-- 20160520--start -->
<div class="qq-caibei-bar hide" id="caibeiMsg">
	<div class="layout">
		<div class="qq-caibei-bar-tips" id="HeadShow"></div>
		<div class="qq-caibei-bar-userInfo" id="ShowMsg"></div>
	</div>
</div>
<!-- 20160523--end -->
<!-- 捷径栏 -->

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

<!--头部 -->
<div class="order-header">
	<div class="g">
    	<div class="fl">
            <div class="logo"><a href="<?php echo U('Index/index');?>" title="家电商城"><img src="/jiadianshop/Public/images/new_logo.png" alt="家电商城"></a></div>
        </div>
        <div class="fr">
            <!--步骤条-三步骤 -->
            <div class="progress-area progress-area-3">
                <!--我的购物车 -->
                <div style="display: block;" id="progress-cart" class="progress-sc-area hide">我的购物车</div>
                <!--核对订单 -->
                <div id="progress-confirm" class="progress-co-area hide">填写核对订单信息</div>
                <!--成功提交订单 -->
                <div id="progress-submit" class="progress-sso-area hide">成功提交订单</div>
            </div>
        </div>
    </div>
</div>
<div class="layout">
    <!-- 20160523-购物车-start -->
    <div class="sc-list">
    	<!-- 20160523-购物车-商品列表-start -->
    	<div class="sc-pro-list">

            <!-- 20160523-订单-商品-标题-start -->
            <div class="sc-pro-title-area">
                <div class="h">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="tr-check">
                                	<input id="checkAll-top" class="vam" autocomplete="off" type="checkbox">
                                </th>
                                <th class="tr-pro">商品</th>
                                <th class="tr-price">单价<em>（元）</em></th>
                                <th class="tr-quantity">数量</th>
                                <th class="tr-subtotal">小计<em>（元）</em></th>
                                <th class="tr-operate">操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- 20160523-订单-商品-标题-end -->
		</div>
		<!--购物车-商品列表 end -->

        <!--购物车-空数据 --> 
        <div id="cart-empty-msg" class="sc-empty-area">
            亲，您购物车里还没有物品哦，<a href="<?php echo U('Index/index');?>">快去逛逛吧！</a>&nbsp;&nbsp;<span style="color:red"></span>秒后跳转..
        </div>
        <!-- 购物车列表 End-->
    </div>
<script type="text/javascript">
    $(function(){
	
	
	
	   var url="<?php echo U('Index/index');?>";
	   var timer=3;//页面跳转等待时间
	   setInterval(function(){
	       timer--;
		   if(timer<=0){
		      window.location.href=url;
		   }
	      $("#cart-empty-msg").find('span').html(timer);
	   },1000);
	   
	
	
	
	
	
	});
</script>
    <div class="hr-35"></div>
<!--商品删除记录-20160520 -->
    <div style="display: none;" id="pro-recover-area" class="pro-delete-area hide">
    	<div class="h clearfix">
        	<h3>已删除商品</h3>
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<th class="tr-pro">商品</th>
						<th class="tr-quantity">数量</th>
						<th class="tr-subtotal">小计<em>（元）</em></th>
						<th class="tr-operate">操作</th>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="b">
          <div class="pro-delete-item">
        	<table border="0" cellpadding="0" cellspacing="0">
            	<tbody id="pro-recover-tb"></tbody>
            </table>
          </div>
        </div>
        
        
        <div id="pro-delete-shop-start" class="f button-pro-delete-expand hide"><a href="javascript:;">更多已删除商品<i></i><s></s><b></b></a></div>
        <div id="pro-delete-shop-end" class="f button-pro-delete-shrink hide"><a href="javascript:;">收起已删除商品<i></i><s></s><b></b></a></div>
    </div>
<!--删除记录结束 -->
<div class="hr-25"></div>
<!--热门推荐-20160523 -->
    <div id="pro-recommend-area" class="pro-scroller-area hide">
	   	<div class="h">
        	<h3>您可能感兴趣的商品</h3>
        </div>
        <div class="b">
        	<!--左边滚动按钮className：pro-scroller-back 不可点击className：pro-scroller-back-disabled ；右边滚动按钮className：pro-scroller-forward 不可点击className：pro-scroller-forward-disabled --> 
             <a id="cart-img-prev" class="pro-scroller-back-disabled" href="javascript:;" onclick="ec.cart.slider.prev(this)"></a>
            <div class="pro-list">
            	<!--ul的宽度等于li宽度*N -->
                <ul style="width:1158px;" id="pro-recommend-list"></ul>
            </div>
            <a id="cart-img-next" class="pro-scroller-forward" href="javascript:;" onclick="ec.cart.slider.next(this)"></a>
        </div>
    </div>
<!--热门推荐结束 -->

    <!-- 购物车主体 End　-->
</div>
<div class="hr-75"></div>

<textarea id="product-list-html" class="hide">&lt;!--#macro product-list
 data--&gt;
&lt;!--#var context=data.context--&gt;
&lt;!--#var mediaPath=data.mediaPath--&gt;
&lt;!--#list data.bundlerList as b--&gt;
&lt;div class="sc-pro-area selected" id="order-pro-{#b.bundleId}"&gt;
	&lt;table border="0" cellpadding="0" cellspacing="0"&gt;
		&lt;tbody&gt;
			&lt;!--#var rows=b.skuList.length--&gt;
			&lt;!--#var giftLen=0--&gt;
			&lt;!--#var lst_i=1--&gt;
			&lt;!--#list b.skuList as lst--&gt;
				&lt;!--#if (lst.giftList)--&gt;
					&lt;!--#var giftLen=giftLen+lst.giftList.length--&gt;
				&lt;!--/#if--&gt;
			&lt;!--/#list--&gt;

			&lt;!--#list b.skuList as lst--&gt;			
			&lt;tr class="sc-pro-item"&gt;
				&lt;!--#if (lst_i==1)--&gt;
				&lt;td rowspan="{#rows+giftLen}" class="tr-check"&gt;
					&lt;input id="box-{#b.bundleId}" class="checkbox" type="checkbox" 
name="bundleIds" onclick="ec.shoppingCart.check(this);" 
value="{#b.bundleId}" checked /&gt;
				&lt;/td&gt;
				&lt;!--/#if--&gt;
				
				&lt;td class="tr-pro"&gt;
				&lt;div class="pro-area clearfix" id="skuId-{#lst.skuId}"&gt;
					&lt;p class="p-img"&gt;
					&lt;!--#var skuId='#'+lst.skuId;--&gt;
					&lt;a title="{#lst.prdSkuName?html}" target="_blank" 
href="{#context}/product/{#lst.id}.html{#skuId}" 
seed="cart-item-name"&gt;
						&lt;img alt="{#lst.prdSkuName?html}" 
src="{#mediaPath}{#lst.photoPath}78_78_{#lst.photoName}" /&gt;
					&lt;/a&gt;
					&lt;/p&gt;
					&lt;p class="p-name"&gt;
						&lt;b&gt;[套餐]&lt;/b&gt;
						&lt;a title="{#lst.prdSkuName?html}" target="_blank" 
href="{#context}/product/{#lst.id}.html{#skuId}" 
seed="cart-item-name"&gt;{#lst.prdSkuName?html}&lt;/a&gt;
					&lt;/p&gt;
					&lt;p class="p-sku"&gt;
						&lt;em class="p-spite-sku"&gt;{#lst.skuAttrValues?html}&lt;/em&gt;
					&lt;/p&gt;
					&lt;!--#if (lst.shopName &amp;&amp; lst.shopId != 1)--&gt;
					&lt;p class="p-explain"&gt;此商品由{#lst.shopName?html}发货&lt;/p&gt;
					&lt;!--/#if--&gt;
					&lt;p class="limitstock-{#lst.skuId} hide"&gt;&lt;/p&gt;
					&lt;p class="understock-{#lst.skuId} hide"&gt;&lt;/p&gt;
					&lt;input type="checkbox" name="skuIds" class="hide" 
value="{#lst.skuId}"&gt;
				&lt;/div&gt;
				&lt;/td&gt;

				&lt;td class="tr-price"&gt;
					&lt;s&gt;原价:¥{#lst.skuPrice.toFixed(2)}&lt;/s&gt;
					&lt;span&gt;现价:¥{#lst.preferentialPrice.toFixed(2)}&lt;/span&gt;
				&lt;/td&gt;

				&lt;!--#if (lst_i==1)--&gt;
				&lt;td class="tr-quantity" rowspan="{#rows+giftLen}"&gt;
				&lt;div class="sc-stock-area"&gt;
					&lt;div class="stock-area"&gt;
						&lt;input id="quantity-{#b.bundleId}" type="text" 
class="shop-quantity textbox vam" value="{#b.quantity}" 
data-skuId="{#b.bundleId}" data-type="2" seed="cart-item-num" /&gt;
					&lt;/div&gt;
				&lt;/div&gt;
				&lt;/td&gt;
				
				&lt;td rowspan="{#rows+giftLen}" class="tr-subtotal"&gt;
				    &lt;b&gt;¥{#b.totalBundlePrice.toFixed(2)}&lt;/b&gt;
				  	
&lt;span&gt;&lt;i&gt;省&lt;/i&gt;&lt;em&gt;
¥{#b.preferentialPrice.toFixed(2)}&lt;/em&gt;&lt;/span&gt;
				&lt;/td&gt;
				
				&lt;td rowspan="{#rows+giftLen}" class="tr-operate"&gt;
					&lt;a href="javascript:;" class="icon-sc-del" title="删除" 
onclick="ec.shoppingCart.del(this , {#b.bundleId}, 2)" 
seed="cart-item-del"&gt;删除&lt;/a&gt;
				&lt;/td&gt;
				&lt;!--/#if--&gt;
			&lt;/tr&gt;
			&lt;!--#var lst_i=lst_i+1--&gt;
			&lt;!--/#list--&gt;

			&lt;!--#list b.skuList as lst--&gt;
			&lt;!--#if (giftLen &gt; 0)--&gt; 
			&lt;!--#list lst.giftList as gif--&gt;
				&lt;!--#var skuId='#'+gif.skuId;--&gt;
				&lt;tr class="sc-pro-gift-item"&gt;
				  &lt;td class="tr-pro"&gt;
					&lt;div class="pro-area clearfix"&gt;
						&lt;p class="p-img"&gt;
							&lt;a title="{#gif.prdSkuName}" 
href="{#context}/product/{#gif.id}.html{#skuId}"&gt;
								&lt;img alt="{#gif.prdSkuName}" 
src="{#mediaPath}{#gif.photoPath}78_78_{#gif.photoName}" /&gt;
							&lt;/a&gt;
							&lt;input type="checkbox" name="skuIds" class="hide" 
value="{#gif.skuId}"&gt;
						&lt;/p&gt;
						&lt;p class="p-name"&gt;
							&lt;b&gt;[赠品]&lt;/b&gt;
							&lt;a title="{#gif.prdSkuName}" 
href="{#context}/product/{#gif.id}.html{#skuId}"&gt;{#gif.prdSkuName}&lt;/a&gt;

						&lt;/p&gt;
						&lt;p class="understock-{#gif.skuId} hide"&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/td&gt;
				&lt;td class="tr-price"&gt;
					&lt;s&gt;原价:{#gif.skuPrice.toFixed(2)}&lt;/s&gt;
					&lt;span&gt;现价:¥0.00&lt;/span&gt;
				&lt;/td&gt;
				&lt;/tr&gt;
			&lt;!--/#list--&gt;
			&lt;!--/#if--&gt;
			&lt;!--/#list--&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
&lt;!--/#list--&gt;

&lt;!--#list data.productList as lst--&gt;
&lt;!--#var skuId = "#" + lst.skuId; --&gt;
&lt;div class="sc-pro-area selected" id="order-pro-{#lst.skuId}"&gt;
	&lt;table border="0" cellpadding="0" cellspacing="0"&gt;
		&lt;tbody&gt;
			&lt;tr class="sc-pro-item"&gt;
				&lt;td rowspan="{#lst.giftList.length+lst.extendList.length + 
lst.accidentList.length + 1}" class="tr-check"&gt;
					&lt;input id="box-{#lst.skuId}" class="checkbox" type="checkbox" 
name="skuIds" onclick="ec.shoppingCart.check(this);" 
value="{#lst.skuId}" checked /&gt;
				&lt;/td&gt;
				&lt;td class="tr-pro"&gt;
				&lt;div class="pro-area clearfix"&gt;
					&lt;p class="p-img"&gt;
						&lt;a title="{#lst.prdSkuName?html}" target="_blank" 
href="{#context}/product/{#lst.id}.html{#skuId}" 
seed="cart-item-name"&gt;
							&lt;img alt="{#lst.prdSkuName?html}" 
src="{#mediaPath}{#lst.photoPath}78_78_{#lst.photoName}" /&gt;
						&lt;/a&gt;
					&lt;/p&gt;
					&lt;p class="p-name"&gt;
						&lt;a title="{#lst.prdSkuName?html}" target="_blank" 
href="{#context}/product/{#lst.id}.html{#skuId}" 
seed="cart-item-name"&gt;{#lst.prdSkuName?html}&lt;/a&gt;
					&lt;/p&gt;
					&lt;p class="p-sku"&gt;
						&lt;em class="p-spite-sku"&gt;{#lst.skuAttrValues?html}&lt;/em&gt;
					&lt;/p&gt;
					&lt;!--#if (lst.shopName &amp;&amp; lst.shopId != 1)--&gt;
					&lt;p class="p-explain"&gt;此商品由{#lst.shopName?html}发货&lt;/p&gt;
					&lt;!--/#if--&gt;
					&lt;p class="understock-{#lst.skuId} hide"&gt;&lt;/p&gt;
				&lt;/div&gt;
				&lt;/td&gt;
				&lt;td class="tr-price"&gt;
					&lt;!--#if (lst.skuPrice != lst.preferentialPrice)--&gt;
						&lt;s&gt;原价:¥{#lst.skuPrice.toFixed(2)}&lt;/s&gt;
						&lt;span&gt;现价:¥{#lst.preferentialPrice.toFixed(2)}&lt;/span&gt;
					&lt;!--#else--&gt;
						&lt;span&gt;¥{#lst.skuPrice.toFixed(2)}&lt;/span&gt;
					&lt;!--/#if--&gt;
				&lt;/td&gt;
				&lt;td class="tr-quantity" 
rowspan="{#lst.giftList.length+lst.extendList.length + 
lst.accidentList.length + 1}"&gt;
                	&lt;div class="sc-stock-area"&gt;
						&lt;div class="stock-area"&gt;
							&lt;input id="quantity-{#lst.skuId}" type="text" 
class="shop-quantity textbox vam" value="{#lst.quantity}" 
data-skuId="{#lst.skuId}" data-type="{#lst.productType}" 
seed="cart-item-num" /&gt;
						&lt;/div&gt;
						&lt;p class="normalLimitstock-{#lst.skuId} hide"&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/td&gt;
				
				&lt;td rowspan="{#lst.giftList.length + 1}" class="tr-subtotal"&gt;
					&lt;b&gt;¥{#(lst.preferentialPrice * 
lst.quantity).toFixed(2)}&lt;/b&gt;
					&lt;!--#if (lst.skuPrice != lst.preferentialPrice)--&gt;
						&lt;span&gt;&lt;i&gt;省&lt;/i&gt;&lt;em&gt;¥ {#((lst.skuPrice - 
lst.preferentialPrice) * 
lst.quantity).toFixed(2)}&lt;/em&gt;&lt;/span&gt;
					&lt;!--/#if--&gt;		
				&lt;/td&gt;
				&lt;td rowspan="{#lst.giftList.length + 1}" class="tr-operate"&gt;
					&lt;a href="javascript:;" class="icon-sc-del" title="删除" 
onclick="ec.shoppingCart.del(this , {#lst.skuId})" 
seed="cart-item-del"&gt;删除&lt;/a&gt;
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;!--#list lst.giftList as gif--&gt;
			&lt;!--#var skuId='#'+gif.skuId;--&gt;
			&lt;tr class="sc-pro-gift-item"&gt;
				&lt;td class="tr-pro"&gt;
					&lt;div class="pro-area clearfix"&gt;
						&lt;p class="p-img"&gt;
							&lt;a title="{#gif.prdSkuName}" 
href="{#context}/product/{#gif.id}.html{#skuId}"&gt;
								&lt;img alt="{#gif.prdSkuName}" 
src="{#mediaPath}{#gif.photoPath}78_78_{#gif.photoName}" /&gt;
							&lt;/a&gt;
							&lt;input type="checkbox" name="skuIds" class="hide" 
value="{#gif.skuId}"&gt;
						&lt;/p&gt;
						&lt;p class="p-name"&gt;
							&lt;b&gt;[赠品]&lt;/b&gt;
							&lt;a title="{#gif.prdSkuName}" 
href="{#context}/product/{#gif.id}.html{#skuId}"&gt;{#gif.prdSkuName}&lt;/a&gt;

						&lt;/p&gt;
						&lt;p class="understock-{#gif.skuId} hide"&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/td&gt;
				&lt;!--td class="tr-span-3"&gt;{#lst.quantity * gif.quantity}&lt;p 
class="limitstock-{#gif.skuId} hide"&gt;&lt;/p&gt;&lt;/td--&gt;
				&lt;td class="tr-price"&gt;
					&lt;s&gt;原价:¥{#gif.skuPrice.toFixed(2)}&lt;/s&gt;
					&lt;span&gt;现价:¥0.00&lt;/span&gt;
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;!--/#list--&gt;
			&lt;!--#if (lst.extendList)--&gt;
			&lt;!--#list lst.extendList as yb--&gt;
			&lt;!--#var ybSkuId='#'+yb.skuId;--&gt;
			&lt;tr class="sc-pro-gift-item"&gt;
				&lt;td class="tr-pro"&gt;
					&lt;div class="pro-area clearfix"&gt;
						&lt;p class="p-img"&gt;
							&lt;a title="{#yb.prdSkuName}" target="_blank" 
href="{#context}/product/{#yb.id}.html{#ybSkuId}"&gt;
								&lt;img alt="{#yb.prdSkuName}" 
src="{#mediaPath}{#yb.photoPath}78_78_{#yb.photoName}" /&gt;
							&lt;/a&gt;
						&lt;/p&gt;
						&lt;p class="p-name"&gt;
							&lt;b&gt;[延保]&lt;/b&gt;
							&lt;a title="{#yb.prdSkuName}" target="_blank" 
href="{#context}/product/{#yb.id}.html{#ybSkuId}"&gt;{#yb.prdSkuName}&lt;/a&gt;

						&lt;/p&gt;
						&lt;p class="p-sku"&gt;&lt;em&gt;&lt;/em&gt;&lt;/p&gt;
						&lt;input type="checkbox" name="extendIds" class="hide" 
value="{#yb.skuId}"&gt;
					&lt;/div&gt;
				&lt;/td&gt;
				&lt;!--td class="tr-span-3"&gt;{#yb.quantity}&lt;/td--&gt;
				&lt;td class="tr-price"&gt;
					&lt;s&gt;原价:¥{#yb.skuPrice.toFixed(2)}&lt;/s&gt;
					&lt;span&gt;现价:¥{#yb.skuPrice.toFixed(2)}&lt;/span&gt;
				&lt;/td&gt;
				&lt;td class="tr-subtotal"&gt;&lt;b&gt;¥{#(yb.skuPrice * 
lst.quantity).toFixed(2)}&lt;/b&gt;&lt;/td&gt;
				&lt;td class="tr-operate"&gt;
					&lt;a href="javascript:;" class="icon-sc-del" title="删除" 
onclick="ec.shoppingCart.del(this, {#yb.skuId}, 6, {#yb.mainSkuId})" 
seed="cart-item-del"&gt;删除&lt;/a&gt;
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;!--/#list--&gt;
			&lt;!--/#if--&gt;
			&lt;!--#if (lst.accidentList)--&gt;
			&lt;!--#list lst.accidentList as ya--&gt;
			&lt;!--#var yaSkuId='#'+ya.skuId;--&gt;
			&lt;tr class="sc-pro-gift-item"&gt;
				&lt;td class="tr-pro"&gt;
					&lt;div class="pro-area clearfix"&gt;
						&lt;p class="p-img"&gt;
							&lt;a title="{#ya.prdSkuName}" target="_blank" 
href="{#context}/product/{#ya.id}.html{#yaSkuId}"&gt;
								&lt;img alt="{#ya.prdSkuName}" 
src="{#mediaPath}{#ya.photoPath}78_78_{#ya.photoName}" /&gt;
							&lt;/a&gt;
						&lt;/p&gt;
						&lt;p class="p-name"&gt;
							&lt;b&gt;[意外保]&lt;/b&gt;
							&lt;a title="{#ya.prdSkuName}" target="_blank" 
href="{#context}/product/{#ya.id}.html{#yaSkuId}"&gt;{#ya.prdSkuName}&lt;/a&gt;

						&lt;/p&gt;
						&lt;p class="p-sku"&gt;&lt;em&gt;&lt;/em&gt;&lt;/p&gt;
						&lt;input type="checkbox" name="accidentIds" class="hide" 
value="{#ya.skuId}"&gt;
					&lt;/div&gt;
				&lt;/td&gt;
				&lt;!--td class="tr-span-3"&gt;{#ya.quantity}&lt;/td--&gt;
				&lt;td class="tr-price"&gt;
					&lt;s&gt;原价:¥{#ya.skuPrice.toFixed(2)}&lt;/s&gt;
					&lt;span&gt;现价:¥{#ya.skuPrice.toFixed(2)}&lt;/span&gt;
				&lt;/td&gt;
				&lt;td class="tr-subtotal"&gt;&lt;b&gt;¥{#(ya.skuPrice * 
lst.quantity).toFixed(2)}&lt;/b&gt;&lt;/td&gt;
				&lt;td class="tr-operate"&gt;
					&lt;a href="javascript:;" class="icon-sc-del" title="删除" 
onclick="ec.shoppingCart.del(this, {#ya.skuId}, 7, {#ya.mainSkuId})" 
seed="cart-item-del"&gt;删除&lt;/a&gt;
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;!--/#list--&gt;
			&lt;!--/#if--&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
&lt;!--/#list--&gt;
&lt;!--/#macro--&gt;
</textarea>



<!--20160523 -->

<div class="slogan">
	<ul>
		<li class="s1"><i></i>500强企业&nbsp;品质保证</li>
		<li class="s2"><i></i>7天退货&nbsp;15天换货</li>
		<li class="s3"><i></i>200元起免运费</li>
		<li class="s4"><i></i>888家维修网点&nbsp;全国联保</li>
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



<div id="AutocompleteContainter_d3d73" style="position: absolute; z-index: 9999; top: 93px; left: 556.5px;"><div class="autocomplete-w1"><div class="autocomplete" id="Autocomplete_d3d73" style="display: none; width: 315px; max-height: 400px;"></div></div></div></body></html>