<?php
return array(
	'TMPL_PARSE_STRING' => array(
	'__PUBLIC__'=>SITE_URL.'/Application/Admin/Public',//更改默认模板路径
	 ),
	//伪静态后缀管控
	'URL_HTML_SUFFIX'=>'html|htm|shtml',
	//配置数据库的链接信息
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'blog',
	'DB_USER' => 'root',
	'DB_PWD' => 'YG.1125',
	'DB_PORT' => 3306,
	'DB_PREFIX' => 'blog_',//数据库前缀
	'DB_CHARSET' => 'utf8',
	'DB_DEBUG' => TRUE,
);