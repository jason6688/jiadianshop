<?php
/*购物车控制器
 * 史亚运
 * */
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller{
    //购物车显示页
    public function index(){
        //获取购物车中是否有数据
        //var_dump($_SESSION("USER_CAT_INFO"));
        //exit();
        //$cat_info=session("USER_CAT_INFO");
        $cat_info=session(C("USER_CAT_INFO"));
        	
        if(empty($cat_info)){
            //如果为空就跳转到错误的界面
            $this->display('error');
        }else{
            $this->display();
            	
        }
    
        	
         
         
    }
    
	public function cartContent(){
			   //购物车中的数据ajax的形式返回
			   $cart_status=0; //返回的标志  0 失败没有数据 1成功有数据
					//获取session的数据
			   //$cat_info=session(C('USER_CAT_INFO'));
			   $cat_info=session(C("USER_CAT_INFO"));
			   
				   //进行有无数据判断
			   if($cat_info){
				   //如果有数据就处理数据 得到想要的数据
				   
				   //$car_detial_info=array();
				 
				  foreach($cat_info as $info){
					   $goods_id=$info['goods_id'];
					   $goods_price=$info['goods_price'];
					   $goods_num=$info['goods_num'];
					   $order_attr=$info['order_attr'];
					   //到商品表取其他的数据
					   $goods_info=M("Goods")->where(array('goods_id'=>$goods_id))->select();
					  
					   if(empty($goods_info)){
						   //如果取不到数据就执行下一条数据
						   continue;
					   }
					   
					   $market_price=$goods_info[0]['market_price'];
					   $shop_price = $goods_info[0]['shop_price'];
					   $goods_thumb_img=$goods_info[0]['goods_thumb_img'];
					   $goods_name=$goods_info[0]['goods_name'];
					   $total_money=$goods_num*$market_price;
					   $save_money=$goods_num*($market_price-$goods_price);
					  
					   $car_detial_info[]=array('goods_id'=>$goods_id,'order_attr'=>$order_attr,'goods_price'=>$goods_price,'goods_num'=>$goods_num,'market_price'=>$market_price,'goods_thumb_img'=>$goods_thumb_img,'goods_name'=>$goods_name,'total_money'=>$total_money,'save_money'=>$save_money);
					  
					   
				  
				  }
				   
				  
				   //计算总金额和优惠的金额、
				   $car_total_money=0; $car_save_money=0;$car_end_money=0;$str="";
				   foreach($car_detial_info as $ci){
					  $car_total_money+=$ci['total_money'];
					  $car_save_money+=$ci['save_money'];
					  $car_end_money+=($ci['total_money']-$ci['save_money']);
					  $url=U("Product/index",array('g'=>$ci['goods_id']));
					  $str.=<<<EOF
					  <tr class="sc-pro-item">
									<td rowspan="1" class="tr-check">
										<input id="box-1989" class="checkbox" type="checkbox" name="skuIds"  value="<{$ci['goods_id']}>" >
									</td>
									<td class="tr-pro">
										<div class="pro-area clearfix">
											<p class="p-img">
												<a title="{$ci['goods_name']}" target="_blank" href="{$url}" seed="cart-item-name">
													<img src="{$ci['goods_thumb_img']}">
												</a>
											</p>
											<p class="p-name">
												<a title="{$ci['goods_name']}" target="_blank" href="{$url}" seed="cart-item-name">{$ci['goods_name']}</a>
											</p>
											<p class="p-sku"></p><p class="understock-1989 hide"></p>
										</div>
									</td>
									<td>
										<span style="margin-left:100px;">{$ci['order_attr']}</span>
									</td>
									<td class="tr-price">
										<span>{$ci['market_price']}</span>
									</td>
									<td class="tr-quantity" rowspan="1">                
										<div class="sc-stock-area">
											<div class="stock-area">
												<a title="减" class="icon-minus-3 vam"  id="cart_num_dec"  href="javascript:;"  >
													<span>-</span>
												</a>
												<input type="text" autocomplete="off" value="{$ci['goods_num']}" class="shop-quantity textbox vam" id="quantity-1989"  data-skuid="1989" data-type="1" seed="cart-item-num">
												<a title="加" class="icon-plus-3 vam" id="cart_num_inc" href="javascript:void(0)" >
													<span>+</span>
													
												</a>
											</div><p class="normalLimitstock-1989 hide"></p>
										</div>
									</td>
						<td rowspan="1" class="tr-subtotal">
										<b>¥{$ci['total_money']}</b>
									</td>
									<td rowspan="1" class="tr-operate">
										<a href="javascript:void(0);" class="icon-sc-del" title="删除" seed="cart-item-del">删除</a>
									</td>
								</tr>     
EOF;
				   
				   
				   
				   }
				   $cat_status=1;
				   
			   }else{
				   $cat_status=0;
			   }
			   
			 $data["cat_status"]=$cat_status;
			 $data["content"]=array('str'=>$str,'car_total_money'=>$car_total_money,'car_save_money'=>$car_save_money,'car_end_money'=>$car_end_money);	
			
			echo json_encode($data);	
				
		  
		  
		  
	}
    
 	     //更改购物车商品的数目
	  public function changeGoodsNum(){
	      //标志  0失败 1成功
		  $change_status=0;   
		  
	      $goods_id=I("post.goods_id");
		  $num=I('post.goods_num');
		  $cat_info=session(C('USER_CAT_INFO'));
		  if(!empty($cat_info)){
		     $new_cat=array();
		     foreach($cat_info as $info){
			     if($info['goods_id']==$goods_id){
				      $info['goods_num']=$num;
					  $new_cat[] = $info;
				 }else{
				      $new_cat[]=$info;
				 }
			 
			 }
			 
			 session(C('USER_CAT_INFO'),$new_cat);
			 $change_status=1;
		  
		  }else{
		     $change_status=0;
		  }
		  
		  echo $change_status;
	  
	  
	  
	  }
	  
	  
	  //购物车 删除操作
	  
	  public function carDel(){
	     //删除购车中商品的操作
		 $del_status=0; //删除的标志
		 $goods_id=I("post.goods_id");
		 $cat_info=session(C('USER_CAT_INFO'));
		   if(!empty($cat_info)){
		      $new_cat=array();
		      foreach($cat_info as $info){
			     if($info['goods_id']==$goods_id){
				 }else{
				      $new_cat[]=$info;
				 }
			 
			 }
			 
			 session(C('USER_CAT_INFO'),$new_cat);
			 $del_status=1;
		  
		  }else{
		     $del_status=0;
		  }
		  
	      
	      echo $del_status;
	  
	  
	  }
	  
	     //购物车删除所有的操作
	  public function carDelAll(){
	      $goods_ids=I("post.goods_ids");
		  $delAll_status=0;
		 
		  if(!empty($goods_ids)){
		      $goods_ids_arr=explode(",",trim($goods_ids,","));
			 
			  $cat_info=session(C('USER_CAT_INFO'));
			  if(!empty($cat_info)){
			     $new_info=array();
				 foreach($cat_info as $info){
				     if(in_array($info['goods_id'],$goods_ids_arr)){
					 
					 }else{
					     $new_info[]=$info;
					 }
				 }
				 session(C('USER_CAT_INFO'),$new_info);
				 $delAll_status=1;
			  }else{
			     $delAll_status=0;
			  }
		  }else{
		     $delAll_status=0;
		  
		  }
		
	       echo  $delAll_status;
	  
	  
	  }       	  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}