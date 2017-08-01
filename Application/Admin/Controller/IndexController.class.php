<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //header("Content-type:text/html;charset=utf-8");
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        //echo '这是后台管理系统';
        
        $admin_id = session(C('ADMIN_ID'));
        if (!empty($admin_id)) {
            
            
            $this->display('index');
        }else {
            $this->redirect('Login/index');
        }
        
    }
    
    //权限管理
    public function left(){
        
        $admin_id = session(C('ADMIN_ID'));
        if(!empty($admin_id)){
            //获取管理员权限
            
            $Model = M('Admin');
            $permission = $Model->where(array('admin_id'=>$admin_id))->getField('permission');
            
            if (!empty($permission)){
                $permission = explode(',', $permission);
                //print_r($permission);
                $this->assign('admin_id',$admin_id);
                $this->assign('permission',$permission);
                
            }
            
            $this->display();
        }
        
        
    }
    
   
    
}