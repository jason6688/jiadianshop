<?php
/*用户注册控制器
 * 史亚运
 * **/
namespace Home\Controller;
use Think\Controller;
class SignController extends Controller{
    public function index(){
        
        $this->display();    
    }
    
    //验证名字 
    public function checkName(){
        $name = I("post.name");
        //对名字进行验证$userStatus 0表示不可用 ，1表示名字已存在，2表示可用
        $userStatus = 0;
        if (empty($name)){
            $userStatus = 0;   
        }else {
            $user_info = M('User')->where(array('user_name'=>$name))->select();
            //print_r($user_info);
            if ($user_info){
                $userStatus = 1;
            }else {
                $userStatus = 2;
            }
        }
        
        echo $userStatus;
        
    }
    //执行注册
    public function loginDo(){
        //注册成功标志 ：1表示成功，0表示失败
        $login_status = 0;
        $name = I("post.name");
        $pwd = I("post.pwd","","md5");
        $user_email = I("post.user_email");
        //判断用户是否已注册
        $id = M('User')->where(array('user_name'=>$name))->select();
        if ($id){
            $login_status = 0;
            echo $login_status;
            exit();
        }
        
        if (empty($name)||empty($pwd)){
            $login_status = 0;
            
        }else {
            //将符合要求的数据插入数据库
            $data['user_login_time'] = time();
            $data['user_last_ip'] = ip2long(I('server.REMOTE_ADDR'));
            $data['user_last_time'] = time();
            $data['user_score'] = 0;
            //$data['user_money'] = 0;
            $data['user_name'] = $name;
            $data['user_pwd'] = $pwd;
            $data['user_email'] = $user_email;
            
            $user_id = M('User')->add($data);
            if ($user_id){
                $login_status = 1;
                //保存用户信息到session中
                $save_info['user_money'] = 0;
                $save_info['user_name'] = $name;
                $save_info['user_login_time'] = date("Y-m-d H:i:s",$data['user_login_time']);
                $save_info['user_last_time'] = date("Y-m-d H:i:s",$data['user_last_time']);
                $save_info['user_last_ip'] = I('server.REMOTE_ADDR');
                $save_info['user_score'] = 0;
                session(C("USER_ID"),$user_id);
                session(C("USER_INFO"),$save_info);
            }else {
                $login_status = 0;
            }
        }
        echo $login_status;
        
    }
    
    //验证码
    public function verify(){
        $config = array(
            'imgW'=>'140',
            'imgH'=>'65',
            'length'=>4,
            'bg'=>array(253,253,253),
            'useNoise'=>false,
            'fontSize'=>30
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    
    //验证输入的抽样调查是否正确
    public function check_verify($code,$id=''){
        $code = I('get.code');
        $verify = new \Think\Verify();
        if ($verify->check($code,$id)){
            $data = 1;
        }else {
            $data = 0;
        }
        echo $data;
    }
       
    
    
}