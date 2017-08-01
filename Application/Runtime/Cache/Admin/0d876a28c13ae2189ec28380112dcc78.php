<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>售后问题列表列表</title>
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
        <li><a href="#">用户管理</a></li>
        <li><a href="#">用户列表</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        
        <!-- 添加按钮 -->
		<!--
        <div class="tools">
            <ul class="toolbar">
                <li class=""><a href="<?php echo U('add');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png"></span>添加</a></li>
            </ul>
        </div>
		-->

        <!-- 表格 -->
        <table class="tablelist">
            <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/jiadianshop/Public/Admin/images/px.gif" /></i></th>
                    <th>问题内容</th>
                    <th>联系方式</th>
					<th>提问时间</th>
                    <th>问题所属类别</th>
                </tr>
            </thead>
            <tbody>
                <!-- 品牌遍历区 -->
                
				<?php if(is_array($problem)): $i = 0; $__LIST__ = $problem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($vo["advice_question_id"]); ?>">
                    <td><?php echo ($vo["advice_question_id"]); ?></td>
                    <td><?php echo ($vo["advice_question_content"]); ?></td>
                    <td><?php echo ($vo["advice_question_user"]); ?></td>
                    <td><?php echo (date("Y-m-d H:i:s",$vo["advice_question_time"])); ?></td>
					<td><?php echo ($vo["advice_category_title"]); ?></td>
					
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php foreach ($user_list as $key => $user): ?>
                <?php endforeach ?>
                <!-- 品牌遍历区 -->
            </tbody>
        </table>


        <!-- 分页开始 -->
        <?php echo ($page); ?>
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
</body>
</html>