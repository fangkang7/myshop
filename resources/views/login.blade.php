<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登录页</title>
		<link rel="stylesheet" href="{{asset('/resources/assets/static/index/css/login.css')}}" />
		<link rel="stylesheet" href="{{asset('/resources/assets/static/index/css/public.css')}}" />
	</head>
	<body>
		<!--头部-->
		<div id="header">
			<!--进行判断-->
		    <div class="logo">
		    	{{--<a href="index.html"><img src="img/reg_01.png"/></a>--}}
				<a href="index.html"><img src="{{asset('/resources/assets/static/index/img/reg_01.png')}}"/></a>
			</div>
		</div>
		<!--中部-->
		<div id="middle">
			<p>用户登录</p>
			<div>
				<h1>欢迎您登录</h1>
				<p><a href="reg.html">注册</a></p>
				<form action="" method="post">
					<ul>
						<li>
							<label for="username">登录账号：</label>
							<input type="text" name="username" id="username" value="" />
						</li>
						<li>
							<label for="password">密码：</label>
							<input type="password" name="password" id="password" value="" />
							<a href="javascript:void(0)"><span>忘记密码？</span></a>
						</li>
						<li>
							<label for="info">验证码：</label>
							<input type="text" name="info" id="info" value="" /><a href="javascript:void(0)" onclick="refresh()"><img src="img/login_01.png"/></a>
							<a href="javascript:void(0)"><span>看不清</span></a>
						</li>
					</ul>
					<input type="checkbox" name="save" id="save"/>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<label for="save">请保存我这次的登录信息</label>
					<button type="submit" id="login">登录</button>
				</form>
			</div>
		</div>
		<!--尾部-->
		<div id="footer">
			<p>世纪沉香坊有限公司 WowSai.com Copyright© 2008-2013 [京ICP备10020900][京公网安备11010502026420][京ICP证090011号]</p>
		</div>
		<script type="text/javascript" src="js/login.js" ></script>
	</body>
</html>
