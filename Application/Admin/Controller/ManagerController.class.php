<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller{
    public function index(){
        $map = array();
        if(isset($_GET['user_name'])){
            $map['admin_name'] = array('like', '%'.I('get.admin_name').'%');
        }
        if(isset($_GET['linkman'])){
            $map['linkman'] = array('like', '%'.I('get.linkman').'%');
        }
        $total = M('Admin')->where($map)->count();
        $page  = getPage($total,10);
        $data  = M('Admin')->where($map)->limit($page['limit'])->select();
        $this->assign('page', $page['page']);
        $this->assign('manager_list', $data);
        
        $this->display();
    }
    
    //添加管理员
    public function add(){
        
        $this->display();
    }
    
    //执行添加管理员
    public function insert(){
        if(!IS_POST) $this->redirect('index');
        $Model = M('Admin');
        $_POST['admin_pwd'] = md5(I('post.admin_pwd'));
        if($data = $Model->create(I('post.',1))){
            if($Model->add()){
                $this->success('添加成功',U('index'));
                die;
            }
        }
        $this->error($Model->getError());
        
    }
    //显示修改管理员的页面
    public function edit($id){
        $id = intval($id);
        //print_r($_SESSION);
        //exit();
        if(!$id) $this->redirect('index');
        //if($_SESSION['admin_user']['admin_id']!=1 && $id!=1) $this->error('没有权限修改超级管理员信息');
        $user = M('Admin')->find($id);
        $this->assign('user', $user);
        
        $this->display();
    }

    public function update($admin_id){
        $Model = M('Admin');
        //print_r($_POST);
        //exit();
        $user_id = intval($user_id);
        if(!$admin_id) $this->redirect('index');
        //if($_SESSION['admin_user']['admin_id']!=1 && $id!=1) $this->error('没有权限修改超级管理员信息');
        if($Model->create(I('post.'),2)){
            if($Model->save() !== false){
                $this->success('修改成功',U('index'));
                die;
            }
        }
        $this->error($Model->getError());
    }
    
    public function delete($id){
        $id = intval($id);
        if(!$id) $this->redirect('index');
        if($id==1) $this->error('不能删除超级管理员');
        $Model = M('Admin');
        if($Model->delete($id)){
            $this->success('删除成功',U('index'));
            die;
        }
        $this->error($Model->getError());
        
    }
    
    //权限分配
    public function dispath($id){
        
        $id = intval($id);
        if(!$id) $this->redirect('index');
        if($id==1) $this->error('超级管理员没有权限限制');
        $data = M('Admin')->where(array('admin_id'=>$id))->getField('permission');
        
        $this->assign('pri_list', array_filter(explode(',', $data)));
        $this->assign('id',$id);
        
        $this->display();
    }
    
    //执行权限分配
    public function dodispath(){
        $id = I('post.id');
        
        $pri_list = I('post.pri');
        $pri_str = join(',',$pri_list);
        if(M('Admin')->where(array('admin_id'=>$id))->setField('permission', $pri_str)){
            $this->success('修改成功','index');
            die;
        }
        $this->error('修改失败','index');
    
    }
    
    //切换 是否启动账号
    public function toggle($id){
        $id = intval($id);
        if(!$id) $this->redirect('index');
    
        //不切换超级管理员的状态
        if($id==1) die('-1');
    
        if(M('Admin')->where(array('admin_id'=>$id))->setField('is_lock',array('exp','is_lock^1'))){
            echo 1;
        }else{
            echo -1;
        }
        die;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}