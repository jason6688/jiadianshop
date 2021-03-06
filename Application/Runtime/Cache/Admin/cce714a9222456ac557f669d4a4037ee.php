<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告列表</title>
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
function makeAdCode(o){
    var id   = $(o).attr('data-id');
    var img  = "<?php echo U('Home/Index/Ad/showAdImg');?>?id="+id;
    var code = '<a href="<?php echo U('Home/Index/Ad/showAd');?>?id='+id+'" target="_blank"><img src="'+img+'" onerror="this.parentNode.style.display=\'none\'" onload="this.parentNode.style.display=\'block\'"/></a>';
    prompt('请复制下面的广告代码:',code);
}
</script>

</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
        <li><a href="<?php echo U('Admin/Index/index/main');?>">首页</a></li>
        <li><a href="#">广告管理</a></li>
        <li><a href="#">广告列表</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <!-- <form action="<?php echo U('index');?>" method="get">
            <ul class="prosearch">
                <li>
                    <label>查询：</label>
                    <i>广告名称：</i>
                    <a><input name="name" type="text" value="<?php echo ($_GET['name']); ?>" class="scinput" /></a>
                    <a><input name="" type="submit" class="sure" value="查询"/></a>
                 </li>
            </ul>
        </form> -->

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
                    <th>广告位</th>
                    <th>广告类型</th>
                    <th>广告标题</th>
                    <th>广告图片</th>
                    <th>是否开启</th>
                    <th>是否已过期</th>
                    <th>点击次数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <!-- 广告遍历区 -->
                <?php foreach ($ad_list as $key => $ad): ?>
                <tr data-id="<?php echo ($ad["id"]); ?>">
                    <td><?php echo (max(1,intval($_GET['p']))-1)*C('AD_PAGE_SIZE') + ++$i ?></td>
                    <td><?php echo ($ad["ad_pos"]); ?><p><?php echo ($ad["pos_desc"]); ?></p></td>
                    <td><?php if($ad['type']==2){echo '图片广告';}?></td>
                    <td><?php echo ($ad["title"]); ?></td>
                    <td><img src="<?php echo ($ad["image"]); ?>" style="width:100px;" height="70" /></td>
                    <td>
                        <?php if($ad['is_on']==1):?>
                        <a href="javascript:;" class="toggleOn blue">已开启</a>
                        <?php else: ?>
                        <a href="javascript:;" class="toggleOn red">未开启</a>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if($ad['is_expire']==0):?>
                        <span class="blue">未过期</span>
                        <?php else: ?>
                        <span class="red">已过期</span>
                        <?php endif ?>
                    </td>

                    <td>
                        <?php echo ($ad["click_count"]); ?>
                    </td>

                    <td>
                        <a href="javascript:;" onclick="makeAdCode(this)" data-id="<?php echo ($ad['id']); ?>" data-img="<?php echo ($ad["image"]); ?>" class="tablelink">生成代码</a>
                        <a href="<?php echo U('edit',array('id'=>$ad['id']));?>" class="tablelink">编辑</a>
                        <a href="javascript:;" class="tablelink click" onclick="document.getElementById('data_id').setAttribute('data-id',<?php echo ($ad['id']); ?>)"> 删除</a>
                    </td>
                </tr>
                <?php endforeach ?>
                <!-- 广告遍历区 -->
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
            <input name="" id="data_id" data-id="" type="button" onclick="window.location.href='<?php echo U('del');?>?id='+this.getAttribute('data-id')"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
            </div>
        </div>
    </div>
    <script>
        /*
        表格各行变色
         */
        $('.tablelist tbody tr:odd').addClass('odd');

        /*
        切换广告开启状态
         */
        $('.toggleOn').click(function(){
            var id = $(this).parent().parent().attr('data-id');
            var that = $(this);
            $.ajax({
                url:"<?php echo U('toggleOn');?>",
                data:{id:id},
                success:function(data){
                    if(data>0){
                        if(that.html()=='未开启'){
                            that.html('已开启').removeClass('red').addClass('blue');
                        }else{
                            that.html('未开启').removeClass('blue').addClass('red');
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>