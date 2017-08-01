<?php
/**
 * 史亚运
 * 商品控制器
 * */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Dispatcher;
class GoodsController extends Controller{
    //商品列表
    public function index(){
        $Model = M('Goods');
		//分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=6);
        $this->assign('page',$page['page']);// 赋值分页输出

        $where['is_delete'] = 0;
        $goodsList = $Model->join('jd_brands ON jd_goods.brand_id = jd_brands.brand_id')->where($where)->limit($page['limit'])->select();
        $this->assign('goodsList',$goodsList);
        $this->display('goodsList');
    }
    //显示发布商品页面
    public function addGoods(){
        //获取商品分类信息
        $Model = M('Goods_cat');
        $catData = $Model->select();
        $catList = getCatTree($catData);
        
        //获取商品品牌
        $Model = M('Brands');
        $brandData = $Model->select();
        
        //获取商品类型
        $Model = M('Goods_type');
        $typeData = $Model->select();
        
        $this->assign('brandData',$brandData);
        $this->assign('typeData',$typeData);
        $this->assign('catList',$catList);
        $this->display();
    }
    
    //ajax获取商品属性
    public function getAttrListByTypeId(){
        //print_r($_POST);
        $Model = M('Goods_attribute');
        $where['type_id'] = $_POST['id'];
        $data = $Model->where($where)->select();
        //print_r($data);
        //return $data;
        
        $html = '';
        foreach ($data as $value) {
        
            //属性id
        
            // 输入类型为唯一值
            if($value['attr_mode'] == 0){
                if($value['input_type'] == 0){
                    //单行文本框
                    $html.='<li>
                                <input type="hidden" name="attr_id_list[]" value="'.$value['attr_id'].'" />
                                <label>'.$value['attr_name'].'</label>
                                <input type="text" class="dfinput" name="attr_value_list[]" value="'.$value['attr_values'].'" />
                                <!--<input type="hidden" name="attr_price_list[]" value="&nbsp;">-->
                            </li>';
                }elseif($value['input_type'] == 1){
                    //下拉框
                    $html.='<li>
                                <label>'.$value['attr_name'].'</label>
                                <input type="hidden" name="attr_id_lists[]" value="'.$value['attr_id'].'" />
                                <select name="attr_value_lists[]" style="opacity:1;border:solid 1px #c3ab7d;height:35px;">
                                    <option value="">请选择...</opton>';
                    $value_list = explode(',', $value['attr_values']);
                    $value_list = array_filter($value_list);
                    foreach ($value_list as $v) {
                        $html .= '<option value="'.$v.'">'.$v.'</option>';
                    }
        
                    $html.=     '</select>
                                <input type="hidden" name="attr_price_list[]" />
                            </li>';
                }else{
                    //多行文本框
                    $html.='<li>
                                <label>'.$value['attr_name'].'</label>
                                <input type="hidden" name="attr_id_list[]" value="'.$value['attr_id'].'" />
                                <textarea name="attr_value_list[]" class="textinput" id="" cols="20" rows="5" style="width:328px;height:70px;">'.$value['attr_values'].'</textarea>
                                <!--<input type="hidden" name="attr_price_list[]" value="">-->
                            </li>';
                }
        
            }
                                
                                
                else{
                //单选, 下拉框
                $html.='<li>
                            <label><a href="javascript:;" onclick="addSpec(this)">[+]</a>'.$value['attr_name'].'</label>
                            <input type="hidden" name="attr_id_lists[]" value="'.$value['attr_id'].'" />
                            <select name="attr_value_lists[]" style="opacity:1;border:solid 1px #c3ab7d;height:35px;">
                                <option value="">请选择...</opton>';
                $value_list = explode(',', $value['attr_values']);
                $value_list = array_filter($value_list);
                foreach ($value_list as $v) {
                    $html .= '<option value="'.$v.'">'.$v.'</option>';
                }
        
                $html.=     '</select>
                            
                        </li>';
            }
        }
        
        
        $html .= '<li></li>';
        echo $html;
        die;
        
        
        /* 勿删，备用
         * elseif($value['attr_mode'] == 1){
            if ($value['input_type'] == 0){
                $html.='<li>
                            <label><a href="javascript:;" onclick="addSpec(this)">[+]</a>'.$value['attr_name'].'</label>
                            <input type="hidden" name="attr_id_list[]" value="'.$value['attr_id'].'" />
                            ';
                $value_list = explode(',', $value['attr_values']);
                print_r($value_list);
                $value_list = array_filter($value_list);
                foreach ($value_list as $v){
                    $html.='
                                <input type="text" name="attr_value_list[]" value="'.$v.'" disabled="disabled" style="height:20px;width:35px;margin-left:10px;background:#ffffff;"/>
                                                                                    价格：￥
                                <input type="text" name="attr_price_list[]" style="border:1px solid black;height:20px;width:50px;"/>
                            ';
                }
        
                $html .= '</li>';
                echo $html;
                 die; 
            } */
    }
    
