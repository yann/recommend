<?php if (!defined('THINK_PATH')) exit();?>﻿
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

<hr>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册表单验证</title>
<link href="/Public/html/css/jq22.css" rel="stylesheet" type="text/css" />
  <script language='javascript' src="/Public/html/js/jq22.js"></script>
</head>
<body>
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
                  <input class="register_input" type="text" id="username" name="email" maxLength="50" value="" onblur="__changeUserName('email');">
                </div>
                </span>
                <label class="tips">请输入您的昵称</label>
              </div>
           <!--   <div class="field-group">
                <label class="required title">第一次密码</label>
                <span class="control-group" id="password1_input">
                <div class="input_add_long_background">
                  <input class="register_input" type="password" id="password1" name="password1" maxLength="20" value="" onblur="checkPwd1(this.value);" />
                </div>
                </span>
                <label class="tips">请使用6~20个英文字母（区分大小写）、符号或数字</label>
              </div>-->
              <div class="field-group">
                <label class="required title">设置密码</label>
                <span class="control-group" id="password1_input">
                <div class="input_add_long_background">
                  <input class="register_input" type="password" id="password1" name="password1" maxLength="20" value="" onblur="checkPwd1(this.value);" />
                </div>
                </span>
                <label class="tips">请使用6~20个英文字母（区分大小写）、符号或数字</label>
              </div>
      <!--        <div class="field-group">
                <label class="required title">短信验证码</label>
                <span class="control-group" id="code_input">
                <div class="input_add_background" style="margin-right:15px;">
                  <input class="register_input_ot" type="text" id="code" name="code" max_length="6" value="" onblur="checkAuthCode(this.value);">
                </div>
                </span>
                <label class="tips">若尝试多次仍无法接收到短信验证码，请您联系在线客服帮您开通账号</label>
              </div>-->
            </div>
          </div>
          <div id="div_submit" class="div_submit">
            <div class='div_submit_button'>
              <a href="/index.php/Home/Function/login" id="login_button">登录</a>
              <input id="submit" type="submit" value="注册" class='button_button disabled'>
            </div>
          </div>
        </form>
      </div>
<script type="text/javascript">
function __changeUserName(of){
  var username=$('#'+of).val();
  if(of=='email'){
	  if (username.search(/^[\w\.+-]+@[\w\.+-]+$/) == -1) {
			showTooltips('email_input','请输入正确的Email地址');
			return;
	}					
  }
  else{
	  if(username=='' || !isMobilePhone(username)) {
		  showTooltips('mobile_input','请输入正确的手机号码');
		  return;
	  }
  }
}
function checkPwd1(pwd1) {
	if (pwd1.search(/^.{6,20}$/) == -1) {
		showTooltips('password1_input','密码为空或位数太少');
	}else {
		hideTooltips('password1_input');
	}
}	

function checkEmail(email) {
	if (email.search(/^.+@.+$/) == -1) {
		showTooltips('email_input','邮箱格式不正确');
	}else {
		hideTooltips('email_input');
	}
}

function checkAuthCode(authcode) {
	if (authcode == '' || authcode.length != 6) {
		showTooltips('code_input','验证码不正确');
	}else {
		hideTooltips('code_input');
 }     
}

function check() {
	hideAllTooltips();
	var ckh_result = true;
	if ($('#email').val() == '') {
	showTooltips('email_input','邮箱不能为空');
	ckh_result = false;
  }
  if ($('#password1').val() == '') {
	showTooltips('password1_input','密码不能为空');
	ckh_result = false;
  }      
  if($('#mobile').val()=='' || !isMobilePhone($('#mobile').val())) {            
	  showTooltips('mobile_input','手机号码不正确');
	  ckh_result = false;
  }
  if ($('#code').val() == '' || $('#code').val().length !=6) {
	showTooltips('code_input','验证码不正确');
	ckh_result = false;
  }
  if ($('#verify').attr('checked') == false){
	showTooltips('checkbox_input','对不起，您不同意Webluker的《使用协议》无法注册');
	ckh_result = false;
  }
  return ckh_result;
}
function checkMobilePhone(telphone) {
	if(telphone=='' || !isMobilePhone(telphone)) {
	showTooltips('mobile_input','请输入正确的手机号码');
  }else{
	hideTooltips('mobile_input');
  }
}
function isMobilePhone(value) {
if(value.search(/^(\+\d{2,3})?\d{11}$/) == -1)
return false;
else
return true;
} 
</script> 
    </div>
    <div class='box_bottom'></div>
  </div>
</div>

</body>
</html>