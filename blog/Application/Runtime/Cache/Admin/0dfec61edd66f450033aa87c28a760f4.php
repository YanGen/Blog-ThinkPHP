<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="/Application/Admin/Public/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" value="" id="password" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="yzm">验证码：</label>
                        <input type="verify" name="verify" value="" id="verify" size="10" class="admin_input_style" />
                        <img src="/Admin/Login/verify" onclick="this.src='/Admin/Login/verify?id='+Math.random();" style="cousor:pointer;" height="60" width="140" >
                     <!--    <img src="<?php echo U('Admin/verify');?>" class="verifyCode" name="admin_verify" title="点击刷新验证码" onclick="this.src='/Admin/Login/verify?id='+Math.random();"> -->
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>