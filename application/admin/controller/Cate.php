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

		//得到数据总数
		$cate_totle = count($cate_list);

		$page_class = new \app\admin\controller\Page($cate_totle,6);
		$show = $page_class->fpage();        //模板显示的内容
		$limit = $page_class->setlimit();    //获取limit信息  ‘3,2’
		$limit = explode(',',$limit);     //['3','2']
		//dump($limit);
		$list = array_slice($cate_list,$limit[0],$limit[1]);   //123456
		$this->assign('show',$show);
        $this->assign('cate_list',$list);
		return view();
	}
}
?>