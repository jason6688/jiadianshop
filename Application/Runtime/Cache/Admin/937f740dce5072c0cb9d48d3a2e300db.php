<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商城后台管理页面</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/jiadianshop/Public/Admin/js/skins/danlan/laydate.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jiadianshop/Public/Admin/js/jquery.js"></script>
<script language="JavaScript" src="/jiadianshop/Public/Admin/js/common.js"></script>
</head>
<body>
	 <div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	    <li><a href="#">首页</a></li>
	    <li><a >商品管理</a></li>
	    <li><a href="/jiadianshop/index.php/Admin/Goods/index">商品分类列表</a></li>
	    </ul>
	    </div>
	    <div class="rightinfo">

	    <div class="tools">
	    	<ul class="toolbar">
	        <li class="click"><a href="<?php echo U('addCate');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png" /></span>添加</a></li>
	        </ul>
	    </div>

	    <table class="filetable">

	    <thead>
	    <tr>
	    <!-- <th width="60px;">编号</th> -->
	    <th>分类名称</th>
	    <th>排序</th>
	    <th width="150px;">操作</th>
	    </tr>
	    </thead>

	    <tbody>
			<?php if(is_array($cateData)): $i = 0; $__LIST__ = $cateData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($vo["cat_id"]); ?>" data-pid="<?php echo ($vo["parent_id"]); ?>" style="<?php if($vo['parent_id']!=0) echo 'display:none' ?>" >
				<!-- <td><?php echo ($vo["cat_id"]); ?></td> -->
				<td><?php echo str_repeat("　　　",$vo['lev']);?><img src="/jiadianshop/Public/Admin/images/plus.png"><?php echo ($vo["cat_name"]); ?></td>
				<td><?php echo ($vo["order"]); ?></td>
				<td><a href="<?php echo U('editCate',array('cat_id'=>$vo['cat_id'],'parent_id'=>$vo['parent_id']));?>">修改</a> | <a href="<?php echo U('delCate',array('cat_id'=>$vo['cat_id']));?>" onclick="return confirm('您确定要删除吗？')">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    </tbody>
	    </table>
	    </div>
<script>
	$('.filetable tr').click(function(){
		/*
		HTML结构：		
		<tr data-id="id" data-pid="pid" style="遍历的时候 pid不等于0的就隐藏">
			<td><img src="/jiadianshop/Public/Admin/images/plus.png">分类名称</td>
			...
		 */
		var id = $(this).attr('data-id');
		var isOpen = $(this).attr('data-open');//获取当前的是否已经开启
		if(isOpen==1){
			//全部折叠起来
			hideChildren(this,id);
		}else{
			//显示下级孩子
			$('.filetable tr[data-pid='+id+']').show();
			$(this).find('img').attr('src',"/jiadianshop/Public/Admin/images/minus.png");
			$(this).attr('data-open',1);
		}

		//递归折叠所有的子级
		function hideChildren(obj,id){
			var id_ = 0;
			$(obj).attr('data-open',0);
			$(obj).find('img').attr('src',"/jiadianshop/Public/Admin/images/plus.png");
			$('.filetable tr[data-pid='+id+']').each(function(k,v){
				$(v).hide();
				$(v).find('img').attr('src',"/jiadianshop/Public/Admin/images/plus.png");
				$(v).attr('data-open',0);
				
				id_ = $(v).attr('data-id');
				hideChildren(obj,id_);
			});
		}
	});
</script>
</body>
</html>