<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller{
    public function index(){
        
        
        $this->display('login');
    }
    
    //生成验证码
    public function verifyCode(){
        $config = array(
            'length'=>4,
            'fontSize'=>25,
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
        
    }
    
    //执行用户登录
    public function loginAct(){
        $verify = new \Think\Verify();
        $admin_id = session(C("ADMIN_ID"));
        if (isset($admin_id)){
            $this->redirect('Index/index');
        }elseif (!empty($_POST)){
            $Model = M('Admin');
            $where['admin_name'] = $_POST['admin_name']; 
            $res = $Model->where($where)->find();
            if (empty($res)){
                $this->error('用户名不存在','index');
            }elseif (!$verify->check(I('post.verifycode'))){
                $this->error('验证码错误');
            }else if (md5($_POST['admin_pwd'])==$res['admin_pwd']){
                /* $_SESSION['admin_id'] = $res['admin_id'];
                $_SESSION['admin_name'] = $res['admin_name']; */
                session(C('ADMIN_ID'),$res['admin_id']);
                session(C('ADMIN_NAME'),$res['admin_name']);
                session(C('ADMIN_INFO'),$res);
                //print_r($_SESSION);
                //echo '登录成功！';
                //$this->success('登录成功~',U('Index/index'));
                $this->redirect('Index/index');
                
            }else {
                //echo '登录失败！';
                $this->error('密码错误，请重新登录！','index');
            }
            
            
            
        }
        
    }
    
    public function logout(){
        //session_start();
        //$this->display();
        /* unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']); */
        session(C("ADMIN_ID"),null);
        session(C("ADMIN_NAME"),null);
        session(C("ADMIN_INFO"),null);
        $this->redirect('index');
    }
    
    
    
    
    //测试控制器
    public function test(){
        //$_SESSION = array();
        print_r($_SESSION);
    }
    
}