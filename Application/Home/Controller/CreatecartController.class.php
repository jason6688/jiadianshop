<?php
    /*
	 *这是订单创建成功页控制器
	 *author:史亚运
	 *
	 */
namespace Home\Controller;
use Think\Controller;
class CreatecartController extends Controller {
    public function index(){
	     $address_id=cookie('address_id');
		   //获取用户的id号和购车车
		 $user_id=session(C("USER_ID"));
		 $cat_info=session(C("USER_CAT_INFO"));
		   //判断是否有东西在进行提交
		 if(empty($user_id)||empty($cat_info)){
		      $this->redirect('Cart/error');
			   exit;
		 
		 }
		  //如果cookie中地址为空 则表示用默认地址
		 if(empty($address_id)){
		      $address_info=M("Address")->where(array('address_lock'=>1,'user_id'=>$user_id))->select();
			  //如果用户之前没有添加任何收货地址则跳转去添加收货地址
			  if (empty($address_info)){
			      echo "<script>alert('请先添加收货地址');window.history.back();</script>";
			      exit();
			  }
		      $address_id=$address_info[0]['address_id'];
		 }else{
		     
			  $address_info=M("Address")->where(array('address_id'=>$address_id))->select();
		 
		 }
		 
		  //计算总金额和和运费以及向数据库插入
		  $total_goods_money=0;$express_money=0;$total_end_money=0;
		  $total_goods=array();
		  //开始计算
		  foreach($cat_info as $cat){
		       $total_goods_money+=$cat['goods_num']*$cat['goods_price'];
			   $total_goods[]=array('goods_id'=>$cat['goods_id'],'goods_num'=>$cat['goods_num'],'order_attr'=>$cat['order_attr']);
		  }
		  if($total_goods_money<200){
		       $express_money=15;
		  }else{
		       $express_money=0;
		  }
		  
		  
		 $total_end_money=$total_goods_money+$express_money;
		  //随机生成一个13位的订单号
		 $order_no=date("mdis").mt_rand(10000,99999);
		 
		 $data['order_no']=$order_no;
		 $data['order_time']=time();
		 $data['order_money']=$total_goods_money;
		 $data['order_state']=0;
		 $data['order_total_money']= $total_end_money;
		 $data['address_id']=$address_id;
		 $data['user_id']=$user_id;
		 $data['express_id']=1; //默认选择1
		 $data['order_payment_id']=1;
		 
		 $order_id=M("Order")->add($data);
		 if($order_id){
		         //将商品插入商品详细表
		      foreach($total_goods as $order_goods){
			      M("OrderDesc")->add(array('order_desc_num'=>$order_goods['goods_num'],'goods_id'=>$order_goods['goods_id'],'order_id'=>$order_id,'order_attr'=>$order_goods['order_attr']));
			  
			  }
			  //执行成功清除购物车的数据
			 session(C("USER_CAT_INFO"),null);
			 cookie('address_id',null);
			 
			 //控制向前台显示
			 
			 $this->address_info=$address_info[0];
			 $order_info=array('order_no'=>$order_no,'order_money'=>number_format($total_goods_money,2),'order_end_money'=>number_format($total_end_money,2),'order_time'=>$data['order_time']);
			 
			 $this->order_info=$order_info;
			 $this->express_money=number_format($express_money,2);
			 
			 $user_money=M("User")->where(array('user_id'=>$user_id))->field('user_money')->select();
			
		     $this->user_money=$user_money[0]['user_money'];	 
			 //保存订单id到session中
			 session(C("USER_ORDER_ID"),$order_id);
		 
		 }else{
		     $this->error('订单提交失败');
		 }
		 
         
		 $this->address_info=$address_info[0];
		
         $this->display();
    }
}