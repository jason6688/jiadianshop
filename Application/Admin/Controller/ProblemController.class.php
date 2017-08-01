<?php
/*
 *问题管理控制器
 *author：史亚运
 *
 */
namespace Admin\Controller;
use Think\Controller;
class ProblemController extends Controller{
    public function index(){
        $Model = M('Advice_question');
        $advice_category_id = I('get.id');
        $problem = $Model->join('jd_advice_category ON jd_advice_question.advice_category_id=jd_advice_category.advice_category_id')->where(array('jd_advice_question.advice_category_id'=>$advice_category_id))->select();
        
        //print_r($problem);
        $this->assign('problem',$problem);
        $this->display('index');
    }
   
    
}