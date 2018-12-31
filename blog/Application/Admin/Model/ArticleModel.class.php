<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {
    protected $_validate = array(
     array('title','require','标题不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一
     array('title','require','该标题已经存在！',0,'unique',1), 
     array('cateid','require','类型不能为空！',1,'regex',3),
     array('content','require','文章不能为空！',1,'regex',3),
   );
}