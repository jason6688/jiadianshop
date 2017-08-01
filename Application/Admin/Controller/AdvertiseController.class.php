<?php
/*
 * 广告控制器
 * 史亚运
 * */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class AdvertiseController extends Controller{
    //显示广告列表
    public function index(){
        $Model = M('Advertise');
        $pos_id = I('get.pos_id');
        if (!empty($pos_id)){
            
            $ad_list = $Model->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->where(array('ad_pos_id'=>$pos_id))->select();
            
        }else {
            $ad_list = $Model->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->select();
            
        }
        $ad_list = $Model->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->select();
        
        $this->assign('ad_list',$ad_list);
        $this->display();
    }
    
    //添加广告
    public function add(){
        $Model = M('Advertise_pos');
        
        $ad_pos_list = $Model->select();
        $this->assign('ad_pos_list',$ad_pos_list);
        $this->display();
    }
    
    public function addAct(){
        //print_r($_FILES);
        if (!empty($_FILES['image']['name'])){
            $upload = new \Think\Upload();
            $upload->exts = array('jpg','gif','png','jpeg');
            $upload->rootPath = './Public/Uploads/Advertise/';
            $info   =   $upload->uploadOne($_FILES['image']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                //echo $info['savepath'].$info['savename'];
                //print_r($info);
                $image = __ROOT__.'/Public/Uploads/Advertise/'.$info['savepath'].$info['savename'];
                $_POST['image'] = $image;
            }
        }
        
        //print_r($_POST);
        //echo '<hr>';
        $_POST['start_time'] = strtotime(I('post.start_time'));
        $_POST['end_time'] = strtotime(I('post.end_time'));
        $_POST = array_filter($_POST);//过虑掉空值数组
        //print_r($_POST);
        //exit();
        $Model = M('Advertise');
        $Model->create();
        $info = $Model->add();
        if ($info){
            $this->success('广告添加成功','index');
        }else {
            $this->error('广告添加失败');
        }
    }
    //修改广告
    public function edit(){
        $Model = M('Advertise');
        $ad = $Model->join('jd_advertise_pos ON jd_advertise.ad_pos_id=jd_advertise_pos.pos_id')->where(array('id'=>I('get.id')))->find();
        
        $Model = M('Advertise_pos');
        $ad_pos_list = $Model->select();
        
        $this->assign('ad_pos_list',$ad_pos_list);
        $this->assign('ad',$ad);
        
        $this->display();
    }
    
    public function editAct(){
        $Model = M('Advertise');
        if (!empty($_FILES['image']['name'])){
            $upload = new \Think\Upload();
            $upload->exts = array('jpg','gif','png','jpeg');
            $upload->rootPath = './Public/Uploads/Advertise/';
            $info   =   $upload->uploadOne($_FILES['image']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                //echo $info['savepath'].$info['savename'];
                //print_r($info);
                $image = __ROOT__.'/Public/Uploads/Advertise/'.$info['savepath'].$info['savename'];
                $_POST['image'] = $image;
            }
            
        }
        
        $_POST['start_time'] = strtotime(I('post.start_time'));
        $_POST['end_time'] = strtotime(I('post.end_time'));
        $_POST = array_filter($_POST);//过虑掉空值数组
        //print_r($_POST);
        //exit();
        
        $Model->create();
        $info = $Model->save();
        if ($info){
            $this->success('修改成功','index');
        }else {
            $this->error('修改失败');
            //echo $Model->getLastSql();
            //exit();
        }
        
    }
    
    //删除广告
    public function del(){
        $Model = M('Advertise');
        
        $id = I('get.id');
        $info = $Model->where(array('id'=>$id))->delete();
        if ($info){
            $this->success('删除成功','index');
        }else {
            $this->error('删除失败');
        }
        
    }
    
    
    
    
    
    
    
    
    
    
}