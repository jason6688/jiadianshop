<?php
/*
 *这是立即购买付款成功界面控制器
 *author:史亚运
 *
 */
namespace Home\Controller;
use Think\Controller;
class  PaymentNowController extends Controller {
    public function index (){
        
        $user_id=session(C("USER_ID"));
        
        $order_id=I('get.order_id');
        //判断用是否登录
        if(empty($user_id)){
            $this->redirect('Login/index','',3, '未登录,正在跳转到登录页...');
            exit;
        }
        //判断是否找到订单id
        if(empty($order_id)){
            $this->error("付款失败!");exit;
        }
        //进行付款 用户的余额是否够付款

        $order_info=M('Order')->where(array('order_id'=>$order_id))->select();
        //订单总金额
        $order_total_money=$order_info[0]['order_total_money'];

        $user_info=M('User')->where(array('user_id'=>$user_id))->select();

        $user_money=$user_info[0]['user_money'];
        //判断余额是否够付款
        if($user_money<$order_total_money){

            $this->error("付款失败,余额不足");
            exit;

        }

        //进行付款处理   事务实现付款
        	
        $user=M('User');
        $user->startTrans();
        $new_user_money=$user_money-$order_total_money;
        //用户的积分增加
        $user_score= $user_info[0]['user_score']+$order_total_money;
        $user_status=$user->where(array('user_id'=>$user_id))->save(array('user_money'=>$new_user_money,'user_score'=>$user_score));
		$pay_time=time();
		$order_status=M("Order")->where(array('order_id'=>$order_id))->save(array('order_state'=>1,'pay_time'=>$pay_time));
        //判断两个是否都执行成功
        if($order_status&&$user_status){
            $user->commit();
            //付款成功就显示到页面上
            //把信息写到用户消费表
            $user_payment['user_payment_money']="-".$order_total_money;
            $user_payment['user_payment_why']="在线购买";
            $user_payment['user_payment_time']=time();
            $user_payment['user_id']=$user_id;
            M('UserPayment')->add($user_payment);
            
            //付款成功后相应地从库存中减去已购买商品的数量
            $order_desc_arr = M('Order_desc')->where(array('order_id'=>$order_id))->field("order_desc_id,goods_id")->select();
            	
            foreach ($order_desc_arr as $v){
                $order_desc_id = $v['order_desc_id'];
                $goods_id = $v['goods_id'];
                $buy_num_info = M('Order_desc')->where(array('order_desc_id'=>$order_desc_id))->field("order_desc_num")->find();
                $goods_number_info = M('Goods')->where(array('goods_id'=>$goods_id))->field("goods_number")->find();
                 
                $goods_number = $goods_number_info['goods_number']-$buy_num_info['order_desc_num'];
                 
                //更行商品库存
                $data['goods_number'] = $goods_number;
                $number_change = M('Goods')->where(array('goods_id'=>$goods_id))->save($data);
            }
            	
            
            
            //删除session中保存的order_id信息
            session(C("USER_ORDER_ID"),null);
            //显示信息到前台去
            	
            $this->order_no=$order_info[0]['order_no'];
            $this->order_total_money=$order_info[0]['order_total_money'];
            	


            	
        }else{
            //执行失败就回滚
            $user->rollback();
            $this->error('付款失败');
            exit;
            	
        }
        	
        	



        	
        	
        	
        	

        $this->display();

    }
    
}