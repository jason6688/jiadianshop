<?php


namespace Home\Model;
use Think\Model\ViewModel;
class OrderViewModel extends ViewModel {  
         public $viewFields = array( 
        		 'Orde'=>array('order_id','order_no','order_time','user_id','order_total_money','order_state','_table'=>'jd_order'),   
				 'Des'=>array('order_desc_num','_table'=>'jd_order_desc','_on'=>'Des.order_id=Orde.order_id'),  
				 'Goods'=>array('goods_name','goods_id','goods_shop_price','goods_thumb_img','_on'=>'Des.goods_id=Goods.goods_id'),  


		 ); 
				 
				 
		
		
}
















?>