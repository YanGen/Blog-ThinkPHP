<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index()
    {
    	$Admin = D('Admin');
        if (IS_POST) {
	        $yzm = $_POST["verify"];   //接收传过来的文本框的值
	        $v = new \Think\Verify();
	        if(!$v->check($yzm))  //验证完是有返回值的,所以我们可以用if判断一下
	        {
	            $this->error("验证码错误!");    //输入错误返回no   
	        }  

	    	if ($Admin->create($_POST)) {
	    		if ($Admin->login()) {
	    			$this->success("登录成功!",U("Index/index"));
	    		}else{
	    			$this->error("账号密码有误！");
	    		}
	    	}else{
	    	$this->error($Admin->getError);
	        }
        return;
    	}
    	if (session('id')) {
    		$this->error("已登录!请先退出登录...",U("Index/index"));
    	}
    	$this->display("login");
    }


    public function verify()
    {
    	$verify = new \Think\Verify();
		$verify->fontSize = 40;
		$verify->length   = 4;
		$verify->useNoise = false;
		$verify->entry();

		// $verify = new \Think\verify();
		// // 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/verify/bgs 目录下面的图片
		// $verify->useImgBg = true; 
		// $verify->entry();
    }
}