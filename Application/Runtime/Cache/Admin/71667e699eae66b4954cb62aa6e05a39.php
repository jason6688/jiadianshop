<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员列表</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });

  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>

</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
        <li><a href="<?php echo U('Admin/Index/index/main');?>">首页</a></li>
        <li><a href="">权限管理</a></li>
        <li><a href="">管理员列表</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <!--<form action="<?php echo U('index');?>" method="get">
            <ul class="prosearch">
                <li>
                    <label>查询：</label>
                    <i>用户名：</i>
                    <a><input name="user_name" type="text" value="<?php echo ($_GET['admin_name']); ?>" class="scinput" /></a>
                </li>
                <li>
                    <i>管理员姓名：</i>
                    <a><input name="linkman" type="text" value="<?php echo ($_GET['linkman']); ?>" class="scinput" /></a>
                    <a><input name="" type="submit" class="sure" value="查询"/></a>
                 </li>
            </ul>
        </form>-->

        <!-- 添加按钮 -->
        <div class="tools">
            <ul class="toolbar">
                <li class=""><a href="<?php echo U('add');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png"></span>添加</a></li>
            </ul>
        </div>

        <!-- 表格 -->
        <table class="tablelist">
            <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/jiadianshop/Public/Admin/images/px.gif" /></i></th>
                    <th>用户名</th>
                    <th>真实姓名</th>
                    <th>邮箱</th>
                    <th>电话</th>
                    <th>最后登陆时间</th>
                    <th>启用账号</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($manager_list as $key => $manager): ?>
                <tr data-id="<?php echo ($manager["admin_id"]); ?>">
                    <td><?php echo (max(1,intval($_GET['p']))-1)*10 + ++$i ?></td>
                    <td><?php echo ($manager["admin_name"]); ?></td>
                    <td><?php echo ($manager["linkman"]); ?></td>
                    <td><?php echo ($manager["email"]); ?></td>
                    <td><?php echo ($manager["tel"]); ?></td>
                    <td><?php echo (date("Y-m-d H:i:s",$manager['last_login'])); ?></td>

                    <td>
                        <?php if($manager['is_lock']==0):?>
                        <a href="javascript:;" class="toggleShow blue">已启用</a>
                        <?php else: ?>
                        <a href="javascript:;" class="toggleShow red">已禁用</a>
                        <?php endif ?>
                    </td>

                    <td>
                        <a href="<?php echo U('dispath',array('id'=>$manager['admin_id']));?>" class="tablelink">分配权限</a>
                        <a href="<?php echo U('edit',array('id'=>$manager['admin_id']));?>" class="tablelink">编辑</a>
                        <a href="javascript:;" class="tablelink click" onclick="document.getElementById('data_id').setAttribute('data-id',<?php echo ($manager['admin_id']); ?>)"> 删除</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>


        <!-- 分页开始 -->
		
			<div class="page">
			<?php echo ($page); ?>
			</div>
        <!-- 分页结束 -->


        <div class="tip">
            <div class="tiptop"><span>提示信息</span><a></a></div>
          <div class="tipinfo">
            <span><img src="/jiadianshop/Public/Admin/images/i04.png" /></span>
            <div class="tipright">
            <p>是否确认真的删除吗 ？</p>
            <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
            </div>
            <div class="tipbtn">
            <input name="" id="data_id" data-id="" type="button" onclick="window.location.href='<?php echo U('delete');?>?id='+this.getAttribute('data-id')"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
            </div>
        </div>


    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
        $('.toggleShow').click(function(){
            var id = $(this).parent().parent().attr('data-id');
            var that = $(this);
            $.ajax({
                url:"<?php echo U('toggle');?>",
                data:{id:id},
                success:function(data){
                    if(data>0){
                        //后台修改成功
                        if(that.html()=='已禁用'){
                            that.html('已启用').removeClass('red').addClass('blue');
                        }else{
                            that.html('已禁用').removeClass('blue').addClass('red');
                        }
                    }
                }
            });

        });
    </script>

</body>
</html>