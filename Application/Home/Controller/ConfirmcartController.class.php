<?php
    /*
	 *这是确认订单页控制器
	 *author:史亚运
	 *
	 */
namespace Home\Controller;
use Think\Controller;
class ConfirmcartController extends Controller {
    public function index(){
	     //判断用户是否登录
		 $user_id=session(C("USER_ID"));
		    //如果用户没有登录就跳到登录页
		 if(empty($user_id)){
		    $this->redirect('Login/index');
			exit;
		 }
		 //获取用户的购物车中是否有数据
		 $cat_info=session(C("USER_CAT_INFO"));
		
		 if(empty($cat_info)){
		     $this->redirect('Cart/error');
		 
		 }
		 //获取用户的地址分配到前台 
		 //获取用户的默认地址
		 $default_address=M("Address")->where(array('user_id'=>$user_id,'address_lock'=>1))->select();
		 $this->default_address=$default_address[0];
		 
		 //遍历其他的非默认地址
		  $auto_address=M("Address")->where(array('user_id'=>$user_id,'address_lock'=>0))->select();
		  $this->auto_address=$auto_address;
		  
		  //遍历购物车中的商品 计算总金额 优惠金额  运费  最终要付的款项
		   $total_money=0;   $total_sale_money=0;
		   $express_money=0; $end_money=0;
		   $send_car=array();//输出的数组 
		   foreach($cat_info as $car){
		         //获取商品号去查询要的字段
				 $goods_id=$car['goods_id'];
				 $order_attr=$car['order_attr'];//销售属性
				 $goods_info=M('Goods')->where(array('goods_id'=>$goods_id))->select();
				 //获取要信息
				 $data['goods_name']=$goods_info[0]['goods_name'];
				 $data['order_attr']=$order_attr;
				 $data['market_price']=$goods_info[0]['market_price'];
				 $data['goods_thumb_img']=$goods_info[0]['goods_thumb_img'];
				 $data['goods_num']=$car['goods_num'];
				 $data['goods_total_money']=$car['goods_num']*$goods_info[0]['market_price'];
				
				 $total_money+=$data['goods_total_money'];
				 
				 if($goods_info[0]['shop_price']>0){
					// echo "<script>alert($goods_id);</script>";
				     $total_save_money+=$car['goods_num']*($goods_info[0]['market_price']-$goods_info[0]['shop_price']);
					 
				 }
				 $send_car[]=$data;
		   
		   }
		   
		     //计算是否免运费
		   if($total_money>=200){
		        $express_money=0.00;
		   
		   }else{
		        $express_money=15.00;
		   }
		   //计算最后需要的钱数 总金额+运费-优惠金额
		   
		    $end_money=$total_money+$express_money-$total_save_money;
		   
		    //分配到前台显示
			$this->new_car= $send_car;
			 //分配商品总金额到前台
			 $this->total_money=number_format($total_money,2);
			  //分配优惠金额
			 $this->total_save_money=number_format($total_save_money,2);
			  //分配运费金额到前台
			 $this->express_money=number_format($express_money,2);
			 //分配最后的money到前台
			 $this->end_money=number_format($end_money,2);
		 
		 
	
         $this->display();
    }
}   