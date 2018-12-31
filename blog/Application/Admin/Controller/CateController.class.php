<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function lst()
    {
        $Cate = M('Cate');
        $cateList = $Cate->order("sort asc")->select();
        $this->assign("cateList",$cateList);
    	$this->display();
    }
    //更新排序
    public function sot()
    {
        $Cate = M('Cate');
        $changeRow = 0;
        foreach ($_POST as $id => $sort) {
            $data['sort'] = $sort;
            $dbRetrunRow = $Cate->where("id=".$id)->save($data);
            $changeRow+=$dbRetrunRow;
        }
        $this->success("排序成功!  共影响:".$changeRow."行",U('lst'));
    }
    public function del()
    {
        $Cate = M('Cate');
        if ($Cate->delete(I('id'))) {
            $this->success("类型删除成功!",U('lst'));
        }else{
            $this->error("删除失败!",U('lst'));
        }
    }
    public function upd()
    {
        $title = I('title');
        $id = I('id');
        //若是POST,更新数据库
    	if (IS_POST) {
            $Cate = M('Cate');
            $data['title'] = $title;
            $Cate->where("id=".$id)->save($data);
            $this->success("更新成功!",U('lst'));
        }
        //若是get,回显数据
        $this->assign("title",$title);
        $this->assign("id",$id);
        $this->display();
    }
    public function add()
    {
    	if (IS_POST) {
    		$Cate = D('Cate');
    		$data['title'] = I('title');
    		if ($Cate->create($data)) {
    			if ($Cate->add()) {
                    $this->success('添加类型成功!',U('lst'));
                }else{
                    $this->error('添加类型失败!');
                }

    		}else{
    			$this->error($Cate->getError());
    		}
            return;
    	}
    	$this->display();
    }
}