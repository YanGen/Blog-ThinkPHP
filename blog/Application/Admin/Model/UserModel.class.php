<?php

namespace Home\Model;
use Think\Model;
/**
 * 用户模型
 */
class UserModel extends Model
{
	protected $tableName = "User";
	public function getUsetList()
    {
    	$userObj = M();
    	$userList = $userObj->query("select * from think_user");
    	var_dump($userList) ;
    }
}