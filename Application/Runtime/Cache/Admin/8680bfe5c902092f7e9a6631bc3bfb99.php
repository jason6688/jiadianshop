<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理页面</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jiadianshop/Public/Admin/js/jquery.js"></script>
</head>
<body>

		<div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	    <li><a href="<?php echo U('Admin/Index/Index/main');?>">首页</a></li>
	    <li><a >商品管理</a></li>
	    <li><a href="<?php echo U('index');?>">用户评论</a></li>
	    <li><a href="<?php echo U('info',array('comment_id'=>$info_list[0]['comment_id']));?>">查看评论</a></li>
	    </ul>
	    </div>
	    
	    <div class="formbody">
	    <table class="listtable">
	    <tbody>
		    <tr>
		      <td>
		      <b><?php echo ($info_list[0]['user_name']); ?></b>&nbsp;于      &nbsp;<?php echo date('Y-m-d H:i:s',$info_list[0]['comment_time'])?>&nbsp;对&nbsp;<b><?php if (!empty($info_list[0]['goods_name'])){ echo ($info_list[0]['goods_name']); ?>【<?php echo ($info_list[0]['goods_sn']); ?>】<?php }?></b>&nbsp;发表评论 <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>评论内容为：</b> <?php echo ($info_list[0]['comment_content']); ?>  </td>
		    </tr>
		    <tr>
		      <td><hr size="1" color="#dadada"></td>
		    </tr>
		    <tr>
		      <td>
		        <div style="overflow:hidden; word-break:break-all;"><?php echo ($info_list[0]['content']); ?></div>
		      </td>
		    </tr>
		    <tr>
		      <td align="center">
					<?php if($info_list[0]['status'] == 0){?>
						<a href="<?php echo U('change',array('status'=>1,'comment_id'=>$info_list[0]['comment_id']));?>"><input type="button" class="sure" value='允许显示'/></a>
					<?php }else if ($info_list[0]['status'] == 1){?>
						<a href="<?php echo U('change',array('status'=>0,'comment_id'=>$info_list[0]['comment_id']));?>"><input type="button" class="sure" value="禁止显示"/></a>
					<?php }?>


		                
		            </td>
		    </tr>
	  	</tbody>
	    </table>
	    </div>
</body>
</html>