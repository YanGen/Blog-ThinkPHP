<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function lst()
    {
        $Article = D('ArticleView');
        $count = $Article->count();
        $Page = new \Think\Page($count,5);
        $show = $Page->show();
        $ArticleList = $Article->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        echo $show;
        $this->assign("ArticleList",$ArticleList);
        $this->assign('page',$show);
        $this->display();
    }
    
    public function del()
    {
        $Article = M('Article');
        if ($Article->delete(I('id'))) {
            $this->success("文章删除成功!",U('lst'));
        }else{
            $this->error("删除失败!",U('lst'));
        }
    }
    public function upd()
    {
        $Article = M('Article');
        $id = I('id');
        $cateid = I('cateid');
        //若是POST,更新数据库
        if (IS_POST){
            $Article = D('Article');
            $data['title'] = I('title');
            $data['content'] = I('content');
            $data['desc'] = I('desc');
            $data['cateid'] = I('cateid');
            $data['author'] = session("username");

            if ($_FILES['pic']['tmp_name']!='') {
                $upload = new \Think\Upload();
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                // $upload->savepath = '/Public/Uploads';
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $data['pic'] = '/Public/Uploads/'.$info['savepath'].$info['savename'];
                }
            }
            $Article->where("id=".$id)->save($data);
            $this->success("更新成功!",U('lst'));

            return;
        }
        //若是get,回显数据
        $article = $Article->where("id=".$id)->find();
        $Cate = M('Cate');
        $cateList = $Cate->select();
        $currentCate = $Cate->where("id=".$cateid)->find();
        $this->assign("article",$article);
        $this->assign('cateList',$cateList);
        $this->assign('currentCate',$currentCate);
        $this->display();
    }
    public function add()
    {
        if (IS_POST) {
            $Article = D('Article');
            $data['title'] = I('title');
            $data['content'] = I('content');
            $data['desc'] = I('desc');
            $data['cateid'] = I('cateid');
            $data['author'] = session("username");
            $data['itime'] = date("Y-m-d")." ".date("h:i:sa");
            if ($_FILES['pic']['tmp_name']!='') {
                $upload = new \Think\Upload();
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                // $upload->savepath = '/Public/Uploads';
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $data['pic'] = '/Public/Uploads/'.$info['savepath'].$info['savename'];
                }
            }
            if ($Article->create($data)) {
                if ($Article->add()) {
                    $this->success('添加文章成功!',U('lst'));
                }else{
                    $this->error('添加文章失败!');
                }

            }else{
                $this->error($Article->getError());
            }
            return;
        }
        $Cate = M('Cate');
        $cateList = $Cate->select();
        $this->assign('cateList',$cateList);
        $this->display();
    }
}