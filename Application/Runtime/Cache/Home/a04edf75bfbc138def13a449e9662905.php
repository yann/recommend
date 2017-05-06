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
               <!-- <?php if(empty($username)): ?><li><a href="/index.php/Home/Function/register">注册</a></li>
                    <li><a href="/index.php/Home/Function/login">登陆</a></li>
                    <?php else: ?>
                    <li><a>你好,<?php echo ($username); ?></a></li>
                    <li><a href="/index.php/Home/User/index">个人中心</a></li><?php endif; ?>

-->

                <?php if(empty($username)): ?><li><a href="/index.php/Home/Function/register">注册</a></li>
                    <li><a href="/index.php/Home/Function/login">登陆</a></li>
                    <?php else: ?>
                    <li><a href="/index.php/Home/Recommend">精心推荐</a></li>
                    <li><a href="/index.php/Home/User/index">个人中心</a></li>
                    <li><a>你好,<?php echo ($username); ?></a></li><?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<hr>
<p><button type="button" class="btn btn-success">正在为您精心推荐：</button></p>

<div class="center-block">
    <div class="index_content">
        <div class="index_content_movie">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="index_content_movie_pic" id="<?php echo ($vo["id"]); ?>">
                    <a href="/index.php/Home/Index/getDetail?id=<?php echo ($vo["id"]); ?>">
                        <img src="<?php echo ($vo["cover"]); ?>" height="200" width="160">
                        <div style="text-align:center">
                            <?php echo ($vo["title"]); ?>
                          <!--  <strong style="color: #e09015"><?php echo ($vo["rate"]); ?></strong>-->
                        </div>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>

</body>
</html>