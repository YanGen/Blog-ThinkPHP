<?php
namespace Home\Controller;
use Think\Controller;
class ConmentController extends CommonController {
    public function comment(){
    	$this->display('comment');  
    }
    
    // public function read($id){
    // 	// echo $_GET['id'];
    // 	echo $id;
    // }
}