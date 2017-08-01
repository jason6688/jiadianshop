<?php
/*用户登录控制器
 * 史亚运
 * 2016.5
 * **/
namespace Home\Controller;
use Think\Controller;
use Boris\Config;
class LoginController extends Controller{
    //显示登录页面
    public function index(){
        $getUrl = I('server.HTTP_REFERER');
        //var_dump($getUrl) ;
       if (empty($getUrl)||!preg_match('/jiadianshop\/index.php', $getUrl)||preg_match('/jiadianshop\/.*Login\/index/.', $getUrl)||preg_match('/jiadianshop\/.*\/Forget/index', $getUrl)){
            //如果非本站链接及登录之后跳转到首页
            $url = U('Index/index');
        }elseif (preg_match('/jiadianshop\/index\.php/', $getUrl)){
            //如果是站内的链接就去相应的页面
            $url = $getUrl;
            //$url = U('Home/Index/index');
        }else {
            //跳转到首页
            $url = U('Index/index');
        } 
         
        //$this->redirect($url);
        $this->url=$url;
        $this->display();
    }
    
    //登录验证
    public function remoteLogin(){
        //ajax的形式返回  sataus 0 失败 1 账户被锁  2成功
        //获取用户输入的名字和密码 以及是否长时间登录的标志
        $name = I('post.uname');
        $pwd = I('post.pwd','','md5');
        $rembername = I('post.rembername');
        //判断用户名和密码是否存在
        if (empty($name)||empty($pwd)){
            $status = 0;
        }else {
            $userModel = M('User');
            $userInfo = $userModel->where(array('user_name'=>$name,'user_pwd'=>$pwd))->find();
            if ($userInfo){
                $status = 2;
                //账户被锁定，不可以登录
                if ($userInfo['user_lock']==1){
                    $status = 1;
                }else {
                    //用户登录合法;对用户信息处理 更新用户登录时间和ip
                    $user_last_time = time();
                    $user_last_ip = ip2long(I('server.REMOTE_ADDR'));
                    $user_id = $userInfo['user_id'];
                    
                    $data['user_last_time'] = $user_last_time;
                    $data['user_last_ip'] = $user_last_ip;
                    
                    $info = $userModel->where(array('user_id'=>$user_id))->save($data);
                    
                    //准备保存到SESSION中的东西
                    //用户名
                    $save_info['user_name']=$userInfo['user_name'];
                    //真实姓名
                    //$save_info['true_name']=$userInfo['true_name'];
                    //性别 0-woman  1-man
                    	
                    $save_info['user_sex']=$userInfo['user_sex']==1?'先生':'小姐';
                    //用户的金额
                    $save_info['user_money']=$userInfo['user_money'];
                    	
                    $save_info['user_email']=$userInfo['user_email'];
                    $save_info['user_login_time']=date("Y-m-d H:i:s",$userInfo['user_login_time']);
                    $save_info['user_last_time']=date("Y-m-d H:i:s",$userInfo['user_last_time']);
                    $save_info['user_last_ip']=long2ip($userInfo['user_last_ip']);
                    $save_info['user_score']=$userInfo['user_score'];
                    //保存到session中去
                    //session_start();
                    session(C("USER_ID"),$user_id);
                    session(C("USER_INFO"),$save_info);
                    //$_SESSION("USER_ID",$user_id);
                    //$_SESSION("USER_INFO",$save_info);
                    //判断是否需要长时间保存登录
                    if($rembername){
                        //保存10天
                        $time=60*60*24*10+time();
                        	
                        cookie(session_name(),session_id(),array('expire'=>$time));
                        	
                    }
                    
                    	
                    $status=2;
                    
                }
            }else {
                $status = 0;
            }
        }
        
        echo $status;
    }
    
    //验证码
    public function verify(){
        $config = array(
            'imgW'=>140,
            'imgH'=>65,
            'length'=>4,
            'bg'=>array(253,253,253),
            'useNoise'=>false,
            'fontSize'=>30
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    
    //检验证码是否正确
    public function check_verify($code,$id=''){
        $code = I('get.code');
        
        $verify = new \Think\Verify();
        if ($verify->check($code)){
            $data = 1;
            
        }else {
            $data = 0;
        }
        
        echo json_encode($data);
    }
    
    //头部登录状态验证
    public function checkLogin(){
        //print_r($_SESSION);
        $login_status = 0;//登录标志，0表示未登录，1表示登录
       /*  $user_id = session(C("USER_ID"));
        $user_info = session(C("USER_INFO")); */
        $user_id = session(C("USER_ID"));
        $user_info = session(C("USER_INFO"));
        //print_r($user_info);
        //exit();
        //如果session有用户信息表示已经登录
        if ($user_id&&$user_info){
            $login_status = 1;
            $user_name = $user_info['user_name'];
            //查询用户积分score
            $score = M('User')->where(array('user_id'=>$user_id))->field('user_score')->find();
            //用户级别划分（<1000 0级，<2000 1级，<3000 2级，<4000 3级，<5000 4级，>6000 5级 ）
            if ($score['user_score']>=5000){
                $user_level = 5;
            }elseif ($score['user_score']>=4000){
                $user_level = 4;
            }elseif ($score['user_score']>=3000){
                $user_level = 3;
            }elseif ($score['user_score']>=2000){
                $user_level = 2;
            }elseif ($score['user_score']>=1000){
                $user_level = 1;
            }else{
                $user_level = 0;
            }
            
        }else {
            $login_status = 0;
        }
        
        $data['login_status'] = $login_status;
        $data['user_name'] = $user_name;
        $data['user_level'] = $user_level;
        
        echo json_encode($data);
    }
    
    //退出登录
    public function quit(){
        session(C("USER_ID"),null);
        session(C("USER_INFO"),null);
        
        $this->redirect('Index/index');
    }
    
    
    
}