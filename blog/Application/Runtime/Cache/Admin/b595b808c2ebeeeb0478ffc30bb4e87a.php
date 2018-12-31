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
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span style="color: red">个人博客</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    
                    <a href="/Admin/Article/lst"><i class="icon-font">&#xe005;</i>新增博文</a>
                    <a href="/Admin/Cate/lst"><i class="icon-font">&#xe048;</i>新增博客分类</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.4 (Win64) PHP/3.2.3</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                    </li>
                    
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info">
                            <?php
 echo date("Y-m-d")." ".date("h:i:sa"); ?>
                                
                            </span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info"><?php
 echo $_SERVER['SERVER_NAME']; ?>
                        </span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info"><?php echo $_SERVER['HTTP_HOST'];?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">站长QQ：</label><span class="res-info">843042427</span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>