    //执行发布商品
    public function addGoodsAct(){
        //print_r($_POST);
        //echo '<hr>';
        //print_r($_FILES);
        //echo '<hr>';
        //exit();
        
        /*****上传图片开始*****/
        if(!empty($_FILES['img_url']['name']['0']) && !empty($_FILES['img_url']['type']['0'])){
            $upload = new \Think\Upload();//实例化上传类
            $upload->maxSize = 20480000000;
            $upload->exts = array('jpg','gif','png','jpeg');
            $upload->rootPath = './Public/Uploads/GoodsThumb/';
            $upload->saveName = rand(1000, 9999).'_'.time();
            //$upload->savePath = './jiadianshop/Public/Uploads/Article';
            $upload->autoSub = true;
            $upload->subName = array('date','Ymd');
            $info = $upload->upload(array($_FILES['img_url']));
            
            //print_r($info);
            if (!$info){
                $this->error($upload->getError());
            }else{
                //echo $info['savepath'].'--'.$info['savename'].'<br/>';
                //$img_path = '';
                foreach ($info as $v){
                    $img_path[] = __ROOT__.'/Public/Uploads/GoodsThumb/'.$v['savepath'].$v['savename'];
                    
                }
                $img_path = implode('|',$img_path);
                $_POST['goods_thumb_img'] = $img_path;
            }
        }
        /*****上传图片结束*****/ 
        /* print_r($_POST);
        exit();
         */
        if (!empty($_POST)){
            $_POST['add_time'] = time();
            $_POST['attr_id_list'] = implode(',', $_POST['attr_id_list']);
            $_POST['attr_id_list'] .= ',';
            $_POST['attr_id_list'] .= $_POST['attr_id_lists'][0];
            
            $_POST['attr_value_lists'] = implode('|', $_POST['attr_value_lists']);
            $_POST['attr_value_list'] = implode(',', $_POST['attr_value_list']);
            
            $_POST['attr_value_list'].=',';
            $_POST['attr_value_list'].=$_POST['attr_value_lists'];
            unset($_POST['attr_id_lists']);
            unset($_POST['attr_value_lists']);
            array_filter($_POST);
            //$_POST['attr_price_list'] = implode(',', $_POST['attr_price_list']);
            //$_POST['attr_num_list'] = implode(',', $_POST['attr_num_list']);
            
            //print_r($_POST);
            //exit();
            
            $Model = M('Goods');
            $data = $Model->create();
            $result = $Model->add();
            if ($result){
                $this->success('商品发布成功','index');
            }else {
                $this->error('商品发布失败','index');
            }
        }
        
        
    }
    
    //库存管理
    public function stockManage(){
        $Model = M('Goods');
        $where['goods_id'] = I('get.goods_id',0);
        $goodsData = $Model->where($where)->find();
        $this->assign('goods',$goodsData);
        $this->display();
    }
    
    //执行库存管理
    public function stockManageAct(){
        //print_r($_POST);
        //exit();
        $goods_id = I('post.goods_id');
        $data['goods_number'] = I('post.goods_number');
        $Model = M('Goods');
        
        $info = $Model->where(array('goods_id'=>$goods_id))->save($data);
        if ($info){
            $this->success('库存修改成功',U('index'));
        }else{
            $this->error('库存修改失败');
        }
    }
    
