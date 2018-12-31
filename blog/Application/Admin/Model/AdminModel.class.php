<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
    protected $_validate = array(
    array('password','require','密码名不能为空！',1,'regex',4), 
     array('username','require','用户不能为空！',1,'regex',4), 
     // array('verify','check_verify','验证码错误',1,'callback',4), 
 );
	public function login()
	{
		$password = $this->password;
		$info = $this->where(array('username' => $this->username))->find();
		if ($info) {
			if ($info['password']==md5($password)) {
				session('id',$info['id']);
				session('username',$info['username']);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	// function check_verify($code,$id=""){
	// 	$verify = new \Think\Verify();
	// 	return $verify->check($code,$id);
	// }
}