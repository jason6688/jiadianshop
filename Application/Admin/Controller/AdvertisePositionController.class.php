<?php
/*
 * 广告位置控制器
 * 史亚运
 * */
namespace Admin\Controller;
use Think\Controller;
class AdvertisePositionController extends Controller{
    //广告位置列表
    public function index(){
        $Model = M('Advertise_pos');
        $adpos_list = $Model->select();
        
        $this->assign('adpos_list',$adpos_list);
        $this->display();
    }
    
    //添加广告位
    public function add(){
        
        
        $this->display();
    }
    public function addAct(){
       
        $Model = M('Advertise_pos');
        $name = I("post.name");
        if ($Model->where(array('name'=>$name))->find()){
            echo "<script type='text/javascript'>alert('该位置的广告已经存在了');history.back();</script>";
            exit();
        }
        $Model->create();
        $info = $Model->add();
        if ($info){
            
            $this->success('广告位置插入成功',U('index'));
        }else {
            $this->error('广告位置插入失败');
        }
    }
    //修改广告位
    public function edit(){
        $Model = M('Advertise_pos');
        $pos_id = I("get.pos_id");
        $adpos = $Model->where(array('pos_id'=>$pos_id))->find();
        
        $this->assign('adpos',$adpos);
        $this->display();
    }
    
    public function editAct(){
        if (!empty($_POST)){
            $Model = M('Advertise_pos');
            $Model->create();
            $info = $Model->save();
            if ($info){
                $this->success('修改成功','index');
            }else {
                $this->error('修改失败');
            }
        }
        
    }
    
    //删除广告位
    public function del(){
       $pos_id = I("get.pos_id");
       $Model = M('Advertise_pos');
       $info = $Model->where(array('pos_id'=>$pos_id))->delete();
       if ($info){
           $this->success('删除成功','index');
       }else{
           $this->error('删除失败');
       }
       
        
    }
    
    
    
    
}