    //显示修改商品页
    public function editGoods(){
        //print_r($_GET);
        $Model = M('Goods');
        $where['goods_id'] = I('get.goods_id');
        //print_r($where);
        $goodsData = $Model->join("jd_goods_cat ON jd_goods.cat_id=jd_goods_cat.cat_id")->where($where)->find();
        //print_r($goodsData);
        
        //获取分类信息
        $cat = M('Goods_cat');
        $cats = $cat->select();
        $catList = getCatTree($cats);
        
        //获取品牌信息
        $brandModel = M('Brands');
        $where = array();
        $where['brand_id'] = $goodsData['brand_id'];
        $brand = $brandModel->where($where)->find();
        $brandData = $brandModel->select();
        
        //获取商品属性信息
        $typeModel = M('Goods_type');
        $typeData = $typeModel->select();
        
        $this->assign('goodsData',$goodsData);
        $this->assign('catList',$catList);
        $this->assign('brand',$brand);
        $this->assign('brandData',$brandData);
        $this->assign('typeData',$typeData);
        $this->display();
    }
    //执行修改商品
    public function editGoodsAct(){
        /* $Model = M('Goods');
        $Model->create();
        
        $result = $Model->save();
        if ($result){
            $this->success('商品修改成功','index');
        }else {
            $this->error('商品修改失败','index');
        } */
        
        /*****上传图片开始*****/
        if(!empty($_FILES['img_url']['name']['0']) && !empty($_FILES['img_url']['type']['0'])){
            $upload = new \Think\Upload();//实例化上传类
            $upload->maxSize = 20480000000;
            $upload->exts = array('jpg','gif','png','jpeg');
            $upload->rootPath = './Public/Uploads/GoodsThumb/';
            $upload->saveName = rand(1000, 9999).'_'.time();
            //$upload->savePath = './jiadianshop/Public/Uploads/Article';
            $upload->autoSub = true;
            $upload->subName = array('date','Ymd');
            $info = $upload->upload(array($_FILES['img_url']));
        
            //print_r($info);
            if (!$info){
                $this->error($upload->getError());
            }else{
                //echo $info['savepath'].'--'.$info['savename'].'<br/>';
                //$img_path = '';
                foreach ($info as $v){
                    $img_path[] = __ROOT__.'/Public/Uploads/GoodsThumb/'.$v['savepath'].$v['savename'];
        
                }
                $img_path = implode('|',$img_path);
                $_POST['goods_thumb_img'] = $img_path;
            }
        }
        /*****上传图片结束*****/
        /* print_r($_POST);
         exit();
         */
        if (!empty($_POST)){
            $_POST['add_time'] = time();
            $_POST['attr_id_list'] = implode(',', $_POST['attr_id_list']);
            $_POST['attr_id_list'] .= ',';
            $_POST['attr_id_list'] .= $_POST['attr_id_lists'][0];
            
            $_POST['attr_value_lists'] = implode('|', $_POST['attr_value_lists']);
            $_POST['attr_value_list'] = implode(',', $_POST['attr_value_list']);
            //$_POST['attr_price_list'] = implode(',', $_POST['attr_price_list']);
            //$_POST['attr_num_list'] = implode(',', $_POST['attr_num_list']);
            
            $_POST['attr_value_list'].=',';
            $_POST['attr_value_list'].=$_POST['attr_value_lists'];
            
            unset($_POST['attr_id_lists']);
            unset($_POST['attr_value_lists']);
            array_filter($_POST);
            //print_r($_GET);
            //echo '<hr>';
            //print_r($_POST);
            //exit();
        
            $Model = M('Goods');
            $data = $Model->create();
            $result = $Model->save();
            if ($result){
                $this->success('商品修改成功','index');
            }else {
                //$sql = $Model->getLastSql();
                //echo $sql;
                //exit();
                $this->error('商品修改失败');
            }
        }
        
    }
    
