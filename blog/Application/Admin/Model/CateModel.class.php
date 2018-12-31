<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {
    protected $_validate = array(
     array('title','require','类型不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一
     array('title','require','该类型已经存在！',0,'unique',1), 
   );
}