<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品-添加</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/jiadianshop/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script type="text/javascript" src="/jiadianshop/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/jiadianshop/Public/Admin/js/select-ui.min.js"></script>
<script src="/jiadianshop/Public/Plugin/laydate/laydate.js"></script>
<script src="/jiadianshop/Public/Plugin/jquery/jquery.colorpicker.js"></script>

<!-- ueditor编辑器配置文件 -->
<script type="text/javascript" src="/jiadianshop/Public/ueditorGoods/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/jiadianshop/Public/ueditorGoods/ueditor.all.js"></script>


<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
        width : 345
    });
    $(".select2").uedSelect({
        width : 167
    });
    $(".select3").uedSelect({
        width : 100
    });

});
</script>

</head>

<body>

    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
        <li><a href="#">首页</a></li>
        
        
        <li><a href="#">添加商品</a></li>
        </ul>
    </div>
    <div class="formbody">
    <div id="usual1" class="usual">

    <!-- 选项卡 -->
    <div class="itab">
        <ul>
        <li><a href="#tab1" class="selected">通用信息</a></li>
        <li><a href="#tab2">详细描述</a></li>
        <li><a href="#tab3">其他信息</a></li>
        <li><a href="#tab4">商品属性</a></li>
        <li><a href="#tab5">商品相册</a></li>
        </ul>
    </div>
    <form action="<?php echo U('editGoodsAct');?>" method="post" enctype="multipart/form-data">

        <!-- 选项卡一 -->
        <div id="tab1" class="tabson">
        <!-- <div class="formtext">Hi，<b>admin</b>，欢迎您试用信息发布功能！</div> -->
            <ul class="forminfo">

                <!-- 商品名称 -->
                <li>
                    <label>商品名称<b>*</b></label>
                    <input name="goods_name" type="text" id="goods_title" class="dfinput" placeholder="请填写商品名称"  style="width:518px;" value ="<?php echo ($goodsData["goods_name"]); ?>"/>
                    <input name="goods_id" type="hidden" value="<?php echo ($goodsData["goods_id"]); ?>">
                    <!--<input type="hidden" id="goods_title_style" name="goods_title_style" value="" />-->
                    <img src="/jiadianshop/Public/Admin/images/colorpicker.png" id="cp3" style="cursor:pointer">
                    <!-- <div style="display:inline;margin:3px;">
                        <label><input type="checkbox" name="" id="" />加粗</label>
                        <label><input type="checkbox" name="" id="" />下划线</label>
                        <label><input type="checkbox" name="" id="" />斜体</label>
                        <label><input type="checkbox" name="" id="" />删除线</label>
                    </div> -->
                </li>

                <!-- 促销信息 -->
                <li>
                    <label>商品卖点</label>
                    <input name="selling_points" type="text" class="dfinput" placeholder="商品卖点"  style="width:518px;" value="<?php echo ($goodsData["selling_points"]); ?>"/>
                    <i>显示在商品标题下面的商品卖点信息。</i>
                </li>
                <!-- 商品编号 -->
                <li>
                    <label>商品编号</label>
                    <input name="goods_sn" type="text" class="dfinput" placeholder="请填写商品编号" style="width:218px;" value="<?php echo ($goodsData["goods_sn"]); ?>"/>
                    <i>如果您不输入商品编号，系统将自动生成一个唯一的编号。</i>
                </li>

                <!-- 商品所属分类 -->
                <li>
                    <label>商品分类<b>*</b></label>
                    <div class="vocation">
                        <select class="select1" name="cat_id">
                            <option value="<?php echo ($goodsData["cat_id"]); ?>"><?php echo ($goodsData["cat_name"]); ?></option>
                            <option value="0">请选择...</option>
                            <?php foreach ($catList as $cate): ?>
                            <option value="<?php echo ($cate["cat_id"]); ?>"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $cate['lev']) ?> <?php echo ($cate["cat_name"]); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </li>

                <!-- 商品所属品牌 -->
                <li>
                    <label>商品品牌</label>
                    <div class="vocation">
                        <select class="select1" name="brand_id">
                            <option value="<?php echo ($brand["brand_id"]); ?>"><?php echo ($brand["brand_name"]); ?></option>
                            <option value="">请选择...</option>
                            <?php foreach ($brandData as $brand): ?>
                            <option value="<?php echo ($brand["brand_id"]); ?>"><?php echo ($brand["brand_name"]); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </li>


                <!-- 商品价格 -->
                <li>
                    <label>市场价格<b>*</b></label>
                    <input name="market_price" type="text" class="dfinput" placeholder="请填写市场价格" value="<?php echo ($goodsData["market_price"]); ?>"/>
                </li>

                <!-- 本店售价 -->
                <li>
                    <label>本店售价<b>*</b></label>
                    <input name="shop_price" type="text" class="dfinput" placeholder="请填写本店售价" value="<?php echo ($goodsData["shop_price"]); ?>"/>
                </li>
                <!-- 库存 -->
                <li>
                    <label>库存<b>*</b></label>
                    <input name="goods_number" type="text" class="dfinput" placeholder="请填写商品库存" value="<?php echo ($goodsData["goods_number"]); ?>"/>
                </li>
				<li>
                    <label>销售属性<b>*</b></label>
                    <input name="sale_attr" type="text" class="dfinput" placeholder="请填写商品的销售属性"/>
					<i>销售属性名用和销售属性值之间用|号隔开，不同销售属性值之间用英文逗号隔开。</i>
                </li>

                <!-- 团购价格 -->
                <!--
                <li>
                    <label>团购售价</label>
                    <label style="width:55px;"><input type="checkbox" style="position:relative;top:2px;" name="is_groupbuy" id="is_groupbuy" onclick="handlePromote(this.checked);" value="1" />开启</label>
                    <input name="groupbuy_price" type="text" class="dfinput" placeholder="请填写团购价格" id="promote" style="width:290px" disabled />
                </li>
                -->

                <!-- 团购 -->
                <!--
                <li>
                    <label>团购数量区间</label>
                    <input name="groupbuy_min_num" id="groupbuy_min_num" value="1" type="number" class="dfinput" style="width:100px;" disabled/>
                    ——
                    <input name="groupbuy_max_num" id="groupbuy_max_num" value="5" type="number" class="dfinput" style="width:100px;" disabled/>
                </li>

                -->
                <!-- 团购时间限制 -->
                <!--
                <li>
                    <label>团购日期</label>
                    <input name="groupbuy_start_date" id="groupbuy_start_date" placeholder="请输入开始日期" class="laydate-icon" style="height:33px;" disabled>

                    <input name="groupbuy_end_date" id="groupbuy_end_date" placeholder="请输入结束日期" class="laydate-icon" style="height:33px;"  disabled>
                </li>
                -->
                
                <!-- 商品封面图片 -->
                <!--
                <li>
                    <label>商品封面图片</label>
                    <input type="file" name="face_image" accept="image/*" style="position:relative;top:7px;" />
                </li>
                -->

            </ul>
        </div>

        <!-- 商品描述信息 -->
        <div id="tab2" class="tabson">
            <textarea id="editor_id" name="goods_desc" style="width:850px;height:400px;"><?php echo ($goodsData["goods_desc"]); ?></textarea>
        </div>

        <!-- 其他信息 -->
        <div id="tab3" class="tabson">
            <ul class="forminfo">
                <li>
                    <label>是否上架</label>
                    <label style="width:230px;"><input type="checkbox" name="is_putaway" id="" style="position:relative;top:2px;" <?php if ($goodsData['is_putaway'] ==1) { echo "checked"; }?> value="1"/>打勾表示允许销售，否则不允许销售。</label>
                </li>
                <li>
                    <label>是否新品</label>
                    <label style="width:230px;"><input type="checkbox" name="is_new" id="" style="position:relative;top:2px;" <?php if ($goodsData['is_new'] ==1) { echo "checked"; }?> value="1"/>新品</label>
                </li>
                <li>
                    <label>是否推荐</label>
                    <label style="width:230px;"><input type="checkbox" name="is_rec" id="" style="position:relative;top:2px;" <?php if ($goodsData['is_rec'] ==1) { echo "checked"; }?> value="1"/>推荐</label>
                </li>
                <li>
                    <label>是否热卖</label>
                    <label style="width:230px;"><input type="checkbox" name="is_hot" id="" style="position:relative;top:2px;" <?php if ($goodsData['is_hot'] ==1) { echo "checked"; }?> value="1"/>热卖</label>
                </li>
                <!--
                <li>
                    <label>商品重量</label>
                    <input type="text" name="weight" class="dfinput" id="" style="width:100px;"/>
                    重量单位:
                    <select name="weight_unit" style="opacity:1;border:solid 1px #c3ab7d;height:35px;">
                        <option value="1">千克</option>
                        <option value="0.001">克</option>
                    </select>
                </li>
                -->

                <li>
                    <label>警告库存</label>
                    <input type="number" name="warn_number" value="1" class="dfinput" value="<?php echo ($goodsData["warn_number"]); ?>"/>
                </li>
                <li>
                    <label>商品关键字</label>
                    <input type="text" name="key_words" class="dfinput" style="width:500px;" value="<?php echo ($goodsData["key_words"]); ?>" />
                    <i>用于seo优化, 多个用逗号隔开</i>
                </li>
                <li>
                    <label>商品简单描述</label>
                    <textarea name="seo_description" class="textinput" id="" cols="20" rows="5" style="width:328px;height:70px;"><?php echo ($goodsData["seo_description"]); ?></textarea>
                    <i>用于seo优化</i>
                </li>
                <!--
                <li>
                    <label>包装清单描述</label>
                    <input type="text" name="package_list" class="dfinput" style="width:500px;" />
                    <i>显示在商品详情页面</i>
                </li>
                -->
                <!--
                <li>
                    <label>售后保障描述</label>
                    <textarea name="after_sales_support" class="textinput" id="" cols="20" rows="5" style="width:328px;height:70px;"></textarea>
                    <i>显示在商品详情页面</i>
                </li>
                -->
                <li>
                    <label>商家备注</label>
                    <textarea name="seller_note" class="textinput" id="" cols="20" rows="5" style="width:328px;height:70px;"><?php echo ($goodsData["seller_note"]); ?></textarea>
                    <i>仅供商家自己看的信息</i>
                </li>

                <li></li>
            </ul>
        </div>

        <!-- 商品属性 -->
        <div id="tab4" class="tabson">
            <ul class="forminfo">
                <!-- 商品所属类型 -->
                <li>
                    <label>商品类型<b>*</b></label>
                    <div class="vocation">
                        <select class="select1" id="goods_type" name="type_id">
                            <option value="">请选择...</option>
                            <?php foreach ($typeData as $type): ?>
                            <option value="<?php echo ($type["type_id"]); ?>"><?php echo ($type["type_name"]); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </li>
            </ul>
            <ul  class="forminfo"  id="attr_box">

                <!-- 属性模版
                <input type="hidden" name="attr_id_list[]" value="" />
                <li>
                    <label>属性</label>
                    <input type="text" class="dfinput" name="attr_value_list[]" />
                </li>

                <li>
                    <label><a href="javascript:;" onclick="addSpec(this)">[+]</a>属性2</label>
                    <select name="attr_value_list[]" style="opacity:1;border:solid 1px #c3ab7d;height:35px;">
                        <option value="">aaaa</option>
                        <option value="">bbbb</option>
                    </select>
                    &nbsp;&nbsp;属性价格：
                    ￥ <input type="text" name="attr_price_list[]" class="dfinput" id="" style="width:100px;" /> 元
                </li>

                <li>
                    <label>属性3</label>
                    <textarea name="attr_value_list[]" class="textinput" id="" cols="20" rows="5" style="width:328px;height:70px;"></textarea>
                </li>
                属性模版 -->
                <li></li>
            </ul>
        </div>

        <!-- 商品相册-->
        <div id="tab5" class="tabson">
            <ul class="forminfo goods-image">
                <li><a href="javascript:;" onclick="addImage(this)">[+]</a>上传图片 <input type="file" accept="image/*" multiple name="img_url[]" class="fdinput" id="" /></li>
            </ul>

           <!--  <ul class="imglist">

                <li>
                    <span><img src="http://localhost/001.jpg"></span>
                    <p><a href="javascript:;">删除</a></p>
                </li>

            </ul> -->
        </div>
        <div style="margin:0 auto;width:320px">
            <!--<input name="class_id" type="hidden" value="<?php echo cookie('class_id') ?>"/>-->
            <input name="" type="submit" class="btn" value="发布商品"/>
            <input name="" type="reset" class="btn" value="重置"/>
        </div>
    </form>
    </div>
    </div>
    <script type="text/javascript">

        /*选择类型下拉框的时候获取相应的属性列表*/
        $('#goods_type').change(function(){
            //类型id
            var typeId = parseInt(this.value);
            $.ajax({
                type:"POST",
                url:"<?php echo U('getAttrListByTypeId');?>",
                data:{id:typeId},
                success:function(data){
                    $('#attr_box').html(data);
                }
            });
        });


        //点击[+]号 添加多个下拉框
        function addSpec(obj){
            //在当前的li后面克隆一个li,并把加号修改为减号
            var removeSpec = '<li>'+$(obj).parent().parent().clone().html().replace('addSpec(this)">[+]','removeSpec(this)">[-]')+'</li>';
            $(obj).parent().parent().after(removeSpec);
        }

        //点击[-]号 删除下拉框
        function removeSpec(obj){
            //删除当前的tr
            $(obj).parent().parent().remove();
        }


        //添加一个图片上传按钮
        function addImage(obj){
            var image = '<li>'+$(obj).parent().clone(true).html().replace('addImage(this)">[+]','removeImage(this)">[-]')+'</li>';
            $(obj).parent().after(image);
        }

        //删除一个图片上传按钮
        function removeImage(obj){
            $(obj).parent().remove();
        }

        //颜色选择器
        $("#cp3").colorpicker({
            fillcolor:true,
            success:function(o,color){
                $("#goods_title").css("color",color);
                $("#goods_title_style").val(color);
            },
            reset:function(o){
                $("#goods_title").css("color","");
                $("#goods_title_style").val("");
            }
        });

        //tab切换
        $("#usual1 ul").idTabs();

        //表格隔行变色
        $('.tablelist tbody tr:odd').addClass('odd');

        /*日期时间框插件***********************************/
        !function(){
          laydate.skin('dahong');//切换皮肤，请查看skins下面皮肤库
        }();
        var start = {
            elem: '#groupbuy_start_date',
            format: 'YYYY/MM/DD hh:mm:ss',
            min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                 end.min = datas; //开始日选好后，重置结束日的最小日期
                 end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#groupbuy_end_date',
            format: 'YYYY/MM/DD hh:mm:ss',
            min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
        /*日期时间框插件***********************************/


        //防止, 添加失败, 后退回来, 所有更新一下状态
        handlePromote($('#is_groupbuy').attr('checked'));
        //添加促销的时候把添加促销价的输入框的禁用取消掉
        function handlePromote(status){
            if(status){
                var color = '';
            }else{
                var color = '#eee';
            }
            $('#promote').attr('disabled',!status).css('background', color);
            $('#groupbuy_start_date').attr('disabled',!status).css('background', color);
            $('#groupbuy_end_date').attr('disabled',!status).css('background', color);
            $('#groupbuy_max_num').attr('disabled',!status).css('background', color);
            $('#groupbuy_min_num').attr('disabled',!status).css('background', color);
        }
    </script>
</body>
<!--实例化编辑器-->
<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('editor_id',{
        autoHeight:false,
        initialFrameWidth:1000,
        initialFrameHeight:700,
    });
 </script>

</html>