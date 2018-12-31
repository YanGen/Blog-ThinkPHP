<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Application/Admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <input type="hidden" name="id" value="<?php echo ($article["id"]); ?>">
                        <tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="cateid" id="cateid" class="required">
                                    <option value="<?php echo ($currentCate["id"]); ?>"><?php echo ($currentCate["title"]); ?></option>
                                    <?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["id"]); ?>"><?php echo ($cate["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo ($article["title"]); ?>" type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pic" id="pic" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>-->
                                    <?php if($article['pic'] != ''): ?><img src="<?php echo ($article["pic"]); ?>" height="80">
                                    <?php else: ?>
                                    无缩略图...<?php endif; ?>
                                </td>

                            </tr>
                            
                            <tr>
                                <th>摘要：</th>
                                <td><input type="text" value="<?php echo ($article["desc"]); ?>" name="desc" class="common-text" size="80" id="desc"></input></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" id="content"><?php echo ($article["content"]); ?></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
<script type="text/javascript">
    // UE.getEditor('content');
    UE.getEditor('content',{initialFrameWidth:1000,initialFrameHeight:200,});
</script>
</html>