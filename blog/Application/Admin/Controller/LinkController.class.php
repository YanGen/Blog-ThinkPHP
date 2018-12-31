<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
    public function lst()
    {
        $Link = D('Link');
        $count = $Link->count();
        $Page = new \Think\Page($count,5);
        $show = $Page->show();
        $LinkList = $Link->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign("LinkList",$LinkList);
        $this->assign('page',$show);
    	$this->display();
    }
    //更新排序
    public function sot()
    {
        $Link = M('Link');
        $changeRow = 0;
        foreach ($_POST as $id => $sort) {
            $data['sort'] = $sort;
            $dbRetrunRow = $Link->where("id=".$id)->save($data);
            $changeRow+=$dbRetrunRow;
        }
        $this->success("排序成功!  共影响:".$changeRow."行",U('lst'));
    }
    public function del()
    {
        $Link = M('Link');
        if ($Link->delete(I('id'))) {
            $this->success("链接删除成功!",U('lst'));
        }else{
            $this->error("删除失败!",U('lst'));
        }
    }
    public function upd()
    {
        $title = I('title');
        $url = I('url');
        $desc = I('desc');
        $id = I('id');
        //若是POST,更新数据库
    	if (IS_POST) {
            $Link = M('Link');
            $data['title'] = $title;
            $data['url'] = $url;
            $data['desc'] = $desc;
            $Link->where("id=".$id)->save($data);
            $this->success("更新成功!",U('lst'));
        }
        //若是get,回显数据
        $this->assign("desc",$desc);
        $this->assign("url",$url);
        $this->assign("title",$title);
        $this->assign("id",$id);
        $this->display();
    }
    public function add()
    {
    	if (IS_POST) {
    		$Link = D('Link');
    		$data['title'] = I('title');
            $data['url'] = I('url');
            $data['desc'] = I('desc');
     		if ($Link->create($data)) {
    			if ($Link->add()) {
                    $this->success('添加链接成功!',U('lst'));
                }else{
                    $this->error('添加链接失败!');
                }

    		}else{
    			$this->error($Link->getError());
    		}
            return;
    	}
    	$this->display();
    }
}