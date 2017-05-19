<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增电影</title>
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/Public/bootstrap/js/bootstrap.js" rel="stylesheet"/>


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

<div style="width: 60%">
    <form method="post" action="/index.php/Home/Admin/doadd">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">电影名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="title" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-sm-2 control-label">电影分类</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="category" name="category" placeholder="category">
            </div>
        </div>
        <div class="form-group">
            <label for="rate" class="col-sm-2 control-label">评分</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rate" placeholder="rate" name="rate">
            </div>
        </div>

        <div class="form-group">
            <label for="director" class="col-sm-2 control-label">导演</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="director"  placeholder="director" name="director">
            </div>
        </div>

        <div class="form-group">
            <label for="actor" class="col-sm-2 control-label">演员</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="actor"  placeholder="张山 / 李四" name="actor">
            </div>
        </div>

        <div class="form-group">
            <label for="actor" class="col-sm-2 control-label">类型</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="style"  placeholder="喜剧 / 爱情" name="style">
            </div>
        </div>

        <div class="form-group">
            <label for="country" class="col-sm-2 control-label">国家</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="country"  placeholder="country" name="country">
            </div>
        </div>
        <div class="form-group">
            <label for="country" class="col-sm-2 control-label">上映时间</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="time"  placeholder="2017-12-21" name="time">
            </div>
        </div>

        <div class="form-group">
            <label for="country" class="col-sm-2 control-label">电影简介</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="brief"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-default">提交</button>
    </form>


</div>

</body>
</html>