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
        // 当上传后跑到别的页面时会删除刚才在该页面上传的图片
        if(session('goods_thumb'))
        {
            $url_pre = DS.'jd'.DS.'public';
            // DS系统分隔符
            $url = str_replace($url_pre,'.',session('goods_thumb'));
            // 如果存在文件就删除
            if(file_exists($url))
            {
                unlink($url);
            }
        }
        session('goods_thumb',null);
        $cate_select = db('cate')->select();
        $cate_model = model('cate');
        $cate_list = $cate_model->getChildrenId($cate_select);
        //获取无限极分类列表
        $this->assign('cate_list',$cate_list);
        return $this->fetch();
    }

    //利用插件上传图片的方法
    public function uploadthumb(){

        $file = request()->file('goods_thumb');
        $info = $file ->move(ROOT_PATH.'public'.DS.'uploads');
        if($info){
            $address = DS.'jd'.DS.'public'.DS.'uploads'.DS.$info->getSaveName();
            session('goods_thumb',$address);
            return $address;
        }else{
            echo $file->getError();
        }
    }

    //提交商品信息处理
    public function addhanddle(){
        $data = request()->post();
        $data['good_thumb'] = session('goods_thumb');
        dump($data);
    }
}