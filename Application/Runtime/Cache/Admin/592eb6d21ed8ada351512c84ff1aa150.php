<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告位置-添加</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- 当前位置 -->
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">广告管理</a></li>
            <li><a href="#">广告位置</a></li>
            <li><a href="#">添加</a></li>
        </ul>
    </div>
	
    <form action="<?php echo U('addAct');?>" method="post">
        <div class="formbody">
            <div class="formtitle"><span>基本信息</span></div>
            <ul class="forminfo">
                <!-- 广告位名称 -->
                <li><label>广告位名称<b>*</b></label><input name="name" type="text" class="dfinput" /><i></i></li>

                <!-- 广告位宽度 -->
                <li><label>广告位宽度<b>*</b></label><input name="width" type="number" class="dfinput" style="width:100px;" /> px<i>宽度为1到1024之间</i></li>

                <!-- 广告位高度 -->
                <li><label>广告位高度<b>*</b></label><input name="height" type="number" class="dfinput" style="width:100px;" /> px<i>高度为1到1024之间</i></li>

                <!-- 广告位置的描述 -->
                <li><label>广告位置的描述</label>
                <textarea name="pos_desc" id="" cols="20" class="textinput" rows="10"></textarea>
                <i>描述不能超过255个字符</i></li>

                <!-- 添加按钮 -->
                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="添加"/></li>
            </ul>
        </div>
    </form>
	
</body>
</html>