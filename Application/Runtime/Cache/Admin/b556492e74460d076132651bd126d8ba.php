<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告位置列表</title>
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
        <li><a href="#">广告管理</a></li>
        <li><a href="#">广告位置</a></li>
        </ul>
    </div>
    <div class="rightinfo">
	<!--
        <form action="<?php echo U('index');?>" method="get">
            <ul class="prosearch">
                <li>
                    <label>查询：</label>
                    <i>广告位名称：</i>
                    <a><input name="name" type="text" value="<?php echo ($_GET['name']); ?>" class="scinput" /></a>
                    <a><input name="" type="submit" class="sure" value="查询"/></a>
                 </li>
            </ul>
        </form>
	-->	
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
                    <th>广告位名称</th>
                    <th>广告位宽度</th>
                    <th>广告位高度</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <!-- 品牌遍历区 -->
                <?php foreach ($adpos_list as $key => $adpos): ?>
                <tr data-id="<?php echo ($adpos["pos_id"]); ?>">
                    <td><?php echo (max(1,intval($_GET['p']))-1)*C('ADPOS_PAGE_SIZE') + ++$i ?></td>
                    <td><?php echo ($adpos["name"]); ?></td>
                    <td><?php echo ($adpos["width"]); ?></td>
                    <td><?php echo ($adpos["height"]); ?></td>

                    <td>
                        <a href="<?php echo U('Admin/Advertise/index',array('pos_id'=>$adpos['pos_id']));?>" class="tablelink">广告列表</a>
                        <a href="<?php echo U('edit',array('pos_id'=>$adpos['pos_id']));?>" class="tablelink">编辑</a>
                        <a href="javascript:;" class="tablelink click" onclick="document.getElementById('data_id').setAttribute('data-id',<?php echo ($adpos['pos_id']); ?>)"> 删除</a>
                    </td>
                </tr>
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
            <input name="" id="data_id" data-id="" type="button" onclick="window.location.href='<?php echo U('del');?>?pos_id='+this.getAttribute('data-id')"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
            </div>
        </div>
    </div>
</body>
</html>