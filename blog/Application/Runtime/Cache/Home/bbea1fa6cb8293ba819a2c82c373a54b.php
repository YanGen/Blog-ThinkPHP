<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Younger个人博客</title>
</head>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/article.css"/>
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
				  <li class="active">文章</li>
				  <span class="w_navbar_tip">长路漫漫，只因学无止境。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left">
					<div class="panel panel-default">
					  <div class="panel-body contentList">
					  	<?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
											<div class="panel-body">
												<div class="contentleft">
													<h4><a class="title" href="detail.html?id=<?php echo ($article["id"]); ?>"><?php echo ($article["title"]); ?></a></h4>
													<p>
														<a class="label label-default"><?php echo ($article["cate"]); ?></a>
														
													</p>
													<p class="overView"><?php echo ($article["desc"]); ?></p>
													<p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#"><?php echo ($article["author"]); ?></a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:<?php echo ($article["iread"]); ?></span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span><span class="count"><i class="glyphicon glyphicon-time"></i><?php echo ($article["itime"]); ?></span></p>
												</div>
												<div class="contentImage">
													<div class="row">
													<?php if($article['pic'] != ''): ?><a class="thumbnail w_thumbnail">
															<img src="<?php echo ($article["pic"]); ?>" alt="..." width="20" height="20">
														</a>
														<?php else: endif; ?>
													</div>
												</div>
											</div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
					    
						<!--<div class="page">
							<nav aria-label="Page navigation">
						  <ul class="pagination">
						    <li>
						      <a href="#" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <li class="active"><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
						  </ul>
						</nav>
						</div>-->
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
			<!--左侧开始-->
					<div class="col-lg-3 col-md-3 w_main_right">

						<div class="panel panel-default sitetip">
							<a>
								<strong>站点公告</strong>
								<h3 class="title"><?php echo ($notice["title"]); ?></h3>
								<p class="overView"><?php echo ($notice["content"]); ?></p>
							</a>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">热门标签</h3>
							</div>
							<div class="panel-body">
								<div class="labelList">
									<?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><a class="label label-default" href="#"><?php echo ($cate["title"]); ?>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</div>



						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">友情链接</h3>
							</div>
							<div class="panel-body">
								<div class="newContent">
									<ul class="list-unstyled sidebar shiplink">
										<?php if(is_array($linkList)): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><li>
											<a href="<?php echo ($link["url"]); ?>" target="_blank"><?php echo ($link["title"]); ?></a>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">关注微信公众号</h3>
							</div>
							<div class="panel-body">
								<img src="/Public/img/qrcode.jpg" style="height: 230.5px;width: 230.5px;" />
							</div>
						</div>

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