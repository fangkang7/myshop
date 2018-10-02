@extends('layouts.home')

@section('content')
	<div class="login">
		<div class="container">
		<form action="" method="post">
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				@if(count($errors)>0)
						@if(is_object($errors))
							@foreach($errors->all() as $error)
								<p style="color: red;">{{$error}}</p>
							@endforeach
						@else
							<p style="color: red;">{{$error}}</p>
						@endif
				@endif
                <div class="login-mail">
                    <input type="text" name="user_name" placeholder="username" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password_confirmation" placeholder="Repeated password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<!-- 验证码 -->
				<div class="login-mail" style="width: 300px;">
					<input type="text"  name="code" placeholder="code" required="">
				</div>
				<img src="{{url('captcha')}}" style="width: 130px;height: 60px;margin-left: 410px;position: relative;top: -74px;" onclick="this.src=this.src+'?'+Math.random()" class="code" >

				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
					   </a>
	
			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Submit">
					</label>
					<p>Already register</p>
				<a href="login.html" class="hvr-sweep-to-top">Login</a>
			</div>
			<div class="clearfix"> </div>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
		</div>


	</div>

<script type="text/javascript">
/*	$(function(){
		$('.code').click(function(){
			// alert(123)
			var code = $(this).attr('src');
			code = $(this).attr('src')+'?'+Math.random();
		})
	})*/

</script>
@endsection



	