    //回收商品
    public function recycleGoods(){
        $_POST['is_delete'] = 1;
        $where['goods_id'] = I('get.goods_id',0);
        //exit();
        $Model = M('Goods');
        $Model->create();
        $result = $Model->where($where)->save();
        if ($result){
            $this->success('商品已回收','index');
        }else {
            $this->error('商品回收失败','index');
        }
        
    } 
    
    //回收站显示商品
    public function showRecyle(){
        $Model = M('Goods');
        $where['is_delete'] = 1;
        $goodsList = $Model->join('jd_brands ON jd_goods.brand_id = jd_brands.brand_id')->where($where)->select();
        $this->assign('goodsList',$goodsList);
        $this->display();
    }
    
    //还原商品
    public function recover(){
        $_POST['is_delete'] = 0;
        $where['goods_id'] = I('get.goods_id',0);
        //exit();
        $Model = M('Goods');
        $Model->create();
        $result = $Model->where($where)->save();
        if ($result){
            $this->success('商品还原成功');
        }else {
            $this->error('商品还原失败');
        }
        
    }
    
    //删除商品
    public function deleteGoods(){
        $where['goods_id'] = I('get.goods_id',0);
        $Model = M('Goods');
        $result = $Model->where($where)->delete();
        if ($result){
            $this->success('商品删除成功');
        }else {
            $this->error('商品删除失败');
        }
        
    }
    
    //商品分类列表
    public function cateList(){
        $Model = M('Goods_cat');
        $data = $Model->select();
        $cateData = getCatTree($data);
        
        $this->assign('cateData',$cateData);
        $this->display();
        
    }
    
    //显示添加商品分类页
    public function addCate(){
        //获取分类信息
        $Model = M('Goods_cat');
        $data = $Model->select();
        $cateData = getCatTree($data);
        $this->assign('cateData',$cateData);
        $this->display();
    }
    
    //执行添加商品分类
    public function addCateAct(){
       
        $Model = M('Goods_cat');
        $goodsId = $Model->create();
        $result = $Model->add();
        if ($result){
            $this->success('商品分类添加成功','cateList');
        }else {
            $this->error('商品分类添加失败','cateList');
        }
        
    }
    
    //显示修改商品分类页面
    public function editCate(){
        //print_r($_GET);
        
        $Model = M('Goods_cat');
        $where['cat_id'] = $_GET['cat_id'];
        //获取当前分类的信息
        $cat = $Model->where($where)->find();
        //获取当前父类的信息
        $where['cat_id'] = $_GET['parent_id'];
        $parentData = $Model->where($where)->find();
        //获取商品分类树
        $data = $Model->select();
        $catData = getCatTree($data); 
        
        $this->assign('cat',$cat);
        $this->assign('parentData',$parentData);
        $this->assign('catData',$catData);
        $this->display();
    }
    //执行商品分类修改
    public function editCateAct(){
        //print_r($_POST);
        $Model = M('Goods_cat');
        $Model->create();
        $info = $Model->save();
        if ($info){
            $this->success('修改成功',U('cateList'));
        }else {
            $this->error('修改失败',U('cateList'));
        }
    }
    
    //删除商品分类
    public function delCate(){
        $Model = M('Goods_cat');
        $where['parent_id'] = $_GET['cat_id'];
        $info = $Model->where($where)->find();
        if (!empty($info)){
            echo "<script type='text/javascript'>alert('该分类下有子分类，禁止删除！');history.back();</script>";
            exit();
        }else {
            $where = array();
            $where['cat_id'] = $_GET['cat_id'];
            $result = $Model->where($where)->delete();
            
            if ($result){
                $this->success('商品分类删除成功',U('cateList'));
            }else {
                $this->error('商品分类删除失败');
            }
        }
        
    }
    
    //商品品牌列表
    public function brandList(){
        $Model = M('Brands');
        //分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=10);
        $this->assign('page',$page['page']);// 赋值分页输出
        //商品品牌分页数据
        $brandData = $Model->limit($page['limit'])->select();
        
        $this->assign('brandData',$brandData);
        $this->display();
    }
    
    //显示添加商品品牌页面
    public function addBrand(){
        //获取商品分类
        $Model = M('Goods_cat');
        $data = $Model->select();
        $catData = getCatTree($data);
        //print_r($catData);
        $this->assign('catData',$catData);
        $this->display();
    }
    
