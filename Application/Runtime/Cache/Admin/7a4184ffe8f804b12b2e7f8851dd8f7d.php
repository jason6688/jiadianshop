<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章列表</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
</head>
<body>
	 <div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
	    <li><a href="<?php echo U('Admin/Index/Index/main');?>">首页</a></li>
	    <li><a >文章管理</a></li>
	    <li><a href="<?php echo U('index');?>">文章列表</a></li>
	    </ul>
	    </div>
	    <div class="rightinfo">
	    
	    <div class="tools">
	    	<ul class="toolbar">
	        <li class="click"><a href="<?php echo U('add');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png" /></span>添加</a></li>
	        </ul>
	    </div>
	    
	    <table class="listtable">
	    
	    <thead>
	    <tr>
	    <th width="60px;">编号</th>
	    <th>标题</th>
	    <th>分类名称</th>
	    <th>添加时间</th>
	    <th width="150px;">操作</th>
	    </tr>
	    </thead>
	    
	    <tbody>
	    <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	    <td><?php echo ($vo["id"]); ?></td>
	    <td><a href="<?php echo U('edit',array('id'=>$vo.id));?>"><?php echo ($vo["title"]); ?></a></td>
	    <td><?php echo ($vo["cat_name"]); ?></td>
	    <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
	    <td><a href="<?php echo U('edit',array('id'=>$vo['id']));?>">修改</a>|<a href="<?php echo U('delArticle',array('id'=>$vo['id']));?>" onclick="return confirm('您确定要删除吗？')">删除</a></td>
	    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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