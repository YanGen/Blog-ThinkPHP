<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function lst(){
        $Cate = M('Cate');
        $cateList = $Cate->select();
        $Link = M('Link');
        $linkList = $Link->select();
        $webNotice = M("web_notice");
        $notice = $webNotice->find();
        $Article = D('ArticleView');
        $count = $Article->count();
        $Page = new \Think\Page($count,8);
        $show = $Page->show();
        $ArticleList = $Article->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('notice',$notice);
		$this->assign('linkList',$linkList);
        $this->assign("articleList",$ArticleList);
        $this->assign('page',$show);
        $this -> assign('cateList',$cateList);
    	$this->display();    
    }
    public function detail()
    {
        $id = I('id');
        $Article = M('Article');
        $article = $Article->where("id=".$id)->find();
        $iread = $article['iread'];
        $iread += 1;
        $data['iread'] = $iread;
        $dbRetrunRow = $Article->where("id=".$id)->save($data);

        $Cate = M('Cate');
        $cateList = $Cate->select();
        $Link = M('Link');
        $linkList = $Link->select();
        $webNotice = M("web_notice");
        $notice = $webNotice->find();

        $this->assign('notice',$notice);
        $this->assign('linkList',$linkList);
        $this->assign('page',$show);
        $this -> assign('cateList',$cateList);
        $this->assign('article',$article);
        $this->display();
    }
    
}