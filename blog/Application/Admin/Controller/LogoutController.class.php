<?php
namespace Admin\Controller;
use Think\Controller;
class LogoutController extends Controller {
	public function index(){
		if (!session("id")) {
			$this->error("当前无账户,请先登录!",U('Login/index'));
		}
		session(null);
    	$this->success("退出成功...",U("Login/index"));
	}
	
	

}