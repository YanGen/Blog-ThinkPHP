<?php
namespace Home\Model;
use Think\Model\ViewModel;
class ArticleViewModel extends ViewModel {
    public $viewFields = array(
    'Article'=>array('id','title','author','pic','iread','itime','cateid','_type'=>'LEFT'),
    'Cate'=>array('title'=>'cate','_on'=>'Cate.id=Article.cateid'),
   );
}