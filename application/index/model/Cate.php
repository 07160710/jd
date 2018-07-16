<?php
namespace app\index\model;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30
 * Time: 10:50
 * 商品分类前台Cate的Model层
 */

class Cate extends \think\Model
{
    //得到全部子集，多维数组
    public function getChildren($cate_list,$pid=0){
        $arr = array();
        foreach ($cate_list as $key=>$value){
            if($value['cate_pid'] == $pid){
                $value['children'] = $this->getChildren($cate_list,$value['cate_id']);
                $arr[] = $value;
            }
        }
        return $arr;
    }
}