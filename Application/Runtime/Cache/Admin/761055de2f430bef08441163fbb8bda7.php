<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改文章</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>

<!-- ueditor编辑器配置文件 -->
<script type="text/javascript" src="/jiadianshop/Public/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/jiadianshop/Public/ueditor/ueditor.all.js"></script>

</head>
<body>

		<div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	    <li><a href="<?php echo U('Admin/Index/Index/main');?>">首页</a></li>
	    <li><a >文章管理</a></li>
	    <li><a href="<?php echo U('index');?>">文章列表</a></li>
	    <li><a href="<?php echo U('edit',array('article_id'=>$article['article_id']));?>">修改文章</a></li>
	    </ul>
	    </div>
	    
	    <div class="formbody">
	    <form action="<?php echo U('editAct',array('article_id'=>$article['id']));?>" method="post" enctype="multipart/form-data">
	    <ul class="forminfo">
	    <li><label>标题</label><input name="title" type="text" class="dfinput" value='<?php echo ($article["title"]); ?>'required='required'/><i>标题不能超过30个字符</i></li>
	    <li><label>文章分类</label>
	    	<select name='cat_id'style="width:345px; height:32px; line-height:32px; border-top:solid 1px #c3ab7d; border-left:solid 1px #c3ab7d; border-right:solid 1px #e7d5ba; border-bottom:solid 1px #e7d5ba; background: rgba(0, 0, 0, 0)  repeat-x scroll 0 0;">
				<option value="<?php echo ($catIdData["cat_id"]); ?>"><?php echo ($catIdData["cat_name"]); ?></option>
				<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cat_id"]); ?>"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$vo['lev']); echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	    	</select>
	    </li>
	    <li><label>文章图片</label><input name="image" type="file" class="dfinput" /><i>
	    <?php if(!empty($article['img_path'])){?>
	    <a href="<?php echo U('showImage',array('id'=>$article['id']));?>" target="_blank">[查看图片]</a>&nbsp;|&nbsp;<a href="<?php echo U('delImage',array('id'=>$article['id']));?>">[删除图片]</a>
	    <?php }?>
	    </i></li>
	    <li><label>内容</label><textarea name="body" id='content'style="width:1000px; min-height:520px" class="textinput" ><?php echo ($article["body"]); ?></textarea></li>
	    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认编辑"/></li>
	    </ul>
	    </form>
	    </div>

</body>
<script type = "text/javascript">
	//实例化编辑器
	var ue = UE.getEditor('content',{
		autoHeight:false,
		initialFrameWidth:1000,
		initialFrameHeight:700,
	});
</script>
</html>