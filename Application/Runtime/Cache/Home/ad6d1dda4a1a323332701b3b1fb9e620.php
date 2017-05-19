<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>Title</title>
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/Public/bootstrap/js/bootstrap.js" rel="stylesheet"/>

</head>
<body></body>
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
<div style="width:1000px;  height:300px ;margin-left: 100px">
    <?php if(is_array($detail)): $i = 0; $__LIST__ = $detail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="float:left ;  width:50%;  height:100%;text-align: center">
            <div id="<?php echo ($vo["id"]); ?>" style="width: 200px;margin-left: 200px;margin-top: 30px">
                <input type="hidden" value="<?php echo ($vo["id"]); ?>" id="movie_id">
                <img src="<?php echo ($vo["cover"]); ?>" height="210" width="160">
                <div >
                    <strong style="color: #e09015">大众评分：<?php echo ($vo["rate"]); ?></strong>
                </div>
            </div>
        </div>
        <div  style="float:left ;  width:50%; height:100%;margin-top: 30px">
            <div id="info">
                <div>
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
                </div></div>

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
<!-- Modal -->




</body>
</html>

<script>
    $(function () {
        $("#score").click(function () {
            var id =  $("#movie_id").val();
            $.post(
                "/index.php/Home/Recommend/check",
                {"movie_id" : id},
                function (data){
                    if (data.code == 'error'){
                        swal('Oops...', '请先登录!', 'error');
                    }
                    else{
                        swal({
                            title: '请输入您的评分',
                            input: 'text',
                            confirmButtonText: '确定',
                            cancelButtonText:  '取消',
                            /*     showCancelButton: true,*/
                            confirmButtonColor: '#4cd964',
                            cancelButtonColor: 'gray',
                            inputValidator: function(value) {
                                return new Promise(function(resolve, reject) {
                                    if(value) {
                                        if (value > 10 || value < 0) {
                                            reject('请输0-10的评分！');
                                        }
                                        else {
                                            resolve();
                                        }
                                    } else {
                                        reject('至少要输入一个数值！');
                                    }
                                });
                            }
                        }).then(function(result) {
                            $.post("/index.php/Home/Recommend/score",
                                {"movie_id" : id,"score":result},function (res) {
                                    swal({
                                        title : res.msg
                                    }).then(function () {
                                        window.location.href="/index.php/Home/Recommend/index";
                                    });

                                },'Json');
                        });
                    }
                },"Json"
            )
        })
    })
</script>