<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限分配</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<style>
    .pro-box label{display:block;font-size:18px;}
</style>
</head>
<body>
    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">权限分配</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div class="formtitle"><span>权限列表</span></div>
    <form action="<?php echo U('dodispath');?>" method="post">
    <!-- 权限 1商品管理 2订单管理 3广告管理  4文章管理  5会员管理  6权限管理  7问题管理 8系统设置-->
        <div class="pro-box">
            <label><input type="checkbox" name="pri[]" value="1" <?php echo in_array(1,$pri_list)?'checked':'' ?> />商品管理</label><br/>
            <label><input type="checkbox" name="pri[]" value="2" <?php echo in_array(2,$pri_list)?'checked':'' ?> />订单管理</label><br/>
            <label><input type="checkbox" name="pri[]" value="3" <?php echo in_array(3,$pri_list)?'checked':'' ?> />广告管理</label><br/>
            <label><input type="checkbox" name="pri[]" value="4" <?php echo in_array(4,$pri_list)?'checked':'' ?> />文章管理</label><br/>
            <label><input type="checkbox" name="pri[]" value="5" <?php echo in_array(5,$pri_list)?'checked':'' ?> />会员管理</label><br/>
            <label><input type="checkbox" name="pri[]" value="6" <?php echo in_array(6,$pri_list)?'checked':'' ?> />权限管理</label><br/>
            <label><input type="checkbox" name="pri[]" value="7" <?php echo in_array(7,$pri_list)?'checked':'' ?> />问题管理</label><br/>
			<label><input type="checkbox" name="pri[]" value="8" <?php echo in_array(8,$pri_list)?'checked':'' ?> />系统设置</label><br/>
        </div>
        <input type="hidden" name="id" value="<?php echo ($id); ?>"  class="btn" />
        <input type="submit" value="保存"  class="btn" />
    </form>


    </div>
</body>
</html>