    //执行添加商品品牌
    public function addBrandAct(){
        //文件上传(图片：品牌LOGO)
        //print_r($_FILES);
        if (!empty($_FILES['logo']['name'])&&!empty($_FILES['logo']['type'])){
            $upload = new \Think\Upload();//实例化上传类
            $upload->maxSize = 10240000;
            $upload->exts = array('jpg','jif','png','jpeg');
            $upload->rootPath = './Public/Uploads/Brand/';
            $upload->saveName = rand(1000, 9999).'_'.time();
            //上传文件
            $info = $upload->uploadOne($_FILES['logo']);
            //print_r($info);
            if ($info){
                $logoPath = __ROOT__.'/Public/Uploads/Brand/'.$info['savepath'].$info['savename'];
                //echo $logoPath;
                //echo "上传成功";
                $_POST['brand_logo'] = $logoPath;
            }else {
                $this->error($upload->getError());
            }
        }
        
        //print_r($_POST);
        //exit();
        
        $Model = M('Brands');
        $Model->create();
        $info = $Model->add();
        if ($info){
            $this->success('品牌添加成功',U('brandList'));
        }else {
            $this->error('品牌添加失败',U('brandList'));
        }
    }
    
    //显示修改商品品牌页面
    public function editBrand(){
        $Model = M('Brands');
        //print_r($_GET);
        $where['brand_id'] = $_GET['brand_id'];
        $brandData = $Model->where($where)->find();
        //获得当前商品品牌所属分类
        $where = array();
        $where['cat_id'] = $brandData['cat_id'];
        $Model = M('Goods_cat');
        $cat = $Model->where($where)->find(); 
        
        //获取商品分类
        $Model = M('Goods_cat');
        $data = $Model->select();
        $catData = getCatTree($data);
        //print_r($catData);
        $this->assign('cat',$cat);
        $this->assign('catData',$catData);
        $this->assign('brandData',$brandData);
        $this->display();
    }
    
    //执行修改商品品牌
    public function editBrandAct(){
        //判断是否修改logo图片
        if (!empty($_FILES['logo']['name'])&&!empty($_FILES['logo']['type'])){
            $upload = new \Think\Upload();//实例化上传类
            $upload->maxSize = 10240000;
            $upload->exts = array('jpg','jif','png','jpeg');
            $upload->rootPath = './Public/Uploads/Brand/';
            $upload->saveName = rand(1000, 9999).'_'.time();
            //上传文件
            $info = $upload->uploadOne($_FILES['logo']);
            //print_r($info);
            if ($info){
                $logoPath = __ROOT__.'/Public/Uploads/Brand/'.$info['savepath'].$info['savename'];
                //echo $logoPath;
                //echo "上传成功";
                $_POST['brand_logo'] = $logoPath;
            }else {
                $this->error($upload->getError());
            }
        }
        
        //接收数据并执行修改
        $Model = M('Brands');
        $where = array();
        $where['brand_id'] = $_POST['brand_id'];
        $Model->create();
        $info = $Model->where($where)->save();
        if ($info){
            $this->success('品牌修改成功',U('brandList'));
        }else {
            $this->error('品牌修改失败',U('brandList'));
        }
    }
    
    //删除商品品牌
    public function delBrand(){
        $Model = M('Brands');
        if (!empty($_GET['brand_id'])){
            $where['brand_id'] = $_GET['brand_id'];
            $info = $Model->where($where)->delete();
            if ($info){
                $this->success('删除成功',U('brandList'));
            }else {
                $this->error('删除失败',U('brandList'));
            }
        }else {
            $this->redirect(U('brandList'));
        }
        
    }
    
    //显示商品类型
    public function typeList(){
        $Model = M('Goods_type');
        $data = $Model->select();
        
        $this->assign('typeData',$data);
        $this->display();
    }
    
    //显示添加商品类型
    public function addType(){
        
        $this->display();
    }
    
