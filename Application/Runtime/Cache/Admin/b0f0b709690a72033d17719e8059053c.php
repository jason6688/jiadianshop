<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>

</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="<?php echo U('main');?>">首页</a></li>
    </ul>
    </div>

    <div class="mainindex">
    
    
    <div class="welinfo">
    <span><img src="/jiadianshop/Public/Admin/images/sun.png" alt="天气" /></span>
    <b>您好，<?php echo $_SESSION['admin_name'];?> ，欢迎使用信息管理系统！</b>
    <a href="<?php echo U('Admin/Index/Index/info',array('id'=>$admin_id));?>">修改信息</a>
    </div>
    
    <div class="welinfo">
    <span><img src="/jiadianshop/Public/Admin/images/time.png" alt="时间" /></span>
    <i>您上次登录的时间：<?php echo ($last_login); ?></i>
    </div>
    
    <div class="xline"></div>
    
    <ul class="iconlist">
    <li><img src="/jiadianshop/Public/Admin/images/ico01.png" /><p><a href="index.php?permission">管理员设置</a></p></li>
    <li><img src="/jiadianshop/Public/Admin/images/ico03.png" /><p><a href="#">数据统计</a></p></li>
            
    </ul>
    <div class="xline"></div>
    <div class="box"></div>
    </div>



</body>

</html>