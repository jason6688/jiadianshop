<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商城后台管理页面</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/jiadianshop/Public/Admin/js/skins/danlan/laydate.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jiadianshop/Public/Admin/js/jquery.js"></script>
<script language="JavaScript" src="/jiadianshop/Public/Admin/js/common.js"></script>
<script src="/jiadianshop/Public/Admin/js/laydate.js"></script>
<script type="text/javascript" charset="utf-8" src="/jiadianshop/Public/Common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/jiadianshop/Public/Common/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/jiadianshop/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>

		<div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	    <li><a href="index.php">首页</a></li>
	    <li><a >商品管理</a></li>
	    <li><a href="/jiadianshop/index.php/Admin/Goods/index">商品分类列表</a></li>
	    <li><a href="/jiadianshop/index.php/Admin/Goods/add">添加商品分类</a></li>
	    </ul>
	    </div>

	    <div class="formbody">
	    <form action="<?php echo U('addCateAct');?>" method="post" enctype="multipart/form-data">
	    <ul class="forminfo">
	    <li><label>商品分类名称</label><input name="cat_name" type="text" class="dfinput" value=''required='required'/><i>商品分类名称不能超过30个字符</i></li>
	    <li><label>上级分类</label>
	    	<select name='parent_id' class='selectId dfinput'>
	    	    <option name='parent_id' value='0'>顶级分类</option>
				<?php if(is_array($cateData)): $i = 0; $__LIST__ = $cateData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option name='parent_id' value='<?php echo ($vo["cat_id"]); ?>'><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$vo['lev']); echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	    	</select>
	    </li>
	    <li><label>排序</label><input name="order" type="text" class="sinput" value='1'/><i></i></li>
	    <li><label>&nbsp;</label>
		<!--<input type="hidden" name="class_id" value="<?php echo cookie('class_id') ?>" />-->
	    <input  type="submit" class="btn" value="确认保存"/></li>
	    </ul>
	    </form>
	    </div>

</body>
</html>