<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员登录</title>
    <link href="/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body{
            margin-left:auto;
            margin-right:auto;
            margin-TOP:100PX;
            width:20em;
        }
    </style>
</head>
<body>
<form method="post" action="/index.php/Home/Admin/dologin">
<hr>
    <h4>管理员登录</h4>
    <hr>
<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">@</span>
    <input id="userName" name="username" type="text" class="form-control" placeholder="用户名" aria-describedby="basic-addon1">
</div>
<br>
<!--下面是密码输入框-->
<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">@</span>
    <input id="passWord" name="password" type="password" class="form-control" placeholder="密码" aria-describedby="basic-addon1">
</div>
<br>
<!--下面是登陆按钮,包括颜色控制-->
<input type="submit" style="width:280px;" class="btn btn-default">
</form>
</body>
</html>