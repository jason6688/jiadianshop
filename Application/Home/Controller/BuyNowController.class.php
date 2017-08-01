<?php
namespace Home\Controller;
use Think\Controller;
class BuyNowController extends Controller{
    //立即购买
    public function index(){
        
        //判断用户是否登录
        $user_id=session(C("USER_ID"));
        //如果用户没有登录就跳到登录页
        if(empty($user_id)){
            $this->redirect('Login/index');
            exit;
        }
        
        //print_r($_GET);
        //echo "<hr>";
        //获取商品的id和数目
        $num=I('get.num');
        $goods_id=I("get.goods_id");
		$order_attr=I("get.order_attr");

        
        //exit();
        
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
        
            //通过商品号去查询要的字段
            
            $goods_info=M('Goods')->where(array('goods_id'=>$goods_id))->select();
            //获取要信息
            $data['goods_name']=$goods_info[0]['goods_name'];
			$data['order_attr']=$order_attr;
            $data['goods_thumb_img']=$goods_info[0]['goods_thumb_img']; 
            $data['market_price']=$goods_info[0]['market_price'];
            $data['goods_num']=$num;
            $data['goods_total_money']=$num*$goods_info[0]['market_price'];
        
            $total_money=$data['goods_total_money'];
            	
            if($goods_info[0]['shop_price']>0){
                // echo "<script>alert($goods_id);</script>";
                $total_save_money=$num*($goods_info[0]['market_price']-$goods_info[0]['shop_price']);
        
            }
            $send_car[]=$data;
             
        
         
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
        $this->goods_id = $goods_id;
        $this->num=$num;
		$this->order_attr=$order_attr;
        	
        
        $this->display();
    
    
    }
    
    //将订单数据插入数据库
    public function insert(){
        $user_id=session(C("USER_ID"));
        //如果用户没有登录就跳到登录页
        if(empty($user_id)){
            $this->redirect('Login/index');
            exit;
        }
        
        $goods_id = I('get.goods_id');
        $num = I('get.num');//购买商品数量
		$order_attr = I('get.order_attr');
        $address_id=cookie('address_id');
        
        if (!empty($goods_id)){
            $goods_info = M('Goods')->where(array('goods_id'=>$goods_id))->find();
        }
        //获取用户的id号和购车车
        $user_id=session(C("USER_ID"));
        
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
        
            $total_goods_money=$num*$goods_info['shop_price'];
            $total_goods[]=array('goods_id'=>$goods_id,'goods_num'=>$num,'order_attr'=>$order_attr);
        
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
                M("OrderDesc")->add(array('order_desc_num'=>$num,'goods_id'=>$goods_id,'order_id'=>$order_id,'order_attr'=>$order_attr));
                	
            }
            //清空收获地址id
            cookie('address_id',null);
        
            //控制向前台显示
        
            $this->address_info=$address_info[0];
            $order_info=array('order_no'=>$order_no,'order_money'=>number_format($total_goods_money,2),'order_end_money'=>number_format($total_end_money,2),'order_time'=>$data['order_time']);
        
            $this->order_info=$order_info;
            $this->express_money=number_format($express_money,2);
        
            $user_money=M("User")->where(array('user_id'=>$user_id))->field('user_money')->select();
            	
            $this->user_money=$user_money[0]['user_money'];
            //保存订单id到session中
            //session(C("USER_ORDER_ID"),$order_id);
            	
        }else{
            $this->error('订单提交失败');
        }
        	
         
        $this->address_info=$address_info[0];
        $this->assign('order_id',$order_id);
        
        $this->display();
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}