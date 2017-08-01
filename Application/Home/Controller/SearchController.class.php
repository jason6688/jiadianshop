<?php
    /*
	 *这是商品搜索的控制器 keywords 搜索关键字  get方式传递
	 *author:史亚运
	 *
	 */
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function index(){
	      //获取keyword进行判断
		  
		  $keywords=I("get.keywords");
		  $this->keywords=$keywords;
		  //对关键字判断如果为空
		  if(empty($keywords)){
		      
			   $this->display("error");
		       exit;
		  }
		  
		  //去商品表匹配商品
		  $search='%'.$keywords.'%';
		  $search_info=M('Goods')->where(array('goods_name'=>array('like',$search)))->select();
		  //如果在没有此商品
		  if(empty($search_info)){
		     
			  $this->display("error");
		       exit;
		  
		  }
		  
		   //找到了商品对商品进行处理
		     // 查询满足要求的总记录数
		   $goods_count=M("Goods")->where(array('goods_name'=>array('like',$search)))->Count('goods_id');
		  
		   $this->goods_count= $goods_count;
	       //对数据进行分页处理
           $Goods = M('Goods'); // 实例化User对象
		   $Page = new \Think\Page($goods_count,16);// 实例化分页类 传入总记录数和每页显示的记录数(16)
		   $show = $Page->show();// 分页显示输出// 进行分页数据查询 
		   //$this->assign('Page',$Page);
		   //接受order 进行排序处理
		   $order=I("get.order");
		   if($order=='add_time'){
		       $order="add_time"; //按上市时间进行排序处理
		   }else if($order=='market_price'){
		       $order="market_price";//按价格进行处理
		   
		   }else{
		       $order="goods_id";//按id排序
		   }
		   $list = $Goods->field('goods_id,goods_name,key_words,market_price,goods_thumb_img')->where(array('goods_name'=>array('like',$search)))->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		  
		   
		   $this->list_goods=$list;// 赋值数据集
		   $this->list_show=$show;// 赋值分页输出
		   
		
		
          $this->display(); 
    }
	
	
}