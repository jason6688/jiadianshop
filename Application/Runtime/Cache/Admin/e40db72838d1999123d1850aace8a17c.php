<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单详情</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<style>.ping {
    width: 100%;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    display: none;
    z-index: 5;}
    .white_content {
    position: absolute;
    top: 110px;
    left: 30%;
    width: 450px;
    height: 480px;
    border: 1px solid orange;
    background-color: white;
    z-index: 1002;
}
</style>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
	<li><a href="#">订单管理</a></li>
    <li><a href="#">订单列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <div class="toolsli">
        <div style='width:500px;float:left;'>
            <ul class="forminfo">
                <li><strong>订单号：</strong><?php echo ($info['order_no']); ?></li>
                <li><strong>支付方式：</strong><?php echo (pay_method($order_payment['order_payment_id'])); ?></li>
                <li><strong>发货时间：</strong><?php if($info['express_time']): echo (date("Y-m-d H:i:s",$info['express_time'])); endif; ?></li>
            </ul>
        </div>
        <div style='width:500px;float:left;'>
            <ul class="forminfo">
                <li><strong>订单状态：</strong>
                <?php echo order_status($info['order_state'])?>
                
                </li>
                <li><strong>下单时间：</strong><?php if($info['order_time']): echo (date("Y-m-d H:i:s",$info['order_time'])); endif; ?></li>
                <li><strong>付款时间：</strong><?php if($info['pay_time']): echo (date("Y-m-d H:i:s",$info['pay_time'])); endif; ?></li>
            </ul>
        </div>
    </div>

    <div class="formtitle"><span>收货人信息</span>
    </div>


    <div class="toolsli">
        <div style='width:500px;float:left;'>
            <ul class="forminfo">
                <li><strong>收货人：</strong><?php echo ($info['address_name']); ?></li>
                <li><strong>地址：</strong><?php echo ($info['address_content']); ?></li>
                <!--<li><strong>电话：</strong><?php echo ($info['address_phone']); ?></li>-->
            </ul>
        </div>
        <div style='width:500px;float:left;'>
            <ul class="forminfo">
                <li><strong>邮编：</strong><?php echo ($info['address_post']); ?></li>
                <li><strong>手机：</strong><?php echo ($info['address_phone']); ?></li>
            </ul>
        </div>
    </div>
    
    <div class="formtitle"><span>商品信息</span></div>
    
    
    <div class="toolsli">
            <table class="listtable">
                <tr>
                    <th>图片</th>
                    <th>商品名称</th>
					<th>货号</th>
                    <th>价格</th>
                    <th>数量</th>
                    <th>属性</th>
                    <th>小计</th>
                </tr>
				<?php if(is_array($order_goods_info)): $i = 0; $__LIST__ = $order_goods_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><img style='width: 54px;height: 54px;'src="<?php echo ($vo['goods_thumb_img']); ?>"/></td>
                    <td><?php echo (msubstr($vo["goods_name"],0,30,'utf-8',true)); ?></td>
					<td><?php echo ($vo['goods_sn']); ?></td>
                    <td><?php echo ($vo['shop_price']); ?></td>
                    <td><?php echo ($vo['order_desc_num']); ?></td>
                    <td align="center"><?php echo ($vo['order_attr']); ?></td>
                    <td><?php echo ($vo['shop_price']*$vo['order_desc_num']); ?>元</td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
    </div>
    
    <div class="formtitle"><span>操作信息</span></div>
    
    
    
	<!--订单打印-->
	<style type="text/css">
	.print_order{
		width:100px;
		height:50px;
		cursor:pointer;
		float:right;
		margin-left:5px;
		color:#ca141c;
		font-size:16px;
		background-color:#ececec;
		border:1px solid red;
	}

	
	</style>
	<input id="btnPrint" class="print_order" type="<?php if($info['order_state']==1){echo 'button';}else{echo 'hidden';}?>" value="发货" onclick="showPopup(400,250)" />&nbsp;&nbsp;
	<input id="btnPrint" class="print_order" type="<?php if($info['order_state']==0){echo 'hidden';}else if($info['order_state']==1){echo 'hidden';}else{echo 'button';}?>" value="修改物流" onclick="showPopup(400,250)" />&nbsp;&nbsp;
	<input id="btnPrint" class="print_order" type="button" value="打印订单" onclick="javascript:window.print();" />&nbsp;&nbsp;
	<input id="btnPrint" class="print_order" type="button" value="打印预览" onclick=preview(1) />



    </div>
	<!--发货弹框内容-->

	<style type="text/css">
		#delivercontent{ 
		position: absolute; 
		visibility: hidden; 
		overflow: hidden; 
		border:1px solid #CCC; 
		background-color:#F9F9F9; 
		border:1px solid #333; 
		padding:5px; 
		}
		#delivercontent .top{
		font-size:16p;
		width:250px;
		height:150px;
		margin:10px auto;
		
		}

		.button-style{
		width:100px;
		height:50px;
		cursor:pointer;
		margin-left:5px;
		color:#050505;
		font-size:16px;
		background-color:#ececec;
		
		}
	
	</style>

	<div id="delivercontent">
	<form action="<?php echo U('deliverAct');?>" method="post">
		<input type="hidden" name="order_id" value="<?php echo ($info['order_id']); ?>"/>
		<div class="top">
		<center><p style="font-size:24px;">发&nbsp;货</p></center><br/><br/>
		<label style="color:red;font-size:16px;">请选择快递：</label>
		<select name="express_id" style="width:150px;height:35px;font-size:16px;">
			<option value="1">顺丰速递</option>
			<option value="2">圆通快递</option>
			<option value="3">中通快递</option>
			<option value="4">韵达快递</option>
			<option value="5">EMS</option>
		</select></br></br>
		<lable style="color:red;font-size:16px;">运&nbsp;&nbsp;&nbsp;单&nbsp;&nbsp;&nbsp;号：</lable><input type="text" name="express_sn" style="width:150px;height:35px;font-size:16px;">
		</div>
		<div class="buttom" style="clear:both;margin:10px auto;width:220px;height:50px;">
		<input type="submit" class="button-style" value="确定" style="background-color:#ca141c;color:#fff;"/><input type="button" class="button-style" value="取消" onclick="hidePopup()"/>
		</div>
	</form>
	</div>
	<!--发货弹框内容结束-->
</body>
	<script>
		function preview(oper)
		{
		if (oper < 10)
		{
		bdhtml=window.document.body.innerHTML;//获取当前页的html代码
		sprnstr="<!–startprint"+oper+"–>";//设置打印开始区域
		eprnstr="<!–endprint"+oper+"–>";//设置打印结束区域
		prnhtml=bdhtml.substring(bdhtml.indexOf(sprnstr)+18); //从开始代码向后取html
		prnhtmlprnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));//从结束代码向前取html
		window.document.body.innerHTML=prnhtml;
		window.print();
		window.document.body.innerHTML=bdhtml;
		} else {
		window.print();
		}
		}
	</script>
	<!--js实现DIV弹框功能-->
	<script type="text/javascript">
		 var baseText = null;
		function showPopup(w,h){ 
			var popUp = document.getElementById("delivercontent"); 
			popUp.style.top = "200px"; 
			popUp.style.left = "500px"; 
			popUp.style.width = w + "px"; 
			popUp.style.height = h + "px"; 
			
			popUp.style.visibility = "visible"; 
		} 
		function hidePopup(){ 
			var popUp = document.getElementById("delivercontent"); 
			popUp.style.visibility = "hidden"; 
		} 
		
	</script>

</html>