<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/Public/bootstrap/js/bootstrap.js" rel="stylesheet"/>
    <link href="/Public/html/css/index.css" rel="stylesheet">
</head>
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
            <a class="navbar-brand" href="#">电影管理后台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/index.php/Home/Admin">回到主页</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">欢迎你 admin</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="center-block">
    <div class="index_content">
        <div class="index_content_movie">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="index_content_movie_pic" id="<?php echo ($vo["id"]); ?>">
                    <a>
                        <img src="<?php echo ($vo["cover"]); ?>" height="190" width="160">
                        <div style="text-align:center">
                            <?php echo ($vo["title"]); ?>
                        </div>
                    </a>
                    <a href="/index.php/Home/Admin/update?id=<?php echo ($vo["id"]); ?>" class="btn btn-info">更新</a>
                    <a  href="/index.php/Home/Admin/delete?id=<?php echo ($vo["id"]); ?>" class="btn btn-danger">删除</a>

                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
</body>
</html>