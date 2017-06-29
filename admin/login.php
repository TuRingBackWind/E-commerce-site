<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登录</title>
<link rel="stylesheet" href="styles/reset.css" type="text/css" />
<link rel="stylesheet" href="styles/main.css" type ="text/css" />



</head>
<body>
<div class="header">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="#" alt="慕课网" /></a>
			</div>
			<h3 class="welcome_tit">欢迎登录</h3>
		</div>
	</div>
</div>
<div class="loginBox">
	<div class="login_cont">
	<form action="dologin.php" method="post">
	   <ul class="login">
		<li class="l_tit">管理员账号</li>
		<li class="mb_10"><input type="text" name="username" class="login_input"/></li>
		<li class="l_tit">密码</li>
		<li class="mb_10"><input type="password" name="password" class="login_input"/></li>
		<li class="l_tit">验证码</li>
		<li class="mb_10"><input type="text" name="verify" class="login_input" /></li>
		<li class="mb_20"><img src="getVerify.php" alt="验证码" class="verify" id="verify"/><a class="img_change" href="javascript:void(0)" onclick="document.getElementById('verify').src='getVerify.php?r'+Math.random()">换一个</a></li>
		<li class="autoLogin"><input type="checkbox" id="a1" class="check" name="autoFlag" value="1"/><label for="a1">自动登录</label></li>
		<li><input type="submit" value="登录" class="login_btn"/></li>
	   </ul>
	</form>
	</div>
</div>

<div class="footer">
	<p><a href="#">公司简介</a><i>|</i><a href="#">公司公告</a><i>|</i><a href="#">招贤纳士</a><i>|</i><a href="#">联系我们：400-765-1234</a></p>
	<p>Copyright 2014-2020版权所有</p>
	<p><a href=""><img src="" alt="logo" /></a></p>
</div>
</body>
</html>
