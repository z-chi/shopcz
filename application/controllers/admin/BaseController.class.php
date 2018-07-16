<?php
//后台基础控制器
class BaseController extends Controller {
	//构造方法
	public function __construct(){
		$this->checkLogin();
	}
	
	//验证用户是否登录
	public function checkLogin(){
		//注意，此处的admin是我在登录成功时保存的登录标识符
		if (!isset($_SESSION['admin'])) {
			$this->jump('index.php?p=admin&c=login&a=login','你还没有登录呢');
		}
	}
}