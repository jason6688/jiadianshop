<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller{
    //订单列表
    public function index(){
        $Model = M('Order');
        //$order_list = $Model->join("jd_order_desc ON jd_order.order_id=jd_order_desc.order_id")->join("jd_address ON jd_order.address_id=jd_address.address_id")->select();
        
		$total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=11);
        $this->assign('page',$page['page']);// 赋值分页输出

		$order_list = $Model->join("jd_address ON jd_order.address_id=jd_address.address_id")->limit($page['limit'])->select();
        
        //print_r($order_list);
        
        
        
        $this->assign('order_list',$order_list);
        $this->display();
    }
    
    //订单详情
    public function info(){
        $order_id = I('get.order_id');
        $Model = M('Order');
        $info = $Model->join("jd_order_desc ON jd_order.order_id=jd_order_desc.order_id")->join("jd_address ON jd_order.address_id=jd_address.address_id")->where(array('jd_order.order_id'=>$order_id))->find();
        //print_r($info);
        
        $order_payment_id = $info['order_payment_id'];
        $order_payment = M('Order_payment')->where(array('order_payment_id'=>$order_payment_id))->find();
        
        $order_desc_info = M('Order_desc')->where(array('order_id'=>$order_id))->select();
        //print_r($order_desc_info);
        //echo "<br>";
        //exit();
        foreach ($order_desc_info as $v){
            $goods_id['goods_id'] = $v['goods_id'];
            $order_desc_num['order_desc_num'] = $v['order_desc_num'];
			$order_attr['order_attr'] = $v['order_attr'];
            $good_info = M('Goods')->where($goods_id)->find();
            
            $order_goods_info[] = array_merge(array_merge($good_info,$order_desc_num),$order_attr);
           
        }
        
        //print_r($order_goods_info);
        
        //exit();
        
        $this->assign('info',$info);
        $this->assign('order_payment',$order_payment);
        $this->assign('order_goods_info',$order_goods_info);
        $this->display();
    }
    
    //订单查询 
    public function search(){
        $Model = M('Order');
        $where = array_filter($_POST);

		

        if (!empty($where)){
            
			

            $order_list = $Model->join("jd_address ON jd_order.address_id=jd_address.address_id")->where($where)->select();
            
        }
        
        
        $this->assign('order_list',$order_list);
        $this->display();
    }
    
    //已发货订单列表
    public function deliver_list(){
        $Model = M('Order');

		//分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=11);
        $this->assign('page',$page['page']);// 赋值分页输出
        $where['order_state'] = array("in","2,3,4");
        $order_list = $Model->join("jd_address ON jd_order.address_id=jd_address.address_id")->where($where)->limit($page['limit'])->select();
        
        
        $this->assign('order_list',$order_list);
        
        $this->display('deliverList');
    }
    
    //换货订单列表
    public function exchange_goods(){
        $Model = M('Order');
        //$order_list = $Model->join("jd_order_desc ON jd_order.order_id=jd_order_desc.order_id")->join("jd_address ON jd_order.address_id=jd_address.address_id")->select();
		//分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=11);
        $this->assign('page',$page['page']);// 赋值分页输出

        $order_list = $Model->join("jd_address ON jd_order.address_id=jd_address.address_id")->where(array('order_state'=>5))->limit($page['limit'])->select();
       
        $this->assign('order_list',$order_list);
        
        $this->display('index');
    }
    
    //退货订单列表
    public function sales_return(){
        $Model = M('Order');
        //$order_list = $Model->join("jd_order_desc ON jd_order.order_id=jd_order_desc.order_id")->join("jd_address ON jd_order.address_id=jd_address.address_id")->select();
        $order_list = $Model->join("jd_address ON jd_order.address_id=jd_address.address_id")->where(array('order_state'=>6))->select();
        
        //print_r($order_list);
        
        
        
        $this->assign('order_list',$order_list);
        
        $this->display('index');
    }
    
    //执行发货操作
    public function deliverAct(){
        $Model = M('Order');
        //print_r($_POST);
        //exit();
        $order_id = $_POST['order_id'];
        $_POST['order_state'] = 2;
        $express_time = $Model->where(array('order_id'=>$order_id))->field("express_time")->find();
        if (empty($express_time['express_time'])){
            $_POST['express_time'] = time();
        }
        array_filter($_POST);
        $Model->create();
        $info = $Model->save();
        if ($info){
            if (empty($express_time['express_time'])){
                $this->success('发货已完成',U('index'));
            }else {
                $this->success('运单修改完成',U('index'));
            }
        }else {
            if (empty($express_time['express_time'])){
                $this->error('发货失败，请检测运单号是否合法！');
                
            }else{
                $this->error('运单修改失败，请检测运单号是否合法！');
            }
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}