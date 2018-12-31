<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Younger个人博客</title>
</head>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/moodList.css"/>
<link rel="stylesheet" href="/Public/plugin/jquery.page.css">
<link href="logo.ico" rel="shortcut icon"/>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/plugin/jquery.page.js"></script>
<script src="/Public/js/common.js"></script>
<!--<script src="js/snowy.js"></script>-->
<script type="text/javascript">
	
$(function(){
	$("#page").Page({
	  totalPages: 7,//分页总数
	  liNums: 5,//分页的数字按钮数(建议取奇数)
	  activeClass: 'activP', //active 类样式定义
	  callBack : function(page){
			//console.log(page)
	  }
  });
})
</script>

<body>
	<div class="w_header">
			<div class="container">
				<div class="w_header_top">
					
				<!-- <a href="#" class="w_logo"></a>	 -->
				<span class="w_header_nav">
					<ul>
						<li><a href="/index" class="active">首页</a></li>
						<li><a href="/Home/article/lst.html">博文</a></li>
						<li><a href="/Home/mood.html">动态</a></li>
						<li><a href="/Home/about.html">关于</a></li>
						<li><a href="/Home/comment/lst.html">留言</a></li>
					</ul>
				</span>
					<div class="w_search">
						<div class="w_searchbox">
							<input type="text" placeholder="search" />
							<button>搜索</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="w_container">
		<div class="container">
			<div class="row w_main_row">
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li class="active">说说</li>
				  <span class="w_navbar_tip">可以行云流水，也可碎言碎语</span>
				</ol>
					

			<div class="bloglist">
				
			    <ul class="arrow_box">
			     <div class="sy">
			     <img src="/Public/img/slider/bb.jpg">
			      <p> Thinks would be otherwise ~</p>
			     </div>
		      	<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">Younger</a></span>
			      <span class="dateview">2018-5-16</span>
			    </ul>

		  </div>
		  
			
			<div class="page">
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<?php echo ($page); ?>
					</ul>
				</nav>
			</div>
			
			
			
			</div>
		</div>
	</div>
	<div class="w_foot">
			<div class="w_foot_copyright">- <span>-</span>
				<a target="_blank" href="http://www.miitbeian.gov.cn/" rel="nofollow">-</a>
			</div>
		</div>
	<!--toTop-->
	<div id="shape">
		<div class="shapeColor">
			<div class="shapeFly">
			</div>
		</div>
	</div>
	<!--snow-->
	<!--<div class="snow-container"></div>-->
</body>
</html>