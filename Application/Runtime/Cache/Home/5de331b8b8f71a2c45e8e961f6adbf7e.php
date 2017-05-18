<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>个人记录</title>
    <script type="text/javascript" src="/Public/html/js/jquery2.0.min.js"></script>
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="/Public/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/html/dist/js/bootstrap-select.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/html/dist/css/bootstrap-select.css">

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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <?php if(empty($username)): ?><li><a href="/index.php/Home/Function/register">注册</a></li>
                <li><a href="/index.php/Home/Function/login">登陆</a></li>
                <?php else: ?>
                <li><a>你好,<?php echo ($username); ?></a></li>
                <li><a href="/index.php/Home/Recommend">精心推荐</a></li>
                <li><a href="/index.php/Home/User/index">信息设置</a></li>
                <li><a href="/index.php/Home/History/index">个人记录</a></li>
                <li><a href="/index.php/Home/Index/destroy">退出</a></li><?php endif; ?>
        </ul>
    </div><!-- /.navbar-collapse -->
    </div>
</nav>
<div style="float: left;width: 50%">
<h4>我的评分记录</h4>
    <table class="table table-hover" style="width: 80%">
        <tr>
            <th>电影</th>
            <th>评分</th>
            <th>类型</th>
        </tr>
        <?php if(is_array($score)): $i = 0; $__LIST__ = $score;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["movie_name"]); ?></td>
                <td><?php echo ($vo["score"]); ?></td>
                <td><?php echo ($vo["movie_style"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

</div>
<div style="float: left;width: 50%;">
    <h4>我的兴趣值</h4>
    <table class="table table-bordered" style="width: 80%">
        <tr>
            <th>用户</th>
            <th>标签</th>
            <th>兴趣值</th>
        </tr>
        <?php if(is_array($taste)): $i = 0; $__LIST__ = $taste;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["user_name"]); ?></td>
                <td><?php echo ($v["tags"]); ?></td>
                <td><?php echo ($v["value"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
</body>
</html>