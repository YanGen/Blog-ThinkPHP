<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Younger-个人博客</title>
	</head>

	<link href="Public/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Public/css/common.css" />
	<link href="Public/logo/logo.ico" rel="shortcut icon" />
	<script src="Public/plugin/jquery.min.js"></script>
	<script src="Public/plugin/bootstrap/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="plugin/jquery.page.js"></script>-->
	<!--<script src="js/common.js"></script>-->
	<!--<script src="js/snowy.js"></script>-->

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
					<div class="col-lg-9 col-md-9 w_main_left">
						<!--滚动图开始-->
						<div class="panel panel-default">

							<div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#w_carousel" data-slide-to="0" class="active"></li>
									<li data-target="#w_carousel" data-slide-to="1"></li>
									<li data-target="#w_carousel" data-slide-to="2"></li>
									<li data-target="#w_carousel" data-slide-to="3"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="Public/img/slider/slide1.jpg" alt="...">
										<div class="carousel-caption">
											<h3>First slide label</h3>
											<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
										</div>
									</div>
									<div class="item">
										<img src="Public/img/slider/slide2.jpg" alt="...">
										<div class="carousel-caption">...</div>
									</div>
									<div class="item">
										<img src="Public/img/slider/slide3.jpg" alt="...">
										<div class="carousel-caption">...</div>
									</div>
									<div class="item">
										<img src="Public/img/slider/slide4.jpg" alt="...">
										<div class="carousel-caption">...</div>
									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#w_carousel" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#w_carousel" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>

						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">最新发布</h3>
							</div>

							<div class="panel-body">

								<!--文章列表开始-->
								<div class="contentList">
									<?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
											<div class="panel-body">
												<div class="contentleft">
													<h4><a class="title" href="/Home/article/detail.html?id=<?php echo ($article["id"]); ?>"><?php echo ($article["title"]); ?></a></h4>
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

								</div>
								<!--文章列表结束-->

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
	</body>
	<script type="text/javascript">
		var $backToTopEle = $('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^</a>').appendTo($("body")).click(function() {
			$("html, body").animate({ scrollTop: 0 }, 120);
		});
		var backToTopFun = function() {
			var st = $(document).scrollTop(),
				winh = $(window).height();
			(st > 0) ? $backToTopEle.show(): $backToTopEle.hide();
			/*IE6下的定位*/
			if(!window.XMLHttpRequest) {
				$backToTopEle.css("top", st + winh - 166);
			}
		};

		$(function() {
			$(window).on("scroll", backToTopFun);
			backToTopFun();
		});
	</script>

</html>