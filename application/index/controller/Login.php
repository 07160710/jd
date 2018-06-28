<?php 
namespace app\index\controller;

/**
* 用户登录控制器
*/

class Login extends \think\Controller
{
	public function index(){
		//用户登录界面
		//return $this->fetch();
		return view('login');
	}
}

?>