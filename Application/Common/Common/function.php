<?php
//自定义函数
/* function getCatTree($arr,$id = 0,$lev = 0) {
    $tree = array();

    foreach ($arr as $v){
        if ($v['parent_id'] == $id){
            $v['lev'] = $lev;
            $tree[] = $v;

            $tree = array_merge($tree,getCatTree($arr,$v['cat_id'],$lev+1));
        }
    }
    return $tree;
} */

function hello(){
    echo 'nihao';
}

//获取分类树
/* function getCatTree($table){
    $Model = M("$table");
    //获取分类列表数据
    $data = $Model->select();
    $catModel = new \Admin\Model\ArticleCatModel();
    $cat = $catModel->getCatTree($data);
    return $cat;
} */


function getCatTree($arr,$id = 0,$lev = 0) {
    $tree = array();

    foreach ($arr as $v){
        if ($v['parent_id'] == $id){
            $v['lev'] = $lev;
            $tree[] = $v;

            $tree = array_merge($tree,getCatTree($arr,$v['cat_id'],$lev+1));
        }
    }
    return $tree;
}

/**
 * 获取分页数据
 * @param  integer $total    总记录数
 * @param  integer $pageSize 每页显示数量
 * @return array           返回的分页数据
 */
function getPage($total, $pageSize,$tab=array()){
    $page = new \Think\Page($total, $pageSize, $tab);
    $page->setConfig('theme', '<p>共 %TOTAL_ROW% 条记录 | 当前第%NOW_PAGE%/%TOTAL_PAGE%页</p> %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    // $page->setConfig('header','共 %TOTAL_ROW% 条记录');
    $page->setConfig('prev','[上一页]');
    $page->setConfig('next','[下一页]');
    $page->setConfig('first','[首页]');
    $page->setConfig('last','[尾页]');
    //$page->p = $pag;
    return array(
        'page'  => $page->show(),
        'limit' => $page->firstRow.','.$page->listRows,
    );
}

