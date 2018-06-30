<?php
namespace app\index\controller;
/**
* 商城首页控制器
*/
class Index
{
    public function index()
    {
        $cate_select = db('cate')->select();
        $cate_model = model('cate');
        $cate_list = $cate_model->getChildren($cate_select);
        dump($cate_list);die;
        return view();
    }
}
