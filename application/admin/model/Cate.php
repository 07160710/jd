<?php
namespace app\admin\model;
/**
 * 商品分类模型
 */
class Cate extends \think\Model
{
    public function getChildrenId($cate_list,$pid=0,$level=1){
        //由父类id得到全部子类
        static $arr = array();
        foreach ($cate_list as $key => $value){
            if($value['cate_pid'] == $pid){
                $value['cate_level'] = $level;
                $value['str'] = str_repeat('——',$value['cate_level'] - 1);
                $arr[] = $value;
                $this->getChildrenId($cate_list,$value['cate_id'],$level + 1);
            }
        }
        return $arr;
    }

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