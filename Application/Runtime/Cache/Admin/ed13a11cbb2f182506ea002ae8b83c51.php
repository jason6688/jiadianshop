<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章分类列表</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script>
function delete(){
	if(confirm('您确定要删除吗？')){
		return true;
	}else{
		return false;
	}
}
</script>
</head>
<body>
	 <div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	    <li><a href="<?php echo U('Admin/Index/main');?>">首页</a></li>
	    <li><a href="<?php echo U('Admin/Article/catList');?>">文章管理</a></li>
	    <li><a href="<?php echo U('Admin/Article/catList');?>">文章分类列表</a></li>
	    </ul>
	    </div>
	    <div class="rightinfo">
	    
	    <div class="tools">
	    	<ul class="toolbar">
	        <li class="click"><a href="<?php echo U('addCat');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png" /></span>添加</a></li>
	        </ul>
	    </div>
	    
	    <table class="imgtable">
	    
	    <thead>
	    <tr>
	    <th width="60px;">编号</th>
	    <th>分类名称</th>
	    <th>排序</th>
	    <th width="150px;">操作</th>
	    </tr>
	    </thead>
	    
	    <tbody>
	    
			<?php if(is_array($catList)): $i = 0; $__LIST__ = $catList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["cat_id"]); ?></td>
			<td><a href="<?php echo U('edit',array('cat_id'=>$vo.cat_id));?>"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$vo['lev']); echo ($vo["cat_name"]); ?></a></td>
			<td><?php echo ($vo["sort_order"]); ?></td>
			
			<td><a href="<?php echo U('editCat',array('cat_id'=>$vo['cat_id']));?>">修改</a>|<a href="<?php echo U('delCat',array('cat_id'=>$vo['cat_id']));?>" onclick="return confirm('您确定要删除吗？')">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    
	    </tbody>
	    </table>
	    </div>

</body>
</html>