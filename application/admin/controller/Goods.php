<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13
 * Time: 20:48
 */

namespace app\admin\controller;


use think\Controller;

class Goods extends Controller
{
    public function add()
    {
        $cate_select = db('cate')->select();
        $cate_model = model('cate');
        $cate_list = $cate_model->getChildrenId($cate_select);
        //获取无限极分类列表
        $this->assign('cate_list',$cate_list);
        return $this->fetch();
    }

    public function uploadthumb(){
        $file = request()->file('goods_thumb');
        $info = $file ->move(ROOT_PATH.'public'.DS.'uploads');
        if($info){
            $address = DS.'jd'.DS.'public'.DS.'uploads'.DS.$info->getSaveName();
            return $address;
        }else{
            echo $file->getError();
        }
    }
}