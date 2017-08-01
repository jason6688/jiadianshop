<?php
/*
	后台公共函数库存
*/
/*
	订单状态
*/
function order_status($status){
	switch ($status) {
		case 0:
			return '等待付款';
			break;
		case 1:
			return '等待发货';
			break;
		case 2:
			return '已发货';
			break;
		case 3:
			return '已收货';
			break;
		case 4:
			return '已评论';
			break;
		case 5:
			return '换货';
			break;
		case 6:
			return '退货';
			break;
	}
}

/*
	发货状态
*/
function post_status($status){
	switch ($status) {
		case 0:
			return '未发货';
			break;
		
		case 1:
			return '已发货';
			break;
		case 3:
			return '已确认收货';
			break;
	}
}
/*
	退货状态
*/
function return_status($status){
	switch ($status) {
		case 0:
			return '未申请';
			break;
		
		case 1:
			return '已申请退货';
			break;
		case 2:
			return '管理员已同意';
			break;
		case 3:
			return '管理员不同意';
			break;
		case 4:
			return '用户退货';
			break;
		case 5:
			return '退货已完成';
			break;
	}
}


function pay_method($state){
	switch ($state) {
		case 1:
			return '余额支付';
			break;
		case 2:
			return '支付宝';
			break;
		case 3:
			return '网银';
			break;
		case 4:
			return '微信';
			break;
		case 5:
			return '银联';
			break;
		case 6:
			return '钱包';
			break;
	}
}

/**
 * 截取中文字符串
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=false){
 if(function_exists("mb_substr")){
  if($suffix)
   return mb_substr($str, $start, $length, $charset)."...";
  else
   return mb_substr($str, $start, $length, $charset);
 }elseif(function_exists('iconv_substr')) {
  if($suffix)
   return iconv_substr($str,$start,$length,$charset)."...";
  else
   return iconv_substr($str,$start,$length,$charset);
 }
 $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
 $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
 $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
 $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
 preg_match_all($re[$charset], $str, $match);
 $slice = join("",array_slice($match[0], $start, $length));
 if($suffix) return $slice."…";
 return $slice;
}
