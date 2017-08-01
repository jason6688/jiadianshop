<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller{
    public function index(){
        $id = I('get.id');
        
        $article = M('Article')->where(array('id'=>$id))->find();
        $this->assign('article',$article);
        $this->display();
    }
    
    
    
    
}








