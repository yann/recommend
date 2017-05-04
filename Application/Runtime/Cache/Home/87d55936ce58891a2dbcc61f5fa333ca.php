<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <title>时光电影推荐网</title>
    <script type="text/javascript" src="/Public/html/js/jquery2.0.min.js"></script>
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="/Public/bootstrap/js/bootstrap.js"></script>
    <link href="/Public/html/css/index.css" rel="stylesheet">

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">时光电影推荐网</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-left" action="/index.php/Home/Index/search" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索想看的电影" name="movie">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/index.php/Home/Function/register">注册</a></li>
                <li><a href="/index.php/Home/Function/login">登陆</a></li>
                <!--  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                      </ul>
                  </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<hr>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/Public/html/css/login.css"/>
    <script type="text/javascript" src="/Public/html/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/Public/html/js/login.js"></script>
</head>
<body>
<div id="home">
    <form id="login" class="current1" method="post" action="/index.php/Home/Function/dologin">
        <input type="hidden" name="token" value="<?php echo ($token); ?>">
        <h3>用户登入</h3>
        <img class="avator" src="/Public/html/image/avatar.jpg" width="96" height="96"/>
       <input type="text" name="username" style="width:215px;" placeholder="邮箱/名称" />
       <input type="password" name="password"  placeholder="密码" style="width:215px;"/>
        <!--<button type="button">登入</button>-->
        <input type="submit" id="button" value="登录" style="width: 215px">
    </form>
</div>
</body>
</html>