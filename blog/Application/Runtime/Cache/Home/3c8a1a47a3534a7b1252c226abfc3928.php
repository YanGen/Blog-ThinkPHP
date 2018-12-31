<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Younger-个人博客</title>
</head>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/article_detail.css"/>
<link href="logo.ico" rel="shortcut icon"/>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="plugin/jquery.page.js"></script>-->
<script src="/Public/js/common.js"></script>
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
				
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li><a href="#">文章</a></li>
				  <li class="active"><?php echo ($article["title"]); ?></li>
				  <span class="w_navbar_tip">长路漫漫，只因学无止境。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="c_titile"><?php echo ($article["title"]); ?></h2>
							<p class="box_c"><span class="d_time">发布时间：<?php echo ($article["itime"]); ?></span><span>编辑：<a><?php echo ($article["author"]); ?></a></span><span>阅读（<?php echo ($article["iread"]); ?>）</span></p>
							<ul class="infos">
							
							<?php echo (htmlspecialchars_decode($article["content"])); ?>
								
							</ul>
															
							
							
							
							
							<!-- <div class="nextinfo">
								<p class="last">上一篇：<a href="#">免费收录网站搜索引擎登录口大全</a></p>
								<p class="next">下一篇：<a href="#">javascript显示年月日时间代码</a></p>
						    </div> -->
							
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-body">
							
								
					<!--畅言评论框--PC和WAP自适应版-->

			<div id="SOHUCS" sid="<?php echo ($article["id"]); ?>" ></div>
			<script type="text/javascript"> 
				(function(){ 
					var appid = 'cytCpaKPA'; 
					var conf = 'prod_966bee5514d6814c0c43eab2591d4787'; 
					var width = window.innerWidth || document.documentElement.clientWidth; 
					if (width < 960) { 
					window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("http://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>

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