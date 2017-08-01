<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录商城后台管理系统</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script src="/jiadianshop/Public/Admin/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
    $(function(){
        $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        $(window).resize(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        })
        $('#verifycode').click();
});
</script>

</head>

<body style="background-color:#df7611; background-image:url(/jiadianshop/Public/Admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>


<div class="logintop">
    <span>欢迎登录后台管理界面平台</span>

    </div>

    <div class="loginbody">

    <span class="systemlogo"></span>

    <div class="loginbox loginbox1">

    <form action="<?php echo U('loginAct');?>" method="post">
        <ul>
            <li><input name="admin_name" type="text" class="loginuser" placeholder="请输入用户名"/></li>
            <li><input name="admin_pwd" type="password" class="loginpwd" placeholder="请输入密码"/></li>
            <li class="yzm" style="position:relative;">
            <span><input name="verifycode" type="text" placeholder="请输入验证码" /></span>
            <img style="position:absolute;top:0;right:0;cursor:pointer;border:1px solid #FBAB34;" onclick="this.src = '<?php echo U('verifyCode');?>?r='+Math.random()" id="verifycode" width="114" height="44"  src="<?php echo U('showVerify');?>" alt="" />
            </li>
            <li><input name="" type="submit" class="loginbtn" value="登录" /><label><input name="remember_pass" type="checkbox" value="1" />一周免登陆</label><!-- <label><a href="#">忘记密码？</a></label> --></li>
        </ul>
    </form>

    </div>
    </div>
</body>
</html>