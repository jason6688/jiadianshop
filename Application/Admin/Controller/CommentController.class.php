<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller{
    //问题列表
    public function index(){
        $Model = M('Comment');
        //分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=10);
        $this->assign('page',$page['page']);// 赋值分页输出
        
        $comment_list = $Model->join('jd_goods ON jd_goods.goods_id=jd_comment.goods_id')->join('jd_user ON jd_user.user_id=jd_comment.user_id')->limit($page['limit'])->select();
        //print_r($comment_list);
        $this->assign('comment_list',$comment_list);
        $this->display();
    }
    
    public function info(){
        $comment_list = I('get.comment_id');
        $Model = M('Comment');
        $info_list = $Model->join('jd_goods ON jd_goods.goods_id=jd_comment.goods_id')->join('jd_user ON jd_user.user_id=jd_comment.user_id')->where(array('comment_id'=>$comment_list))->select();
        //print_r($info_list);
        
        $this->assign('info_list',$info_list);
        $this->display();
    }
    
    //改变评论显示状态
    public function change(){
        $Model = M('Comment');
        $comment_id = I('get.comment_id');
        $status = I('get.status');
        $data['status'] = $status;
        $info = $Model->where(array('comment_id'=>$comment_id))->save($data);
        if ($info){
            $this->redirect('index');
        }else {
            $this->redirect('index');
        }
    }
    
    //删除评论
    public function del(){
        $comment_id = I('get.comment_id');
        $Model = M('Comment');
        $info = $Model->where(array('comment_id'=>$comment_id))->delete();
        if ($info){
            $this->redirect('index');
        }else{
            $this->error('删除失败');
        }
    }
    
    
    
    
    
    
    
}