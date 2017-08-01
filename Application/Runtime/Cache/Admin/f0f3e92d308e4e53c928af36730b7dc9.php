<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-添加</title>
<link href="/jiadianshop/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script src="/jiadianshop/Public/Common/js/jquery.js"></script>
<script src="/jiadianshop/Public/Plugin/laydate/laydate.js"></script>
</head>

<body>
    <!-- 当前位置 -->
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">广告管理</a></li>
            <li><a href="#">广告列表</a></li>
            <li><a href="#">添加</a></li>
        </ul>
    </div>

    <form action="<?php echo U('addAct');?>" method="post" enctype="multipart/form-data">
        <div class="formbody">
            <div class="formtitle"><span>基本信息</span></div>
            <ul class="forminfo">

                <!-- 广告类型 -->
                <li><label>广告类型<b>*</b></label>
                    <select name="type" class="dfinput">
                        <option value="">请选择...</option>
                        <!--<option value="1">文字广告</option>-->
                        <option value="2">图片广告</option>
                        <!--<option value="3">视屏广告</option>-->
                    </select>
                </li>

                <!-- 广告位置 -->
                <li><label>广告位置<b>*</b></label>
                    <select name="ad_pos_id" id="" class="dfinput">
                        <option value="">请选择...</option>
                        <!--<option value="0">站外广告</option>-->

                        <?php foreach ($ad_pos_list as $key => $ad_pos): ?>
                        <option value="<?php echo ($ad_pos["pos_id"]); ?>"><?php echo ($ad_pos["name"]); ?>&nbsp;&nbsp;<?php echo ($ad_pos["width"]); ?> X <?php echo ($ad_pos["height"]); ?></option>
                        <?php endforeach ?>
                    </select>
                </li>

                <!-- 广告标题 -->
                <li><label>广告标题</label><input name="title" type="text" class="dfinput" /><i></i></li>

                <!-- 广告图片 -->
                <li><label>广告图片</label><input name="image" type="file" class="dfinput" style="position:relative;top:8px;border:none;background:none;text-indent:0px;" /><i></i></li>

                <!-- 广告url -->
                <li><label>广告url<b>*</b></label><input name="url" value="http://" type="text" class="dfinput" /><i></i></li>

                <!-- 是否开启 -->
                <li><label>是否开启</label>
                    <label><input type="radio" name="is_on" id="" value="1" checked />开启</label>
                    <label><input type="radio" name="is_on" id="" value="0" />关闭</label>
                </li>

                <!-- 广告时间 -->
                <li><label>广告时间<b>*</b></label>
                    <input type="text" placeholder="请输入开始日期" name="start_time" id="start_time" class="laydate-icon" style="height:33px;"/>
                    <input type="text" placeholder="请输入结束日期" name="end_time" id="end_time" class="laydate-icon" style="height:33px;"/>
                </li>

                <!-- 广告联系人 -->
                <li><label>联系人</label>
                    <input type="text" name="linkman" class="dfinput" />
                </li>

                <!-- 广告联系人 -->
                <li><label>联系人邮箱</label>
                    <input type="text" name="linkman_email" class="dfinput" />
                </li>

                <!-- 广告联系人电话 -->
                <li><label>联系人电话</label>
                    <input type="text" name="linkman_tel" class="dfinput" />
                </li>

                <!-- 添加按钮 -->
                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="添加"/></li>
            </ul>
        </div>
    </form>
    <script>

        /*
        选择广告类型时, 切换显示的表单
         */
        $('select[name=type]').change(function(){
            var adType = $(this).val();
            if(adType==1){
                //文字广告
                $('input[name=image]').parent().slideUp().attr('disabled',true);
                $('input[name=title]').parent().slideDown().attr('disabled',false);
            }else if(adType==2 || adType==3){
                //图片广告 或者 视屏广告
                $('input[name=image]').parent().slideDown().attr('disabled',false);
                $('input[name=title]').parent().slideUp().attr('disabled',true);
            }
        });
        $('select[name=type]').change();



        /*日期时间框插件***********************************/
        !function(){
          laydate.skin('dahong');//切换皮肤，请查看skins下面皮肤库
        }();
        var start = {
            elem: '#start_time',
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
            elem: '#end_time',
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

    </script>
</body>
</html>