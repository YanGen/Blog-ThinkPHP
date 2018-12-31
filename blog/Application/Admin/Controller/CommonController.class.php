<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 公共控制器,对后台登录状态拦截
 */
class CommonController extends Controller
{
	
	public function __construct()
	{	
		parent::__construct();
		if (!session('id')) {
			$this->error("请先登录!",U('Login/index'));
		}
	}
}