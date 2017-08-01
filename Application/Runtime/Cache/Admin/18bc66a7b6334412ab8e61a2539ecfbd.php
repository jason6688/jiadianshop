<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单-列表</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/jiadianshop/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script type="text/javascript" src="/jiadianshop/Public/Admin/js/select-ui.min.js"></script>


<script language="javascript">
$(function(){
    //导航切换
    $(".imglist li").click(function(){
        $(".imglist li.selected").removeClass("selected")
        $(this).addClass("selected");
    })
    $(".select3").uedSelect({
        width : 152
    });
})
</script>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });

  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>
</head>

<body class="sarchbody">
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">订单管理</a></li>
            <li><a href="#">订单列表</a></li>
        </ul>
    </div>

    <div class="rightinfo">
        <!--<form action="">
        <ul class="seachform1" style="width:100%">

            <li><label>订单号</label><input name="sn" type="text" value="<?php echo I('get.sn') ?>" class="scinput1"></li>
            <li><label>收货人</label><input name="shr_name" type="text" value="<?php echo I('get.shr_name') ?>" class="scinput1"></li>

            <li><label>订单状态</label>
                <div class="vocation">
                    <select class="select3" name="order_status">
                    <option value="-1" >全部</option>
                    <option value="1" <?php echo $_GET['order_status']==1?'selected':'' ?>>等待付款</option>
                    <option value="2" <?php echo $_GET['order_status']==2?'selected':'' ?>>等待发货</option>
                    <option value="3" <?php echo $_GET['order_status']==3?'selected':'' ?>>等待收货</option>
                    <option value="4" <?php echo $_GET['order_status']==4?'selected':'' ?>>退货中</option>
                    <option value="5" <?php echo $_GET['order_status']==5?'selected':'' ?>>待评论</option>
                    <option value="6" <?php echo $_GET['order_status']==6?'selected':'' ?>>已完成</option>
                    <option value="7" <?php echo $_GET['order_status']==4?'selected':'' ?>>已取消</option>
                    </select>
                </div>
            </li>
            <li><label>发货状态</label>
                <div class="vocation">
                    <select class="select3" name="post_status">
                    <option value="-1">全部</option>
                    <option value="1" <?php echo $_GET['post_status']==1?'selected':'' ?>>未发货</option>
                    <option value="2" <?php echo $_GET['post_status']==2?'selected':'' ?>>已发货</option>
                    <option value="4" <?php echo $_GET['post_status']==4?'selected':'' ?>>已确认收货</option>
                    </select>
                </div>
            </li>
            <li class=""><label>&nbsp;</label><input type="submit" name="send" class="scbtn" value="查询">   <input name="" type="button" class="scbtn1" onclick="moreSearch(this);" data-togg="0" value="更多条件">   </li>
        </ul>
        <div class="formbody moreSearch" id="moreSearch" style="margin-top:10px;display:none;clear:both;padding:0">
            <div id="usual1" class="usual">
                <ul class="seachform1">
                    <li><label>退货状态</label>
                        <div class="vocation">
                            <select class="select3" name="return_status">
                                <option value='-1'>全部</option>
                                <option value="1" <?php echo $_GET['return_status']==1?'selected':'' ?>>未申请</option>
                                <option value="2" <?php echo $_GET['return_status']==2?'selected':'' ?>>已申请</option>
                                <option value="3" <?php echo $_GET['return_status']==3?'selected':'' ?>>管理员已同意</option>
                                <option value="4" <?php echo $_GET['return_status']==4?'selected':'' ?>>管理员不同意</option>
                                <option value="5" <?php echo $_GET['return_status']==5?'selected':'' ?>>用户退货</option>
                                <option value="6" <?php echo $_GET['return_status']==6?'selected':'' ?>>退货已完成</option>
                            </select>
                        </div>
                    </li>
                    <li><label>是否评价</label>
                        <div class="vocation">
                            <select class="select3" name="is_comment">
                                <option value='-1'>全部</option>
                                <option value="1" <?php echo $_GET['is_comment']==1?'selected':'' ?> >已评价</option>
                                <option value="2" <?php echo $_GET['is_comment']==2?'selected':'' ?> >未评价</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </form>-->
        <table class="listtable">
        <thead>
        <tr>
            <th>编号</th>
            <th>订单号</th>
            <th>下单时间</th>
            <th>收货人</th>
            <th>总金额</th>
            <th>应付金额</th>
            <th>订单状态</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($order_list as $order): ?>
        <tr data-id="<?php echo ($order["order_id"]); ?>">
            <td><?php echo (max(1,intval($_GET['p']))-1)*C('ORDER_PAGE_SIZE') + ++$i ?></td>
            <td><a href="<?php echo U('info',array('order_id'=>$order['order_id']));?>"><?php echo ($order["order_no"]); ?></a></td>
            <td><?php echo (date("Y-m-d H:i:s",$order["order_time"])); ?></td>
            <td><?php echo ($order["address_name"]); ?></td>
            <td><?php echo ($order["order_total_money"]); ?></td>
            <td><?php echo ($order["order_total_money"]); ?></td>
            <td><?php if($order['order_state']==1){echo "<a href='' style='color:blue;'>".order_status($order['order_state'])."</a>";}elseif($order['order_state']==5||$order['order_state']==6){echo "<a href='' style='color:red;'>".order_status($order['order_state'])."</a>";}else{echo order_status($order['order_state']);}?>&nbsp;
            </td>
            <td>
                <a href="<?php echo U('info',array('order_id'=>$order['order_id']));?>">查看</a>
                <?php if($order['order_status']==1){?>
                |&nbsp;<a href="<?php echo U('sub',array('order_id'=>$order['order_id']));?>" onclick="return confirm('确认提交OMS系统？')" style="color:red">提交OMS</a>
                <?php }?>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>

        </table>

        <!-- 分页开始 -->
		
			<div class="page">
			<?php echo ($page); ?>
			</div>
        <!-- 分页结束 -->      
    </div>
    <script>
    function moreSearch(obj){
            if($(obj).attr('data-togg')==0){
                $('#moreSearch').slideDown(200);
                $(obj).attr('data-togg',1);
            }else{
                $('#moreSearch').slideUp(200);
                $(obj).attr('data-togg',0);
            }
        }
    </script>
</body>

</html>