<?php
namespace app\admin\controller;

/**
* 分类管理控制器
*/
class Cate extends \think\Controller
{
	//商品列表方法
	public function catelist()
	{
		$cate_select = db('cate')->select();
		$cate_model = model('cate');
		$cate_list = $cate_model->getChildrenId($cate_select);
		$this->assign('cate_list',$cate_list);
		return view();
	}
}
?>