<?php if (!defined('THINK_PATH')) exit();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/Public/html/css/login.css"/>
    <script type="text/javascript" src="/Public/html/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/Public/html/js/login.js"></script>
</head>
<body>
<div id="home">
    <form id="login" class="current1" method="post" action="/login/check">

        <input type="hidden" name="token" value="<?php echo ($token); ?>">
        <h3>用户登入</h3>
        <img class="avator" src="/Public/html/image/avatar.jpg" width="96" height="96"/>
        <label>邮箱/名称<input type="text" name="username" style="width:215px;" /><span>邮箱为空</span></label>
        <label>密码<input type="password" name="password"  /><span>密码为空</span></label>
        <!--<button type="button">登入</button>-->
        <input type="submit" id="button" value="登录">
    </form>
</div>
</body>
</html>