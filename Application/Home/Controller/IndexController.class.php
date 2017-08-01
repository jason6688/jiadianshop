<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        //print_r($_SESSION);
        
        
        //空调类商品
        $Model = M('Goods');
        
        //热卖商品
        $hot = $Model->where(array('is_hot'=>1))->limit(0,6)->order('goods_id desc')->select();
        $this->assign('hot',$hot);
        
        $data = $Model->where(array('cat_id'=>9,'is_delete'=>0))->select();
        
        $this->assign('kongtiao',$data);
        
        //平板电视类商品
        $data = $Model->where(array('cat_id'=>7,'is_delete'=>0))->select();
        $this->assign('dianshi',$data);
        
        //获取首页焦点图信息
        $focusInfo = M('Advertise')->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->where(array('is_on'=>1,'pos_id'=>2))->order('id desc')->limit(5)->select();
        
        $this->assign('focusInfo',$focusInfo);
        
        //获取首页中部图片轮播焦点图
        $middleFocusInfo = M('Advertise')->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->where(array('is_on'=>1,'pos_id'=>3))->order('id desc')->limit(5)->select();
        
        $this->assign('middleFocusInfo',$middleFocusInfo);
        
        //获取首页右侧猜你喜欢图片信息
        $advInfo = M('Advertise')->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->where(array('is_on'=>1,'pos_id'=>1))->order('id desc')->limit(3)->select();
        
        $this->assign('advInfo',$advInfo);
        
        //获取文章信息
        $articleInfo = M('Article')->where(array('cat_id'=>12))->select();
        
        $this->assign('articleInfo',$articleInfo);
        
        
        
        
        
        
        
        
        
        
        $this->display();
        
    }
}