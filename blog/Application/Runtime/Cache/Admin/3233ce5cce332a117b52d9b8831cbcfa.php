<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Application/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
<body>
    <!-- 头部 -->
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/Admin/index">首页</a></li>
                <li><a href="/index" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员<?php echo $_SESSION['username']; ?></a></li>
                <!-- <li><a href="#">修改密码</a></li> -->
                <li><a href="/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <!-- 左侧菜单 -->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font"></i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/Admin/Article/lst.html"><i class="icon-font"></i>博文管理</a></li>
                        <li><a href="/Admin/Cate/lst.html"><i class="icon-font"></i>分类管理</a></li>
                        <li><a href=""><i class="icon-font"></i>留言管理</a></li>
                        <li><a href=""><i class="icon-font"></i>评论管理</a></li>
                        <li><a href="/Admin/Link/lst.html"><i class="icon-font"></i>友情链接</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font"></i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="/Admin/Index/index.html"><i class="icon-font"></i>系统设置</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">博文管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择博文:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" action="/Admin/Article/sot" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/Admin/Article/add"><i class="icon-font"></i>新增博文</a>
                    </div>
                </div>

                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>                            
                            <th>标题</th>
                            <th>作者</th>
                            <th>缩略图</th>
                            <th>类别</th>
                            <th>创建时间</th>
                            <th>阅读量</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($ArticleList)): $i = 0; $__LIST__ = $ArticleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><tr>
                            <td title="<?php echo ($article["title"]); ?>"><a target="_blank" href="#" title=""></a><?php echo ($article["title"]); ?>
                            </td>
                            <td title="作者"><a target="_blank" href="#" title=""></a><?php echo ($article["author"]); ?>
                            </td>
                            <td title="缩略图">
                                <?php if($article['pic'] != ''): ?><img src="<?php echo ($article["pic"]); ?>" height="50">
                                    <?php else: ?>
                                        无缩略图..<?php endif; ?>
                            </td>
                            <td title="类别"><a target="_blank" href="#" title=""></a><?php echo ($article["cate"]); ?>
                            </td>
                            <td><?php echo ($article["itime"]); ?></td>
                            <td title="阅读量"><a target="_blank" href="#" title=""></a><?php echo ($article["iread"]); ?>
                            </td>
                            <td>
                                <a class="link-update" href="/Admin/Article/upd?cateid=<?php echo ($article["cateid"]); ?>&id=<?php echo ($article["id"]); ?>">修改</a>
                                <a class="link-del" onclick="return confirm('确认删除?');" href="/Admin/Article/del/id/<?php echo ($article["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"><?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>