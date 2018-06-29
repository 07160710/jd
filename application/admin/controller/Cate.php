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
		$cate_list = db('cate')->select();
		$this->assign('cate_list',$cate_list);
		return view();
	}
}
?>