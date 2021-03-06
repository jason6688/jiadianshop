<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品牌列表</title>
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
        <li><a href="<?php echo U('index');?>">商品品牌</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <!--
		<form action="<?php echo U('index');?>" method="get">
            <ul class="prosearch">
                <li>
                    <label>查询：</label>
                    <i>品牌名称：</i>
                    <a><input name="name" type="text" value="<?php echo ($_GET['name']); ?>" class="scinput" /></a>
                    <a><input name="" type="submit" class="sure" value="查询"/></a>
                 </li>
            </ul>
        </form>
		-->
        <!-- 添加按钮 -->
        <div class="tools">
            <ul class="toolbar">
                <li class=""><a href="<?php echo U('addBrand');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png"></span>添加</a></li>
            </ul>
        </div>

        <!-- 表格 -->
        <table class="tablelist">
            <thead>
                <tr>
                    <!--<th><input name="" type="checkbox" value="" /></th>-->
                    <th>编号<i class="sort"><img src="/jiadianshop/Public/Admin/images/px.gif" /></i></th>
                    <th>品牌名称</th>
                    <th>品牌logo</th>
                    <th>是否显示</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <!-- 品牌遍历区 -->
                <?php foreach ($brandData as $key => $brand): ?>
                <tr data-id="<?php echo ($brand["brand_id"]); ?>">
                    <!--<td><input name="" type="checkbox" value="" /></td>-->
                    <td><?php echo (max(1,intval($_GET['p']))-1)*C('BRAND_PAGE_SIZE') + ++$i ?></td>
                    <td><?php echo ($brand["brand_name"]); ?></td>
                    <td><img height="36" src="<?php echo ($brand["brand_logo"]); ?>" /></td>
                    <td>
                        <?php if($brand['is_show']==1):?>
                        <a href="javascript:;" class="toggleShow blue">已显示</a>
                        <?php else: ?>
                        <a href="javascript:;" class="toggleShow red">已隐藏</a>
                        <?php endif ?>
                    </td>
                    <td><?php echo ($brand["order"]); ?></td>
                    <td>
                        <a href="<?php echo U('editBrand',array('brand_id'=>$brand['brand_id']));?>" class="tablelink">编辑</a>
                        <a href="javascript:;" class="tablelink click" onclick="document.getElementById('data_id').setAttribute('data-id',<?php echo ($brand['brand_id']); ?>)"> 删除</a>
                    </td>
                </tr>
                <?php endforeach ?>
                <!-- 品牌遍历区 -->
            </tbody>
        </table>
		<div style="clear:both;"></div>
        <!-- 分页开始 -->
		
			<div class="page">
			<?php echo ($page); ?>
			</div>
        <!-- 分页结束 -->
		<div style="clear:both;"></div>

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
            <input name="" id="data_id" data-id="" type="button" onclick="window.location.href='<?php echo U('delBrand');?>?brand_id='+this.getAttribute('data-id')"  class="sure" value="确定" />&nbsp;
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
                        if(that.html()=='已隐藏'){
                            that.html('已显示').removeClass('red').addClass('blue');
                        }else{
                            that.html('已隐藏').removeClass('blue').addClass('red');
                        }
                    }
                }
            });

        });
    </script>

</body>
</html>