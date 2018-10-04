@extends('layouts.home')

@section('content')
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Login</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.html">Home</a><label>/</label>Login</h3>
		<div class="clearfix"> </div>
	</div>
</div>


<!-- contact -->
	<div class="login">
		<div class="container">
		<div style="width: 536px;height: 100px;margin-left: 14px;">
		@include('errors.errors')
			
		</div>
		<form action="" method="post" id="user_login">
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">
					<input type="text" placeholder="username" id="username" name="username" required="">
					<i class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" id="password" name="password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				   <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forgot Password</label>
					   </a>

			
			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="login">
					</label>
					<p>Do not have an account?</p>
				<a href="register.html" class="hvr-sweep-to-top">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>

	</div>
	</div>

	<script type="text/javascript">
		$('#user_login').submit(function(){

			var username = $('#username').val();

			var password = $('#password').val(); 

			$.post('{{url("login")}}',{username:username,password:password},function(data){

				if(data.code == 1){
					alert('账号错误')
				}
			});
		})
	</script>

@endsection
