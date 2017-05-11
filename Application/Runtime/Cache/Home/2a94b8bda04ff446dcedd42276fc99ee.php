<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <title>时光电影推荐网</title>
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="/Public/bootstrap/js/bootstrap.js" rel="stylesheet"/>
    <link href="/Public/html/css/index.css" rel="stylesheet">
<!--    <script src="/Public/html/js/jquery2.0.min.js"></script>-->
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
                <?php if(empty($username)): ?><li><a href="/index.php/Home/Function/register">注册</a></li>
                    <li><a href="/index.php/Home/Function/login">登陆</a></li>
                    <?php else: ?>
                    <li><a>你好,<?php echo ($username); ?></a></li>
                    <li><a href="/index.php/Home/Recommend">精心推荐</a></li>
                    <li><a href="/index.php/Home/User/index">个人中心</a></li>
                    <li><a href="/index.php/Home/Index/destroy">退出</a></li><?php endif; ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div style="margin-left: 170px">
        <div class="btn-group" data-toggle="buttons">
            <a class="btn btn-info active" href="/index.php/Home/Index/tags?cat=最新">
                <input type="checkbox" autocomplete="off" checked> 最新
            </a>
            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=热门">
                <input type="checkbox" autocomplete="off"> 热门
            </a>
            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=经典">
                <input type="checkbox" autocomplete="off">经典
            </a>
            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=爱情">
                    <input type="checkbox" autocomplete="off"> 爱情
            </a>
            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=喜剧">
                <input type="checkbox" autocomplete="off">喜剧
            </a>

            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=动作">
                <input type="checkbox" autocomplete="off">动作
            </a>

            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=科幻">
                <input type="checkbox" autocomplete="off">科幻
            </a>

            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=文艺">
                <input type="checkbox" autocomplete="off">文艺
            </a>
            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=战争">
                <input type="checkbox" autocomplete="off">战争
            </a>
            <a class="btn btn-Success" href="/index.php/Home/Recommend">
            <input type="checkbox" autocomplete="off"> 登陆后为您精心推荐
        </a>

        </div>
    </div>
    <hr>
<div class="center-block">
    <div class="index_content">
        <div class="index_content_movie">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="index_content_movie_pic" id="<?php echo ($vo["id"]); ?>">
                <a href="/index.php/Home/Index/getDetail?id=<?php echo ($vo["id"]); ?>">
                <img src="<?php echo ($vo["cover"]); ?>" height="190" width="160">
                <div style="text-align:center">
                    <?php echo ($vo["title"]); ?>
                    <strong style="color: #e09015"><?php echo ($vo["rate"]); ?></strong>
                </div>
                </a>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<hr>
<div class="Pagination">
    <?php echo ($page); ?>
</div>
</body>
</html>