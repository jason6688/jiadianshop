<?php
return array(
	//'配置项'=>'配置值'
	'SESSION_OPTIONS' => array('use_trans_sid'=>1,'use_only_cookies'=>0),
	//用户登录后需要保存的信息的变量
	"USER_ID"=>'user_id', //保存用户id
	"USER_INFO"=>'user_info',//保存用户信息
	
	// 保存用户的浏览过商品的常量
	"USER_SCAN_GOODS"=>'user_scan_goods',
	
	
	//保存购物车信息
	
	"USER_CAT_INFO"=>'user_cat_info',
	
	//保存立即购买信息
	"USER_BUY_NOW_INFO"=>'user_buy_now_info',
	
	//保存订单信息
	"USER_ORDER_ID"=>'order_id',
	
);