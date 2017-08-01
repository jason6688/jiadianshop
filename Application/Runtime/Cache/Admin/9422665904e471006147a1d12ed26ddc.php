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
	    <li><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
	    <li><a >商品管理</a></li>
	    <li><a href="<?php echo U('index');?>">用户评论</a></li>
	    </ul>
	    </div>
	    <div class="rightinfo">
	    
	    <table class="listtable">
	    
	    <thead>
	    <tr>
	    <th width="60px;">编号</th>
	    <th>商品名称</th>
	    <th>货号</th>
	    <th>用户名</th>
	    <th>状态</th>
	    <th width="100px;">操作</th>
	    </tr>
	    </thead>
	    
	    <tbody>
	    <?php foreach ($comment_list as $v){?>
	    <tr>
	    <td><?php echo ($v["comment_id"]); ?></td>
	    <td><a href="<?php echo U('info',array('comment_id'=>$v['comment_id']));?>"><?php echo ($v["goods_name"]); ?></a></td>
	    <td><?php echo ($v["goods_sn"]); ?></td>
	    <td><?php echo ($v["user_name"]); ?></td>
	    <td><?php if($v['status']==1){?>允许显示<?php }elseif($v['status']==0){?>禁止显示<?php }?></td>
	    <td><a href="<?php echo U('info',array('comment_id'=>$v['comment_id']));?>">查看</a>|<a href="<?php echo U('del',array('status'=>0,'comment_id'=>$v['comment_id']));?>" onclick="return confirm('您确定要删除吗？')">删除</a></td>
	    </tr>
	    <?php }?>
	    </tbody>
	    </table>
			<!-- 分页开始 -->
		
			<div class="page">
			<?php echo ($page); ?>
			</div>
        <!-- 分页结束 -->
	    </div>

</body>
</html>