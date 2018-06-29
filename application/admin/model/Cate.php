<?php
namespace app\admin\model;
/**
 * 商品分类模型
 */
class Cate extends \think\Model
{
    public function getChildrenId($cate_list,$pid=0){
        //由父类id得到全部子类
        static $arr = array();
        foreach ($cate_list as $key => $value){
            if($value['cate_pid'] == $pid){
                $value['str'] = str_repeat('——',$value['cate_level'] - 1);
                $arr[] = $value;
                $this->getChildrenId($cate_list,$value['cate_id']);
            }
        }
        return $arr;
    }
}