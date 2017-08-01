<?php
namespace Admin\Model;
use \Think\Model;
class ArticleCatModel extends Model {
    //筛选分类数据
    public function getCatTree($arr,$id = 0,$lev = 0) {
        $tree = array();
        
        foreach ($arr as $v){
            if ($v['parent_id'] == $id){
                $v['lev'] = $lev;
                $tree[] = $v;
                
                $tree = array_merge($tree,$this->getCatTree($arr,$v['cat_id'],$lev+1));
            }
        }
        return $tree;
    }












}