    //执行添加商品类型
    public function addTypeAct(){
       $Model = M('Goods_type');
       $Model->create();
       $info = $Model->add();
       if ($info){
           $this->success('添加成功',U('typeList'));
       }else {
           $this->error('添加失败');
       }
       
    }
    
    //显示商品类型修改页面
    public function editType(){
        $Model = M('Goods_type');
        if (!empty($_GET['type_id'])){
            $where['type_id'] = $_GET['type_id'];
            $typeData = $Model->where($where)->find();
            $this->assign('type',$typeData);
        }
        $this->display();
    }
    
    //执行商品类型修改
    public function editTypeAct(){
        $Model = M('Goods_type');
        $Model->create();
        $info = $Model->save();
        if ($info){
            $this->success('修改成功',U('typeList'));
        }else {
            $this->error('修改失败');
        }
        
    }
    
    //显示商品类型属性页面
    public function attributeList(){
        $Model = M('Goods_attribute');
        $type_id = I('get.type_id');
        $data = $Model->join('jd_goods_type ON jd_goods_attribute.type_id = jd_goods_type.type_id')->where(array('jd_goods_type.type_id'=>$type_id))->select();
        //print_r($data);
        $this->assign('attrData',$data);
        $this->display();
    }
    
    //显示商品类型属性添加页面
    public function addAttribute(){
        //类型数据
        $Model = M('Goods_type');
        $typeData = $Model->select();
        
        $this->assign('typeData',$typeData);
        $this->display();
    }
    
    //执行商品类型属性添加页面
    public function addAttributeAct(){
        $Model = M('Goods_attribute');
        $Model->create();
        $info = $Model->add();
        if ($info){
            $this->success('添加成功',U('attributeList'));
        }else {
            $this->error('添加失败');
        }
        
    }
    
    //显示修改商品属性页面
    public function editAttribute(){
        //print_r($_GET);
        $Model = M('Goods_attribute');
        $where['attr_id'] = $_GET['attr_id'];
        $attr = $Model->where($where)->find();
        
        $where = array();
        $Model = M('Goods_type');
        $where['type_id'] = $_GET['type_id'];
        $type = $Model->where($where)->find();
        
        $where = array();
        $typeData = $Model->select();
        
        $this->assign('attr',$attr);
        $this->assign('type',$type);
        $this->assign('typeData',$typeData);
        $this->display();
    }
    
    //执行修改商品属性
    public function editAttributeAct(){
        $Model = M('Goods_attribute');
        $Model->create();
        $info = $Model->save();
        if($info){
            $this->success('修改成功','attributeList');
        }else {
            $this->error('修改失败');
        }
    }
    
    
    //删除商品类型
    public function delType(){
        if (!empty($_GET['type_id'])){
            $where['type_id'] = $_GET['type_id'];
            $Model = M('Goods_type');
            $info = $Model->where($where)->delete();
            if ($info){
                $this->success('删除成功',U('typeList'));
            }else {
                $this->error('删除失败');
            }
        }
        
    }
    
    //删除商品类型属性
    public function delAttribute(){
        if (!empty($_GET['attr_id'])){
            $where['attr_id'] = $_GET['attr_id'];
            $Model = M('Goods_attribute');
            $info = $Model->where($where)->delete();
            if ($info){
                $this->success('删除成功',U('attributeList'));
            }else {
                $this->error('删除失败');
            }
        }
        
    }
    
    
    public function warn(){
        $Model = M('Goods');
        //分页
        $total = $Model->count();// 查询满足要求的总记录数
        $page = getPage($total, $pageSize=6);
        $this->assign('page',$page['page']);// 赋值分页输出
    
        $where['goods_number'] = array('lt',11);
        $goodsList = $Model->join('jd_brands ON jd_goods.brand_id = jd_brands.brand_id')->where($where)->limit($page['limit'])->select();
        $this->assign('goodsList',$goodsList);
        $this->display('warn');
    }
    
    
    
    //商品上架
    public function putAway(){
        
        
    }
    
    //商品下架
    public function soldOut(){
        
        
    }
    
    //编辑器调试
    public function umeditor(){
        
        $this->display();
    }
    
    
    
    
    
    
    
}










