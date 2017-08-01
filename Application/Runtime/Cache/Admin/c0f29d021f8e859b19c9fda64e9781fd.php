<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品库存-列表</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<style>
    .select{
        height: 32px;
            margin-top: 0px;
            margin: 2px;
            line-height: 32px;
            font-family: Tahoma, 微软雅黑, 宋体;
            color: rgb(0, 0, 0);
            resize: none;
            padding: 0px 5px;
            border-width: 1px;
            border-style: solid;
             cursor: pointer;
             height: 34px;
            border-color: rgb(195, 171, 125) rgb(231, 213, 186) rgb(231, 213, 186) rgb(195, 171, 125);
    }
    .goods-info{
        height:40px;line-height: 40px;background: #FFF3E1;font-size:18px;margin-bottom: 10px;text-indent:10px;
    }
    .goods-info i{
        font-style:normal;font-size: 14px;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
    $(".tip").fadeIn(200);
  });
  $(".cancel,.tiptop a").click(function(){
    $(".tip").fadeOut(200);
  });
});
</script>

</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
        <li><a href="<?php echo U('Admin/Index/index/main');?>">首页</a></li>
        <li><a href="<?php echo U('index');?>">库存管理</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <div class="goods-info">商品名称：<i><?php echo ($goods["goods_name"]); ?></i> &nbsp;&nbsp;&nbsp;商品编号：<i><?php echo ($goods["goods_sn"]); ?></i></div>
        <!-- 表格 -->
        <form action="<?php echo U('stockManageAct');?>" method="post">
        <table class="tablelist">
            <thead>
                <tr>
                    <?php foreach ($goods_attr_list as $goods_attr): ?>
                   <!-- <th><?php echo ($goods_attr[0]['name']); ?></th>-->
                    <?php endforeach ?>
                    <th style="text-align:center">库存</th>
                    <!--<th>操作</th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($goods_stock_list as $key => $goods_stock): ?>
                <tr data-id="<?php echo ($goods_stock["id"]); ?>">
                    <?php if(!empty($goods_attr_list)): ?>
                        <?php foreach ($goods_stock['attr_value'] as $key => $v): ?>
                        <!--<td>
                           <?php echo ($v); ?>
                        </td>-->
                        <?php endforeach ?>
                    <?php endif ?>
                    <td align="center"><input type="number" value="<?php echo ($goods["goods_number"]); ?>" class="dfinput" style="width:100px;text-align:center;" name="goods_number" id="" />
					<!--<input type="number" value="<?php echo ($goods["goods_number"]); ?>" class="dfinput" style="width:100px;text-align:center;" name="goods_number[]" id="" />-->
					</td>
                    <!--<td>
                        <input type="button" value="删除" class="scbtn click" onclick="$('#data_id').attr('data-id',<?php echo ($goods_stock["id"]); ?>)" style="margin:2px;" />
                        <input type="hidden" name="goods_stock_id[]" value="<?php echo ($goods_stock["id"]); ?>" />
                    </td>-->
                </tr>
                <?php endforeach ?>
                <tr>
                    <?php foreach ($goods_attr_list as $key => $goods_attr): ?>
                    <td>
                        <select class="select" name="goods_attr_id[]">
                            <option value="">请选择...</option>
                            <?php foreach ($goods_attr as $key => $value): ?>
                            <option value="<?php echo ($value["id"]); ?>"><?php echo ($value["attr_value"]); ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                    <?php endforeach ?>

                    <td align="center"><input type="number" class="dfinput" style="width:100px;" name="goods_number" /></td>
					<td></td>
                    <!--<td><input type="button" value="添加" class="scbtn1" onclick="addSpec(this)" /></td>-->
                </tr>


                <tr>
                    <td colspan="<?php echo count($goods_attr_list)+2 ?>" align="center" height="50px;">
                    <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>" />
                        <input type="submit" value="提交" class="btn"/>
                    </td>
                </tr>

            </tbody>
        </table>
        </form>

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
            <input name="" id="data_id" data-id="" type="button" onclick="deleteStock($(this).attr('data-id'));"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
            </div>
        </div>


    </div>
    <script type="text/javascript">

    /*
        添加一行
         */
        function addSpec(obj){
            $(obj).parent().parent().before('<tr>'+$(obj).parent().parent().clone().html().replace('添加','删除').replace('addSpec','removeSpec').replace('scbtn1','scbtn')+'</tr>');
        }

        /*
        删除一行
         */
        function removeSpec(obj){
            $(obj).parent().parent().remove();
        }
        function deleteStock(id){

            $.ajax({
                url:"<?php echo U('delete');?>",
                data:{id:id},
                success:function(data){
                    if(data>0){
                        //后台修改成功
                        $(".tip").fadeOut(200,function(){
                            $('tr[data-id='+id+']').remove();
                        });
                    }
                }
            });
        }
    </script>

</body>
</html>