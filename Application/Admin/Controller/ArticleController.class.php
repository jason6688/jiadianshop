<?php
/**
 * 史亚运
 * 文章管理控制器
 * */
namespace Admin\Controller;
use \Think\Controller;
header("Content-type:text/html;charset=utf-8");
 class ArticleController extends Controller{
     public function index(){
         //文章列表

         $Model = M('Article');
		 //分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=12);
        $this->assign('page',$page['page']);// 赋值分页输出
		 
         $articleList = $Model->join('LEFT JOIN jd_article_cat ON jd_article.cat_id = jd_article_cat.cat_id')->limit($page['limit'])->select();
         //print_r($articleList);
         $this->assign('articleList',$articleList);
         $this->display();
     }
     
     public function add(){
         
         
         $catList = $this->getCat();
         //print_r($catList);
         $this->assign('catList',$catList);
         $this->display();
     }
     
     //将文章数据插入数据库
     public function doAdd(){
         //print_r($_FILES);
         //exit();
         if(!empty($_FILES['image']['name']) && !empty($_FILES['image']['type'])){
             $upload = new \Think\Upload();//实例化上传类
             $upload->maxSize = 2048000000;
             $upload->exts = array('jpg','gif','png','jpeg');
             $upload->rootPath = './Public/Uploads/Article/';
             $upload->saveName = rand(1000, 9999).'_'.time();
             //$upload->savePath = './jiadianshop/Public/Uploads/Article';
             $upload->autoSub = true;
             $upload->subName = array('date','Ymd');
             $info = $upload->uploadOne($_FILES['image']);
             if (!$info){
                 $this->error($upload->getError());
             }else{
                 //echo $info['savepath'].'--'.$info['savename'].'<br/>';
                 $img_path = __ROOT__.'/Public/Uploads/Article/'.$info['savepath'].$info['savename'];
                 //echo $img_path;
             }
         }
        
         if (!empty($_POST)){
             $_POST['add_time'] = time();
             //print_r($_POST);
             //echo '<hr>';
             //$where['cat_name'] = $_POST['cat_id'];
             //$catData = M('Article_cat')->where($where)->find();
             //$_POST['cat_id'] = $catData['cat_id'];
             //print_r($_POST);
             //exit();
             if (isset($img_path)&&!empty($img_path)){
                 $_POST['img_path'] = $img_path;
             }
             //print_r($_POST);
             //exit();
             $article = M('Article');
             
             //print_r($article);
             //print_r($article->create());
             $data = $article->create();
             $res = $article->add();
             if ($res){
                 echo '文章添加成功';
                 //$this->redirect('add');
                 $this->success('文章添加成功','add');
             }
         }else {
             $this->redirect('add');
             //$this->error('请添加','add');
         }
     }
     
     //显示添加文章分类页面
     public function addCat(){
         $Model = M('Article_cat');
         $data = $Model->select();
         //print_r($data);
         //$modelCat = new \Admin\Model\ArticleCatModel('Article_cat','jd_');
         //$modelCat = D('Article_cat');
         $modelCat = new \Admin\Model\ArticleCatModel();
         
         
         $cateData = $modelCat->getCatTree($data);
         
         $this->assign('cateData',$cateData);
         
         $this->display();
     }
     
     //执行文章分类添加
     public function addCatAct(){
         $Model = M('Article_cat');
         $Model->create();
         $data = $Model->add();
         if ($data){
             $this->success('文章分类添加成功','addCat');
         }else{
             $this->error('文章分类添加失败');
         }
     }
     
     //显示修改文章分类页面
     public function editCat(){
         //print_r($_GET);
         $Model = M('Article_cat');
         //$Model->create();
         $where['cat_id'] = $_GET['cat_id'];
         $data = $Model->where($where)->find();
         //print_r($data);
         $this->assign('catData',$data);
         
         if ($data['parent_id']>0){
             $where = array();
             $where['cat_id'] = $data['parent_id'];
             $parentData = $Model->where($where)->find();
             //print_r($parentData);
             $this->assign('parentData',$parentData);
         }
         //获取分类列表数据
         $data = $Model->select();
         $catModel = new \Admin\Model\ArticleCatModel();
         $cat = $catModel->getCatTree($data);
         $this->assign('cat',$cat);
         $this->display();
     }
     
     //执行修改文章分类
     public function editCatAct(){
         $Model = M('Article_cat');
         $_POST['cat_id'] = $_GET['cat_id'];
         $Model->create();
         
         print_r($Model->create());
         $data = $Model->save();
         if ($data){
             $this->success('修改成功');
         }else {
             $this->error('修改失败');
         }
         
     }
     
     //删除文章分类
     public function delCat(){
         //print_r($_GET);
         $where['parent_id'] = $_GET['cat_id'];
         
         $Model = M('Article_cat');
         //判断即将删除的类是否有子类，如果有子类则禁止删除
         $data = $Model->where($where)->select();
         if (!empty($data)){
             echo "<script type='text/javascript'>alert('该分类下有子类，禁止删除！');history.back();</script>";
             exit();
         }
         
         $where = array();
         $where['cat_id'] = $_GET['cat_id'];
         //$Model->create();
         $data = $Model->where($where)->delete();
         if ($data){
             $this->success('删除成功');
         }else {
             $this->error('删除失败');
         }
     }
     
     //文章分类列表
     public function catList(){
         $Model = M('Article_cat');
         $data = $Model->select();
         $modelCat = new \Admin\Model\ArticleCatModel();
          
         $catList = $modelCat->getCatTree($data);
         $this->assign('catList',$catList);
         $this->display();
     }
     
     //修改文章
     public function edit(){
         //获取文章原始内容
         $Model = M('Article');
         $where['id'] = $_GET['id'];
         $data = $Model->where($where)->find();
         //print_r($data);
         
         //获取文章所属分类
         $where = array();
         $where['cat_id'] = $data['cat_id'];
         $Model = M('Article_cat');
         $catIdData = $Model->where($where)->find();
         //echo '<hr>';
         //print_r($catIdData);
         
         //文章分类信息
         $cat = $this->getCat();
         
         $this->assign('article',$data);
         $this->assign('cat',$cat);
         $this->assign('catIdData',$catIdData);
         
         $this->display();
     }
     
     //执行文章修改
     public function editAct(){
         
         if(!empty($_FILES['image']['name']) && !empty($_FILES['image']['type'])){
             $upload = new \Think\Upload();//实例化上传类
             $upload->maxSize = 2048000000;
             $upload->exts = array('jpg','gif','png','jpeg');
             $upload->rootPath = './Public/Uploads/Article/';
             $upload->saveName = rand(1000, 9999).'_'.time();
             //$upload->savePath = './jiadianshop/Public/Uploads/Article';
             $upload->autoSub = true;
             $upload->subName = array('date','Ymd');
             $info = $upload->uploadOne($_FILES['image']);
             if (!$info){
                 $this->error($upload->getError());
             }else{
                 //echo $info['savepath'].'--'.$info['savename'].'<br/>';
                 $img_path = __ROOT__.'/Public/Uploads/Article/'.$info['savepath'].$info['savename'];
                 //echo $img_path;
                 $_POST['img_path'] = $img_path;
             }
         }
         
         if (!empty($_POST)){
            $_POST['add_time'] = time();
            $where = array();
            
            $where['id'] = $_GET['article_id'];
            
            $Model = M('Article');
            $data = $Model->create();
            
            $info = $Model->where($where)->save();
            if ($info){
                $this->success('修改成功~',U('index'));
                
            }else {
                $this->error('修改失败！');
            }
         }
         
     }
     
     //修改页面点击[查看图片]显示图片
     public function showImage(){
         //print_r($_GET);
         if (!empty($_GET)){
            $Model = M('Article');
            $where[id] = $_GET['id'];
            $data = $Model->where($where)->find();
            $img_path = $data['img_path'];
            
            $this->assign('img_path',$img_path);
         } 
         
         $this->display();
     }
     
     //修改页面点击[删除图片]执行图片删除
     public function delImage(){
         $Model = M('Article');
         $where['id'] = $_GET['id'];
         $data['img_path'] = '';
         $info = $Model->where($where)->save($data);
         if ($info){
             echo "<script type='text/javascript'>alert('图片删除成功');history.back();</script>";
             exit();
         }else {
             echo "<script type='text/javascript'>alert('图片删除失败');history.back();</script>";
             exit();
         }
     }
     
     //删除文章
     public function delArticle(){
         //print_r($_GET);
         $Model = M('Article');
         $where['id'] = $_GET['id']; 
         $data = $Model->where($where)->delete();
         if($data){
             $this->success('删除成功');
         }else {
             $this->error('删除失败');
         }
     }
     
     
     //获取文章分类并按父子关系排列方法(供其他方法调用)
     public function getCat(){
         $Model = M('Article_cat');
         //获取分类列表数据
         $data = $Model->select();
         $catModel = new \Admin\Model\ArticleCatModel();
         $cat = $catModel->getCatTree($data);
         return $cat;
     }
     
     
     
     
     
     
     
     
     
     
 }