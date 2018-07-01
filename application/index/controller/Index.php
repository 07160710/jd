<?php
namespace app\index\controller;
/**
* 商城首页控制器
*/
class Index extends \think\Controller
{
    //商品主页显示
    public function index()
    {
        //添加分类排序order()
        $cate_select = db('cate')->order('cate_sort')->select();
        $cate_model = model('cate');
        $cate_list = $cate_model->getChildren($cate_select);
        //dump($cate_list);
        $this->assign('cate_list',$cate_list);
        return view();
    }
}
