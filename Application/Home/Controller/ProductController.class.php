<?php
/*
 * 商品详情页控制器
 * 史亚运
 * 2016.5
 * */
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller{
    public function index(){
        $goods_id = I('get.g');
        $Model = M('Goods');
        
        $goods_info = $Model->join('jd_brands ON jd_goods.cat_id=jd_brands.cat_id')->join('jd_goods_cat ON jd_goods.cat_id=jd_goods_cat.cat_id')->where(array('goods_id'=>$goods_id))->select();
        //print_r($goods_info[0]);
        
        if (!$goods_info){
            $this->error("该商品不存在或已下架");
            exit();
        }
        
        $this->assign('goods_info',$goods_info[0]);
        //获取销售属性内容
        $sale_attr = $goods_info[0]['sale_attr'];
        if (!empty($sale_attr)){
            $sale_attr_arr = explode('|', $sale_attr);
            $sale_attr_name = $sale_attr_arr[0];
            $sale_attr_value = $sale_attr_arr[1];
            $sale_attr_value_arr = explode(',', $sale_attr_value);
            
            
            $this->assign('sale_attr_name',$sale_attr_name);
            $this->assign('sale_attr_value_arr',$sale_attr_value_arr);
        }
        
        
        //判断商品是否下架
        $goods_state=$goods_info[0]['is_putaway'];
        //商品是否下架标志
        if($goods_state==0){
            $goods_state_login=0;
             
        }else{
            $goods_state_login=1;
        }
        	
        $this->assign('goods_state',$goods_state);
        $this->assign('goods_state_login',$goods_state_login);
        
        
        //得到商品的平均得得分和评论总数
        $goods_avg_scrore=M('Comment')->where(array('goods_id'=>$goods_id))->avg('comment_score');
        $goods_comment_count=M('Comment')->where(array('goods_id'=>$goods_id))->count();
        $this->goods_avg_scrore=$goods_avg_scrore?($goods_avg_scrore/5)*100:100;
        $this->goods_comment_count=$goods_comment_count?$goods_comment_count:0;
        
        //获取商品评论总数
        $comment_count=M("Comment")->where(array("goods_id"=>$goods_id))->count("comment_id");
        $this->comment_count=$comment_count?$comment_count:0;
        
        //获取评价信息
        
        //好评 4-5
        $where['goods_id']=$goods_id;
        $where['comment_score']=array('in','4,5');
        $good_comment_count=M("Comment")->where($where)->count("comment_id");
        $this->good_comment_count=$good_comment_count?$good_comment_count:0;
        
        //获取商品的好评度
        if($comment_count==0){
            $this->good_status=100;
        }else{
            $this->good_status=(int)($good_comment_count/$comment_count*100);
            	
        }
        
        //中评 2,3
        $where['goods_id']=$goods_id;
        $where['comment_score']=array('in','2,3');
        $middle_comment_count=M("comment")->where($where)->count("comment_id");
        $this->middle_comment_count=$middle_comment_count?$middle_comment_count:0;
        
        //获取商品的好评度
        if($comment_count==0){
            $this->middle_status=0;
        }else{
            $this->middle_status=(int)($middle_comment_count/$comment_count*100);
            	
        }
        
        //差评 0,1
        $where['goods_id']=$goods_id;
        $where['comment_score']=array('in','0,1');
        $bad_comment_count=M("comment")->where($where)->count("comment_id");
        $this->bad_comment_count=$bad_comment_count?$bad_comment_count:0;
        if($comment_count==0){
            $this->bad_status=0;
        }else{
            $this->bad_status=(int)($bad_comment_count/$comment_count*100);
            	
        }
        
        //获取商品规格参数
        $where['goods_id']=$goods_id;
        $attr_info=M('Goods')->field("attr_id_list,attr_value_list")->where($where)->find();
        //print_r($attr_info);
        //echo '<hr>';
        $attr_id_list = $attr_info['attr_id_list'];
        $attr_value_list = $attr_info['attr_value_list'];
        
        $attr_id_arr = explode(',', $attr_id_list);
        
        $attr_value_arr = explode(',', $attr_value_list);//数组形式的参数属性值
        
        foreach ($attr_id_arr as $k=>$v){
            $attr_name = M('Goods_attribute')->field("attr_name")->where(array('attr_id'=>$v))->find();
            //print_r($attr_name);
            //echo '<br/>';
            $arr = '';
            $arr.=$attr_name['attr_name'];
            $arr.='：';
            $arr.=$attr_value_arr[$k];
            $attr_arr[] = $arr;
        }
        
        
        
        //print_r($attr_arr);
        //echo '<hr>';
        
        $this->assign('attr_arr',$attr_arr);//参数属性
        
        
        
        $this->display();
    }
    
    public function add(){
        //获取商品的ID好数量并保存到SESSION中
        $num = I("post.num");
        $goods_id = I("post.goods_id");
        $order_attr = I('post.order_attr');
        //$goods_id = 3;
        //$num = 2;
        //print_r($_POST);
        //print_r($_SESSION);
        //echo "<script>".$_POST."</script>";
        
        
        if ((empty($num))||empty($goods_id)){
            $status = 0;
            //echo json_encode('Ajax 执行成功');
        }else {
            $goods_info = M('Goods')->where(array('goods_id'=>$goods_id))->select();
            //print_r($goods_info);
            if ($goods_info){
                
                $goods_price = $goods_info[0]['shop_price'];
                
                $data['goods_id'] = $goods_id;
                $data['goods_price'] = $goods_price;
                $data['goods_num'] = $num;
                $data['order_attr'] = $order_attr;
                
                $session_data = session(C('USER_CAT_INFO'));
                if (!empty($session_data)){
                    foreach ($session_data as $info){
                        if ($info['goods_id']==$goods_id){
                            //session已经存在该商品信息，只更改数量
                            $data['goods_num'] = $data['goods_num']+$info['goods_num'];
                            
                        }else {
                            //session不存在该商品信息，将此商品信息保存到session中
                            $new_session[] = $info;
                        }
                    }
                }
                
                $new_session[] = $data;
                //echo '<hr>';
                //print_r($new_session);
                //重新保存session
                session(C('USER_CAT_INFO'),$new_session);
                //print_r($_SESSION['USER_CAT_INFO']);
                $status = 1;
                //计算商品的总数目和总价格
                $totals = 0;
                $total_price = 0;
                foreach ($new_session as $new){
                    $totals+=$new['goods_num'];
                    $total_price+=$new['goods_price']*$new['goods_num'];
                }
                $goods_total = array('nums'=>$totals,'price'=>$total_price);
                
                //print_r($goods_total);
            }else {
                $status = 0;
            } 
            
            /* $status = 1;
            $goods_total = 20000; */
            
        }
        
        
        //将数据发送到前台
        $send['status'] = $status;
        //$send['status'] = 1;
        $send['content'] = $goods_total;
        
        $data = json_encode($send);
        echo $data;
    }
    
    //ajax实现加入购物车后台代码
    public function adds(){
        $num = I("post.num");
        $goods_id = I("post.goods_id");
        $data['num'] = $num;
        $data['content'] = $goods_id;
        $data['status'] = 1;
        echo json_encode($data);
        
        //echo '<hr>';
        //print_r(session('USER_CAT_INFO'));
    }
    
    
    public function ajaxTest(){
        $data[abc] = 11; 
        //print_r($data) ;
        echo json_encode('Ajax 执行成功');
    }
    
    //用户评论
public function userComment(){
		   $goods_id=I("get.g")?I("get.g"):'';
		    //如果没有收到商品id
		   
		   //获取评论总数
		      $comment_num=I("get.type");
		      
		     // 实例化comment对象
		    $comment = M('Comment'); 
		    $list_comments=$comment->field("comment_content,comment_score,comment_time,user_name")->join("LEFT JOIN __USER__ ON __COMMENT__.user_id=__USER__.user_id")->where("goods_id=".$goods_id)->limit($comment_num,5)->select();
			   
			     //返回每条评价的内容 一下为格式
			      $data="";
				 foreach($list_comments as $list){
				     if($list['comment_score']>3){
					     $comment_say="好评";
					 }else if($list['comment_score']>1){
					     $comment_say="中评";
					 
					 }else{
					    $comment_say="差评";
					 }
					 
					 $date=date("Y-m-d H:i:s",$list['comment_time']);
					 $score_line=(int)($list['comment_score']/5*100);
              $str=<<<EOF
	          <div class="pro-comment-item clearfix comment_content">
				     <!----------左边--------------------->
					 <div class="pro-comment-user">
					   <p class="pro-comment-user-img">
						  <br/>
					   </p>
					   <p class="pro-comment-user-name">{$list['user_name']}</p>
					   <s class="pro-comment-user-tag">
						 
					   </s>
					  </div>
					  <!----------左边--------------------->
					  <!----------右边--------------------->
					  <div class="pro-user-comment-main">
					     <div class="pro-user-comment">
						   <div class="h clearfix">
						     <div class="pro-user-comment-score">
							   <span class="pro-star">
							      <span class="starRating-area">
								      <s style="width:{$score_line}%"></s>
								  </span>
							   </span>
							   <em><b>{$list['comment_score']}&nbsp;分</b>&nbsp;&nbsp;{$comment_say}</em>
							  </div>
							  <div class="pro-user-comment-impress">
							    <ul><li></li></ul>
							  </div>
							  <div class="pro-user-comment-time">
							   {$date}</div>
						   </div>
						   <div class="b"> 
						      {$list['comment_content']}
						   </div>
						</div>
						<div class="arrow"></div>
					  </div>
					 <!----------右边--------------------->
				 </div>     
			 
	  
EOF;
				   
				 $data.=$str;
				 
	            }
			  
			    echo $data;
	}
    
    
    
    
    
    
}