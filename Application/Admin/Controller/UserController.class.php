<?php
/*
 * 会员管理控制器
 * 史亚运
 * */
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
    public function index(){
        $Model = M('User');
        
		//分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=10);
        $this->assign('page',$page['page']);// 赋值分页输出

        $user_list = $Model->limit($page['limit'])->select();
        $this->assign('user_list',$user_list);
        $this->display();
    }
    
    //增加用户
    public function add(){
        
        $this->display();
    }
    
    public function addAct(){
        $Model = M('User');
        $user_name = I("post.user_name");
        if ($Model->where(array('user_name'=>$user_name))->find()){
            echo "<script type='text/javascript'>alert('该用户已存在，请换个用户名注册！');history.back();</script>";
            exit();
        }
        $_POST['user_pwd'] = md5($_POST['user_pwd']);
        $data = $Model->create();
        $info = $Model->add();
        if ($info){
            $this->success('用户添加完成',U('index'));
        }else {
            $this->error('用户添加失败');
        }
    }
    //修改用户信息
    public function edit(){
        $Model = M('User');
        $user_id = I('get.user_id');
        $user = $Model->where(array('user_id'=>$user_id))->find();
        //print_r($user);
        $this->assign('user',$user);
        $this->display();
    }
    
    public function editAct(){
        $Model = M('User');
        if (!empty($_POST['user_pwd'])){
            $_POST['user_pwd'] = md5($_POST['user_pwd']);
            
        }
        //print_r($_POST);
        //exit();
        $_POST = array_filter($_POST);
        $Model->create();
        $info = $Model->save();
        if ($info){
            $this->success('修改成功',U('index'));
        }else {
            $this->error('修改失败');
        }
    }
    
    //锁定用户
    public function lock(){
        $Model = M('User');
        $user_id = I('get.user_id');
        $data['user_lock'] = 1;
        $info = $Model->where(array("user_id"=>$user_id))->save($data);
        if ($info){
            $this->success('用户锁定成功',U('index'));
            //echo "<script type='text/javascript'>alert('用户已锁定！');</script>";
            //$this->redirect('index');
            
        }else {
            $this->error('用户锁定失败');
            //echo "<script type='text/javascript'>alert('用户锁定失败！');history.back();location.reload();</script>";
        }
    }
    
    //给已锁定的用户解锁
    public function unLock(){
        $Model = M('User');
        $user_id = I('get.user_id');
        /* echo $user_id;
        exit(); */
        $data['user_lock'] = 2;
        $info = $Model->where(array("user_id"=>$user_id))->save($data);
        if ($info){
            $this->success('用户解锁成功',U('index'));
        }else {
            $this->error('用户解锁失败');
        }
    }
    
    //删除用户
    public function del(){
        $Model = M('User');
        $user_id = I('get.user_id');
        //echo "<script type='text/javascript'>confirm('确定要删除该用户吗？');history.back();return;</script>";
        
        
        $info = $Model->where(array("user_id"=>$user_id))->delete();
        if ($info){
            $this->success('删除成功',U('index'));
        }else {
            $this->error('删除失败');
        }
        
    }
    
    
    
    
    
    
}