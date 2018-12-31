<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Cate = M('Cate');
        $webNotice = M("web_notice");
        $notice = $webNotice->find();
        $Article = D('ArticleView');
        $articleList = $Article->limit(3)->select();
        $cateList = $Cate->select();
        $Link = M('Link');
        $linkList = $Link->select();
        $this->assign('notice',$notice);
        $this->assign('linkList',$linkList);
        $this->assign('articleList',$articleList);
        $this -> assign('cateList',$cateList);
    	$this->display("index");    
    }
    
    
}