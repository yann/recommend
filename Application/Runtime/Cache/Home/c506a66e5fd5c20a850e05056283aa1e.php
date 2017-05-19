<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/Public/bootstrap/js/bootstrap.js" rel="stylesheet"/>
    <title>电影管理后台</title>
    <style>

        #header{
            width:100%;
            text-align:end;
            margin-top:20px;
            margin-right: 100px;
        }
        li{
            display:inline;
        }
        li a{
            margin:10px;
        }
        #content{
            width:600px;
            height:200px;
            margin:0 auto 250px;
        }
        #content img{
            margin-bottom:60px;
        }
        #search{
            line-height:30px;
            float:left;
            border:1px solid #00F;
        }

    </style>
</head>

<body>

<div id="header">
    <ul>
        <li>欢迎你 admin &nbsp &nbsp</li>
    </ul>
</div>

<div id="content" style="text-align: center">
    <h3>电影管理后台</h3>
    <br>
    <div>
    <img height="60px" src="/Public/html/image/avatar.jpg" />
    </div>
    <div id="searchitem">
        <form method="post" action="/index.php/Home/Admin/searchMovie">
        <input  id="search" name="movie"  size="65">
        <input type="submit" value="搜索电影" class="btn btn-primary">
        <a href="/index.php/Home/Admin/addMovie" class="btn btn-primary"> 添加电影</a>
        </form>
    </div>
</div>
</body>
</html>