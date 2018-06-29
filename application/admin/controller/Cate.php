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

	//添加商品界面显示
	public function add(){
        $cate_select = db('cate')->select();
        $cate_model = model('cate');
        $cate_list = $cate_model->getChildrenId($cate_select);
        //获取无限极分类列表
        $this->assign('cate_list',$cate_list);
	    return view();
    }

    //添加分类form表单处理方法
    public function addhanddle(){
	    $post = request()->post();
	    $cate_add = db('cate')->insert($post);
	    if($cate_add){
	        $this->success('分类添加成功','cate/catelist');
        }else{
	        $this->error('商品分类添加失败','cate/catelist');
        }
	    //dump($post);
    }
}
?>