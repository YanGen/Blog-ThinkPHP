<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model {
    protected $_validate = array(
     
     array('title','require','链接名不能为空！',1,'regex',3), 
     array('title','require','该链接名已经存在！',0,'unique',1), 
     array('url','require','链接不能为空！',1,'regex',3), 
 );
}