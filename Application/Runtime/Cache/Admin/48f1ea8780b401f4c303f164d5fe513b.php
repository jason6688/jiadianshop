<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章分类添加</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
</head>
<body>

		<div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	   	<li><a href="<?php echo U('Admin/Index/Index/main');?>">首页</a></li>
	    <li><a >文章管理</a></li>
	    <li><a href="<?php echo U('index');?>">文章分类列表</a></li>
	    <li><a href="<?php echo U('add');?>">添加文章分类</a></li>
	    </ul>
	    </div>
	    
	    <div class="formbody">
	    <form action="<?php echo U('addCatAct');?>" method="post" enctype="multipart/form-data">
	    <ul class="forminfo">
	    <li><label>文章分类名称</label><input name="cat_name" type="text" class="dfinput" value=''required='required'/><i>文章分类名称不能超过30个字符</i></li>
	    <li><label>上级分类</label>
	    	<select name='parent_id'style="width:345px; height:32px; line-height:32px; border-top:solid 1px #c3ab7d; border-left:solid 1px #c3ab7d; border-right:solid 1px #e7d5ba; border-bottom:solid 1px #e7d5ba; background: rgba(0, 0, 0, 0) repeat-x scroll 0 0;">
	    	    <option value='0'>顶级分类</option>
				<?php if(is_array($cateData)): $i = 0; $__LIST__ = $cateData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["cat_id"]); ?>'><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$vo['lev']); echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	    	</select>
	    </li>
	    <li><label>排序</label><input name="sort_order" type="text" class="sinput" value='0'/><i></i></li>
	    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
	    </form>
	    </div>


</body>
</html>