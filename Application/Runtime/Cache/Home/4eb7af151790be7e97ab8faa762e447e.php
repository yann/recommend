<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <title>时光电影推荐网</title>
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="/Public/bootstrap/js/bootstrap.js" rel="stylesheet"/>
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

    <div style="margin-left: 170px">
        <div class="btn-group" data-toggle="buttons">
            <a class="btn btn-info active" href="/">
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
            <a class="btn btn-info" href="/index.php/Home/Index/tags?cat=情色">
                <input type="checkbox" autocomplete="off">情色
            </a>
            <a class="btn btn-Success">
            <input type="checkbox" autocomplete="off"> 登陆更多推荐
        </a>

        </div>
    </div>
    <hr>

<div style="width:1000px;  height:300px ;margin-left: 100px">
    <?php if(is_array($detail)): $i = 0; $__LIST__ = $detail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="float:left ;  width:50%;  height:100%;text-align: center">
            <div id="<?php echo ($vo["id"]); ?>" style="width: 200px;margin-left: 200px;margin-top: 30px">
                <img src="<?php echo ($vo["cover"]); ?>" height="210" width="160">
                <div >
                    <strong style="color: #e09015">评分：<?php echo ($vo["rate"]); ?></strong>
                </div>
            </div>
    </div>
    <div  style="float:left ;  width:50%; height:100%;margin-top: 30px">
        <div id="info">
            <h1>
                <span><?php echo ($vo["title"]); ?></span>
                <span class="year">(2017)</span>
            </h1>
            <div >
                    <span class="p1">
                        导演:
                        <span class="attrs">
                            <?php echo ($vo["director"]); ?>
                        </span>
                    </span>

                <br/>
                <span class="actor">
                        <span class="p1">主演</span>
                        <span class="attrs">
                            <?php echo ($vo["actor"]); ?>
                        </span>
                    </span>
                <br/>
                <span class="p1">
                        类型:
                        <span class="attrs">
                            <?php echo ($vo["style"]); ?>
                        </span>
                    </span>
                <br/>
                <span class="p1">
                        国家:
                        <span class="attrs">
                            <?php echo ($vo["country"]); ?>
                        </span>
                    </span>
                <br/>

                <span class="p1">
                        上映时间:
                        <span class="attrs">
                            <?php echo ($vo["time"]); ?>
                        </span>
                    </span>
                <br/>
            </div>
        </div>
    </div>

        <div>
        <div id="brief">
            <p>
                <?php if(empty($brief)): ?>暂无简介。。。
                    <?php else: ?>
                    <?php echo ($brief); endif; ?>

            </p>
        </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>
</body>
</html>