<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script language="JavaScript" src="/jiadianshop/Public/Common/js/jquery.cookie.min.js"></script>

<script type="text/javascript">
$(function(){
    //导航切换
    $(".menuson .header").click(function(){
        var $parent = $(this).parent();
        $(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();

        $parent.addClass("active");
        if(!!$(this).next('.sub-menus').size()){
            if($parent.hasClass("open")){
                $parent.removeClass("open").find('.sub-menus').hide();
            }else{
                $parent.addClass("open").find('.sub-menus').show();
            }
        }
    });

    // 三级菜单点击
    $('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
        $(this).addClass("active");
    });

    $('.title').click(function(){
        var title = trim($(this).text());
        if(title == '欧洲团代购'){
            $.cookie('class_id',1,{ expires: 7, path: '/'});
        }else if(title == '欧洲母婴'){
            $.cookie('class_id',2,{ expires: 7, path: '/'});
        }

        var $ul = $(this).next('ul');
        $('dd').find('.menuson').slideUp();
        if($ul.is(':visible')){
            $(this).next('.menuson').slideUp();
        }else{
            $(this).next('.menuson').slideDown();
        }
    });

    function trim( text )
    {
      if (typeof(text) == "string")
      {
        return text.replace(/^\s*|\s*$/g, "");
      }
      else
      {
        return text;
      }
    }
})
</script>
</head>
<body style="background:#fff3e1;">
	<div class="lefttop"><span></span>管理菜单</div>

    <dl class="leftmenu">
		<!-- 商品管理 -->
        <?php if (in_array(1,$permission)||$admin_id==1):?>
		<dd>
	        <div class="title">
	        <span><img src="/jiadianshop/Public/Admin/images/leftico01.png" /></span>商品管理
	        </div>
	    	<ul class="menuson" >
	    		<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/index');?>" target="rightFrame">商品列表</a><i></i></div></li>
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/addGoods');?>" target="rightFrame">添加新商品</a><i></i></div></li>
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/cateList');?>" target="rightFrame">商品分类</a><i></i></div></li>
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Comment/index');?>" target="rightFrame">用户评论</a><i></i></div></li>
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/brandList');?>" target="rightFrame">商品品牌</a><i></i></div></li>
				<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/typeList');?>" target="rightFrame">商品类型</a><i></i></div></li>
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/showRecyle');?>" target="rightFrame">商品回收站</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/warn');?>" target="rightFrame">库存预警</a><i></i></div></li>
	        	<!--<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Goods/showRecyle');?>" target="rightFrame">商品批量上下架</a><i></i></div></li>-->
                
	    		
	        </ul>
	    </dd>
        <?php endif ?>
		<!-- 订单管理 -->
        <?php if (in_array(2,$permission)||$admin_id==1):?>
	    <dd>
	        <div class="title">
	        <span><img src="/jiadianshop/Public/Admin/images/leftico01.png" /></span>订单管理
	        </div>
	    	<ul class="menuson" >
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Order/index');?>" target="rightFrame">订单列表</a><i></i></div></li>
				<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Order/search');?>" target="rightFrame">订单查询</a><i></i></div></li>
				
				<!--<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Order/order_print');?>" target="rightFrame">缺货登记</a><i></i></div></li>-->
	        	<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Order/deliver_list');?>" target="rightFrame">发货单列表</a><i></i></div></li>
                <!--<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Order/exchange_goods');?>" target="rightFrame">换货单列表</a><i></i></div></li>-->
	        	<!--<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Order/sales_return');?>" target="rightFrame">退货单列表</a><i></i></div></li>-->
	        </ul>
	    </dd>
        <?php endif ?>

       
        <!-- 广告管理 -->
        <?php if (in_array(3,$permission)||$admin_id==1):?>
        <dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>广告管理
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Advertise/index');?>" target="rightFrame">广告列表</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/AdvertisePosition/index');?>" target="rightFrame">广告位置</a><i></i></div></li>
            </ul>
        </dd>
        <?php endif ?>
        
        <!-- 文章管理 -->
        <?php if (in_array(4,$permission)||$admin_id==1):?>
        <dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>文章管理
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Article/catList');?>" target="rightFrame">文章分类</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Article/index');?>" target="rightFrame">文章列表</a><i></i></div></li>
            </ul>
        </dd>
        <?php endif ?>
        
		<!-- 会员管理 -->
        <?php if (in_array(5,$permission)||$admin_id==1):?>
        <dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>会员管理
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/User/index');?>" target="rightFrame">会员列表</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/User/add');?>" target="rightFrame">添加会员</a><i></i></div></li>
            </ul>
        </dd>
        <?php endif ?>


        <!-- 权限管理 -->
        <?php if (in_array(6,$permission)||$admin_id==1):?>
        <dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>权限管理
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Manager/index');?>" target="rightFrame">管理员列表</a><i></i></div></li>
				<!--<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Manager/index');?>" target="rightFrame">角色管理</a><i></i></div></li>-->
            </ul>
        </dd>
        <?php endif ?>
        
        <!-- 问题管理 -->
        <?php if (in_array(7,$permission)||$admin_id==1):?>
        <dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>问题管理
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Problem/index',array('id'=>1));?>" target="rightFrame">售前问题</a><i></i></div></li>
				<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Problem/index',array('id'=>2));?>" target="rightFrame">售后问题</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Problem/index',array('id'=>3));?>" target="rightFrame">物流问题</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Problem/index',array('id'=>4));?>" target="rightFrame">其他问题</a><i></i></div></li>
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Problem/index',array('id'=>5));?>" target="rightFrame">意见建议</a><i></i></div></li>
            </ul>
        </dd>
        <?php endif ?>
        
        <!-- 系统设置 -->
        <?php if (in_array(8,$permission)||$admin_id==1):?>
        <!--<dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>系统设置
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/Index/Integral/index');?>" target="rightFrame">支付方式</a><i></i></div></li>
				<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Index/Integral/index');?>" target="rightFrame">配送方式</a><i></i></div></li>
				<li><div class="header"><cite></cite><a href="<?php echo U('Admin/Index/Integral/index');?>" target="rightFrame">友情链接</a><i></i></div></li>
            </ul>
        </dd>-->
        <?php endif ?>

        
		<?php if (in_array(7, $pri_list) || $id==1): ?>
        <!-- 用户管理 -->
        <dd>
            <div class="title">
            <span><img src="/jiadianshop/Public/Admin/images/leftico02.png" /></span>用户管理
            </div>
            <ul class="menuson">
                <li><div class="header"><cite></cite><a href="<?php echo U('Admin/User/User/index');?>" target="rightFrame">用户管理</a><i></i></div></li>
            </ul>
        </dd>
        <?php endif ?>
    </dl>

</body>
</html>