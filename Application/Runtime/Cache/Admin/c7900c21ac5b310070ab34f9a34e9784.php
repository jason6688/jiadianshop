<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员-编辑</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- 当前位置 -->
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">权限管理</a></li>
            <li><a href="#">编辑管理员</a></li>
        </ul>
    </div>

    <form action="<?php echo U('update');?>" method="post">
        <div class="formbody">
            <div class="formtitle"><span>基本信息</span></div>
            <ul class="forminfo">
                <li><label>用户名:<b>*</b></label><input name="" disabled value="<?php echo ($user["admin_name"]); ?>" type="text" class="dfinput" /><i>不能修改用户名</i></li>
                <li><label>密　　码:<b>*</b></label><input name="password" type="password" class="dfinput" /><i>密码为空则为不修改密码</i></li>
                <li><label>真实姓名:</label><input name="linkman" type="text" value="<?php echo ($user["linkman"]); ?>" class="dfinput" /><i></i></li>
                <li><label>电子邮箱:</label><input name="email" type="text" value="<?php echo ($user["email"]); ?>" class="dfinput" /><i></i></li>
                <li><label>联系电话:</label><input name="tel" type="text" value="<?php echo ($user["tel"]); ?>" class="dfinput" /><i></i></li>

                <!-- 是否使用 -->
                <li><label>是否启用</label><cite><input name="is_lock" type="radio" <?php echo ($user['is_lock']==0?'checked':''); ?> value="0" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_lock" type="radio" <?php echo ($user['is_lock']==1?'checked':''); ?> value="1" />否</cite></li>

                <!-- 添加按钮 -->
                <li><label>&nbsp;</label>
                    <input name="admin_id" type="hidden" value="<?php echo ($user["admin_id"]); ?>"/>
                    <input name="" type="submit" class="btn" value="保存"/>
                </li>
            </ul>
        </div>
    </form>

</body>
</html>