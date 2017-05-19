<?php if (!defined('THINK_PATH')) exit();?>﻿
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
                    <li><a>你好,<?php echo ($username); ?></a></li>
                    <li><a href="/index.php/Home/Recommend">精心推荐</a></li>
                    <li><a href="/index.php/Home/User/index">信息设置</a></li>
                    <li><a href="/index.php/Home/History/index">个人记录</a></li>
                    <li><a href="/index.php/Home/Index/destroy">退出</a></li><?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<hr>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/html/css/jq22.css" rel="stylesheet" type="text/css" />
  <link href="/Public/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
   <script language='javascript' src="/Public/html/js/jq22.js"></script>
  <script type="text/javascript" src="/Public/html/dist/js/bootstrap-select.js"></script>
  <link rel="stylesheet" type="text/css" href="/Public/html/dist/css/bootstrap-select.css">
</head>
<div class='body_main'> 
  <!-- start main content -->
  <div class='index_box' style='margin-top:20px;'>
    <div style="position:fixed;color:red;margin:70px 0 0 450px;font-size:16px;Z-index:100;display:block;" id="hint"></div>
    <div class='box_title'>
      <div class='text_content'>
        <h1>用户注册表单验证</h1>
      </div>
    </div>
    <div class='box_main'>
      <div id="register" class="register">
        <form id="form" action="/index.php/Home/Function/doregister" method="post" onSubmit="return check();">
          <div id="form_submit" class="form_submit">
            <div class="fieldset">



              <div class="field-group">
                <label class="required title">性别</label>
                <span class="control-group" style="line-height:28px;">
                <input id="way_mobile" type="radio" value="1" name="sex" checked >
                男
                <input id="way_email" type="radio" value="0" name="sex">
                女 </span>
                <label class="tips" style="margin-bottom:5px;" id="tooltext1">请选择您的性别</label>
              </div>

              <div class="field-group">
                <label class="required title">邮箱</label>
                <span class="control-group" id="email_input">
                <div class="input_add_long_background">
                  <input class="register_input" type="text" id="email" name="email" maxLength="50" value="" onblur="__changeUserName('email');">
                </div>
                </span>
                <label class="tips">请输入您常用的邮箱</label>
              </div>

              <div class="field-group">
                <label class="required title">昵称</label>
                <span class="control-group" id="username_input">
                <div class="input_add_long_background">
                  <input class="register_input" type="text" id="username" name="username" maxLength="50" value="">
                </div>
                </span>
                <label class="tips">请输入您的昵称</label>
              </div>


              <div class="field-group">
                <label class="required title">年龄</label>
                <span class="control-group" id="age_input">
                <div class="input_add_long_background">
                  <input class="register_input" autocomplete="off" type="text" id="age" name="age" maxLength="50" value="">
                </div>
                </span>
                <label class="tips">请输入您的年龄</label>
              </div>

              <div class="field-group">
                <label class="required title">设置密码</label>
                <span class="control-group" id="password1_input">
                <div class="input_add_long_background">
                  <input class="register_input"  autocomplete="off" type="password" id="password1" name="password" maxLength="20" value="" onblur="checkPwd1(this.value);" />
                </div>
                </span>
                <label class="tips">请使用6~20个英文字母（区分大小写）、符号或数字</label>
              </div>

              <div class="field-group" >
                  <label class="required title">选择标签</label>
                  <span class="control-group" >
                  <label for="tags"></label>
                <select  id="tags" class="selectpicker" multiple data-max-options ="3" name="tags[]" >
                 <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option name="tag"  value="<?php echo ($vo["tag"]); ?>" ><?php echo ($vo["tag"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>-->
                </select>
              </span>
                <label class="tips">请选择3个喜欢的标签</label>
              </div>

            </div>
          </div>
          <div id="div_submit" class="div_submit">
            <div class='div_submit_button'>
             <!-- <a href="/index.php/Home/Function/login" id="login_button">登录</a>-->
              <input id="submit" type="submit" onsubmit="check()"  value="注册" class='button_button disabled'>
            </div>
          </div>
        </form>
      </div>

      <script type="text/javascript">
          $(window).on('load', function () {
              $('.selectpicker').selectpicker({
                    'selectedText': 'cat'

              });

          });

      </script>

      <script type="text/javascript">
      function check() {
          hideAllTooltips();
          var ckh_result = true;
          if ($('#email').val() == '') {
            showTooltips('email_input', '邮箱不能为空');
            ckh_result = false;
             return false;
             }
         if ($('#password1').val() == '') {
              showTooltips('password1_input', '密码不能为空');
              ckh_result = false;
              return false;
           }
          if ($('#username').val() == '') {
              showTooltips('username_input', '昵称不能为空');
              ckh_result = false;
              return false;
          }
          if ($('#age').val() == '') {
              showTooltips('age_input', '年龄不能为空');
              ckh_result = false;
              return false;
          }

             var email = $('#email').val();
          if (email.search(/^[\w\.+-]+@[\w\.+-]+$/) == -1) {
              showTooltips('email_input', '请输入正确的Email地址');
              return false;
          }

             var pwd1 = $("#password1").val();
                if (pwd1.search(/^.{6,20}$/) == -1){
          showTooltips('password1_input', '密码为空或位数太少');
          return false;
         }

          var age = $("#age").val();
         if (age.search(/^\d{2}$/) == -1){
             showTooltips('age_input', '年龄不正确');
             return false;
         }
          var tags = $("#tags").val();

      }




      </script>
          </div>
          <div class='box_bottom'></div>
        </div>
      </div>

      </body>
</html>