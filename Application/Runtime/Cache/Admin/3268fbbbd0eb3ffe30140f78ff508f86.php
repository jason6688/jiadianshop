<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品-列表</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/jiadianshop/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script type="text/javascript" src="/jiadianshop/Public/Admin/js/select-ui.min.js"></script>


<script language="javascript">
$(function(){
    //导航切换
    $(".imglist li").click(function(){
        $(".imglist li.selected").removeClass("selected")
        $(this).addClass("selected");
    })
    $(".select3").uedSelect({
        width : 152
    });
})
</script>
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

<body class="sarchbody">
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">商品管理</a></li>
            <li><a href="#">商品列表</a></li>
        </ul>
    </div>

    <div class="rightinfo">
		<!--
        <form action="">
        <ul class="seachform1" style="width:100%">

            <li><label>商品名称</label><input name="goods_title" type="text" value="<?php echo I('get.goods_title') ?>" class="scinput1"></li>
            <li><label>商品编号</label><input name="goods_sn" type="text" value="<?php echo I('get.goods_sn') ?>" class="scinput1"></li>

            <li><label>分类</label>
                <div class="vocation">
                    <select class="select3" name="cate_id">
                    <option value="0">全部</option>
                    <?php foreach ($cate_list as $cate): ?>
                    <option value="<?php echo ($cate["id"]); ?>" <?php echo $_GET['cate_id']==$cate['id']?'selected':'' ?> ><?php echo str_repeat('——',$cate['lev']) ?> <?php echo ($cate["name"]); ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </li>
            <li><label>品牌</label>
                <div class="vocation">
                    <select class="select3" name="brand_id">
                    <option value="0">全部</option>
                    <?php foreach ($brand_list as $brand): ?>
                    <option value="<?php echo ($brand["id"]); ?>" <?php echo $_GET['brand_id']==$brand['id']?'selected':'' ?> ><?php echo str_repeat('——',$brand['lev']) ?> <?php echo ($brand["name"]); ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </li>
            <li class=""><label>&nbsp;</label><input type="submit" name="send" class="scbtn" value="查询">   <input name="" type="button" class="scbtn1" onclick="moreSearch(this);" data-togg="0" value="更多条件">   </li>
        </ul>
        <div class="formbody moreSearch" id="moreSearch" style="margin-top:10px;display:none;clear:both;padding:0">
            <div id="usual1" class="usual">
                <ul class="seachform1">
                    <li><label>是否上架</label>
                        <div class="vocation">
                            <select class="select3" name="is_putaway">
                                <option value='0'>全部</option>
                                <option value="1" <?php echo $_GET['is_putaway']==1?'selected':'' ?> >已上架</option>
                                <option value="2" <?php echo $_GET['is_putaway']==2?'selected':'' ?> >未上架</option>
                            </select>
                        </div>
                    </li>
                    <li><label>是否团购</label>
                        <div class="vocation">
                            <select class="select3" name="is_groupbuy">
                                <option value='0'>全部</option>
                                <option value="1" <?php echo $_GET['is_groupbuy']==1?'selected':'' ?> >抢购中</option>
                                <option value="2" <?php echo $_GET['is_groupbuy']==2?'selected':'' ?> >未开启</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </form>
		-->

        <div class="tools">
            <ul class="toolbar">
            <li class=""><a href="<?php echo U('addGoods');?>"><span><img src="/jiadianshop/Public/Admin/images/t01.png" /></span>添加</a></li>
            </ul>
        </div>

        <table class="imgtable">
        <thead>
        <tr>
            <th>序号</th>
            <th>商品图片</th>
            <th>商品编号</th>
            <th>商品标题</th>
            <th>分类&amp;品牌</th>
            <th>商品价格(元)</th>
            <th>商品状态</th>
            <th>正品</th>
            <!--<th>抢购</th>-->
            <!--<th>抢购价格(元)</th>-->
            <!--<th>点击次数</th>-->
            <th>库存</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($goodsList as $goods): ?>
        <tr data-id="<?php echo ($goods["id"]); ?>">
                    <td><?php echo (max(1,intval($_GET['p']))-1)*C('GOODS_PAGE_SIZE') + ++$i ?></td>
            <td class="imgtdd"><img width="54px" src="<?php echo strtr($goods['goods_thumb_img'], '|', true)? strtr($goods['goods_thumb_img'], '|', true): strtr($goods['goods_thumb_img'], ' ', true);?>" /></td>
            <td><?php echo ($goods["goods_sn"]); ?></td>
            <td><a href="#"><?php echo mb_substr($goods['goods_name'],0,24,'utf-8').'...';?></a><p><?php echo ($goods["pro_info"]); ?></p></td>
            <td><?php echo ($goods["cate_name"]); ?><p><?php echo ($goods["brand_name"]); ?></p></td>
            <td><?php echo ($goods["shop_price"]); ?>
                <p><del><?php echo ($goods["market_price"]); ?></del></p>
            </td>
            <td>
                <?php if($goods['is_putaway']==1):?>
                <span class=" blue">出售中</span>
                <?php else: ?>
                <span class=" blue">已下架</span>
                <?php endif ?>
            </td>
            <td>
                <a href="javascript:;" class="toggleReal blue">正品</a>
            </td>
            <!--
            <td>
                <?php if($goods['is_groupbuy']==1):?>
                <a href="javascript:;" class="toggleShow blue">抢购中</a>
                <?php else: ?>
                <a href="javascript:;" class="toggleShow red">未开启</a>
                <?php endif ?>
            </td>
            -->
            <!--<td><?php echo ($goods["groupbuy_price"]); ?></td>-->
            <!--<td><?php echo ($goods["click_count"]); ?></td>-->
            <td><?php echo ($goods["goods_number"]); ?></td>
            <td><?php echo (date("Y-m-d H:i",$goods["add_time"])); ?></td>
            <td>
                <a href="<?php echo U('Admin/Goods/stockManage',array('goods_id'=>$goods['goods_id']));?>">库存管理</a>
                <a href="<?php echo U('editGoods',array('goods_id'=>$goods['goods_id']));?>">【编辑】</a>
                        <a href="javascript:;" class="tablelink click" onclick="document.getElementById('data_id').setAttribute('data-id',<?php echo ($goods['goods_id']); ?>)">【删除】</a>
            </td>
        </tr>
        <?php endforeach ?>

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
            <p>是否确将商品放入回收站吗 ？</p>
            <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
            </div>
            <div class="tipbtn">
            <input name="" id="data_id" data-id="" type="button" onclick="window.location.href='<?php echo U('recycleGoods');?>?goods_id='+this.getAttribute('data-id')"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
            </div>
        </div>



