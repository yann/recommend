<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>个人中心</title>
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
    </div>
</nav>
<hr/>
<div style="width: 40%;margin:0 auto" >

    <h3 style="text-align: center">修改个人信息</h3>
    <br/>
    <form method="post" action="/index.php/Home/User/change">
        <?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="input-group">
                <span class="input-group-addon" >昵称</span>
                <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id">
                <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon2" value="<?php echo ($vo["username"]); ?>" >
            </div>
            <p></p>
            <div class="input-group">
                <span class="input-group-addon" >邮箱</span>
                <input type="text"  class="form-control" placeholder="Username" aria-describedby="sizing-addon2" value="<?php echo ($vo["email"]); ?>" disabled="disabled">
                <input type="hidden" name="email" value="<?php echo ($vo["email"]); ?>">
            </div>
            <p></p>
            <div class="input-group">
                <span class="input-group-addon" >密码</span>
                <input type="text"  name="password" class="form-control" placeholder="Username" aria-describedby="sizing-addon2" value="<?php echo ($vo["password"]); ?>">
            </div>
            <p></p>
            <div class="input-group">
                <span class="input-group-addon" >年龄</span>
                <input type="text" name="age" class="form-control" placeholder="Username" aria-describedby="sizing-addon2" value="<?php echo ($vo["age"]); ?>">
            </div>
            <p></p>
            <div class="input-group">
                <span class="input-group-addon">性别</span>
                <select class="form-control" name="sex">
                    <option value="1" selected="selected">男</option>
                    <option value="0">女</option>
                </select>
            </div>
            <p></p>

            <div class="input-group">
                <span class="input-group-addon" >标签</span>
                <input type="text" class="form-control"  aria-describedby="sizing-addon2" value=" <?php echo ($vo["tag"]); ?>" disabled="disabled">
                <input type="hidden"  name="tag" value=" <?php echo ($vo["tag"]); ?>">
            </div>
            <p></p>

            <div class="input-group" >
                <span class="input-group-addon">标签</span>
                <span class="control-group" style="width: 200px">
                  <label for="tags"></label>
                <select  id="tags" class="selectpicker" multiple data-max-options="3" name="tags[]" style="width: 200px">
                    <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option name="tag"  value="<?php echo ($voo["tag"]); ?>" ><?php echo ($voo["tag"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
              </span>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <br/>
    <button type="submit" class="btn btn-default">确认修改</button>
        <a  href="/" class="btn btn-default">回到主页 </a>
        <a  href="/index.php/Home/Recommend" class="btn btn-default">回到推荐 </a>
</form>
</div>


</body>
</html>

<script type="text/javascript">
    $(window).on('load', function () {
        $('.selectpicker').selectpicker({
            'selectedText': 'cat'

        });

    });

</script>