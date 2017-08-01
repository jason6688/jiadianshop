<?php
namespace Admin\Model;
use Think\Model;
class ArticleCatModel extends Model {
    //筛选分类数据
    function getCatTree($arr,$id = 0,$lev = 0) {
        $tree = array();
        
        foreach ($arr as $v){
            if ($v['pid'] == $id){
                $v['lev'] = $lev;
                $tree[] = $v;
                
                $tree = array_merge($arr,$this->getCatTree($arr,$v['id'],$lev+1));
            }
        }
    }












}