<script type="text/javascript">
    $('.imgtable tbody tr:odd').addClass('odd');
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
        $('.toggleShow').click(function(){
            var id = $(this).parent().parent().attr('data-id');
            var that = $(this);
            $.ajax({
                url:"<?php echo U('toggleGroup');?>",
                data:{id:id},
                success:function(data){
                    if(data>0){
                        //后台修改成功
                        if(that.html()=='未开启'){
                            that.html('抢购中').removeClass('red').addClass('blue');
                        }else{
                            that.html('未开启').removeClass('blue').addClass('red');
                        }
                    }
                }
            });
        });
        $('.toggleReal').click(function(){
            var id = $(this).parent().parent().attr('data-id');
            var that = $(this);
            $.ajax({
                url:"<?php echo U('toggleReal');?>",
                data:{id:id},
                success:function(data){
                    if(data>0){
                        //后台修改成功
                        if(that.html()=='非正品'){
                            that.html('正品').removeClass('red').addClass('blue');
                        }else{
                            that.html('非正品').removeClass('blue').addClass('red');
                        }
                    }
                }
            });
        });

        function moreSearch(obj){
            if($(obj).attr('data-togg')==0){
                $('#moreSearch').slideDown(200);
                $(obj).attr('data-togg',1);
            }else{
                $('#moreSearch').slideUp(200);
                $(obj).attr('data-togg',0);
            }
        }
    </script>
</body>

</html>