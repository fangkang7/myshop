@extends('layouts.home')

@section('content')
	<div class="login">
		<div class="container">
		<form class="reg_info" action="" method="post">
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
                    <input type="text" id="username" name="user_name" placeholder="username" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                    <p></p>
                </div>
				<div class="login-mail">
					<input type="password" id="password" name="password" placeholder="Password" required="">
					<i class="glyphicon glyphicon-lock"></i>
					<p></p>
				</div>
				<div class="login-mail">
					<input type="password" id="repeat_password" name="password_confirmation" placeholder="Repeated password" required="">
					<i class="glyphicon glyphicon-lock"></i>
					<p></p>
				</div>
				<!-- 验证码 -->
				<div class="login-mail" style="width: 300px;">
					<input type="text" id="code"  name="code" placeholder="code" required="">
					<p></p>
				</div>
				<img src="{{url('captcha')}}" style="width: 130px;height: 60px;margin-left: 410px;position: relative;top: -74px;" onclick="this.src=this.src+'?'+Math.random()" class="code" >


				<input type="checkbox" id="checkbox" name="checkbox" >I agree with the terms



	
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
	var tag = false;
	// 验证账号
	function check_name(){

		var name = $('#username').val();

		var reg=/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,12}$/;

		if(!reg.test(name)){

			$('#username').parent().find('p').text('账号必须为6-12位的数字和字母的组合').css('color','red','font-size','14px')
            return false;
      	}else{
      		if(name){
				$.get('{{url("checkName")}}',{name:name},function(data){

					if(data.code == 400){
						$('#username').parent().find('p').text(data.msg).css('color','red')
						tag = false;
					}else{
						$('#username').parent().find('p').text('')
						tag = true;
					}
				},'json')
				return tag;
			}
      	}
	}


	// 验证密码
	function check_password()
	{
		var password = $('#password').val();

		var reg=/^[A-Za-z0-9]{6,18}$/;

		if(!reg.test(password)){
			$('#password').parent().find('p').text('密码必须为6-18位的数字和字母的组合').css('color','red','font-size','14px')
			return false;
		}else{
			$('#password').parent().find('p').text('')
			return true;
		}
	}

	// 验证重复密码
	function check_repeat()
	{
		var password = $('#password').val();

		var repeat_password = $('#repeat_password').val();

		if(password != repeat_password){
			$('#repeat_password').parent().find('p').text('俩次密码不一致').css('color','red','font-size','14px')
			return false;
		}else{
			$('#repeat_password').parent().find('p').text('')
			return true;
		}	
	}

	// 验证验证码
	function check_code()
	{
		var code = $('#code').val();

		$.get("{{url('checkCode')}}",{code:code},function(data){
			if(data.code == 400){
				$('#code').parent().find('p').text(data.msg).css('color','red','font-size','14px');
				return false;
			}else{
				$('#code').parent().find('p').text('');
				return true;
			}
		});
	}

	// 触发验证账号事件
	$('#username').keyup(function(){
		check_name();
	})

	// 触发验证密码
	$('#password').keyup(function(){
		check_password();
	})

	// 触发验证重复密码
	$('#repeat_password').keyup(function(){
		check_repeat();
	})

	// 触发验证验证码
	$('#code').keyup(function(){
		check_code();
	})


	// 表单提交的最后一步认证
	$('.reg_info').submit(function(){

		// 验证条款
		var checked = $('#checkbox').prop('checked')

		if(!checked){
			alert('请同意条款');
			return false;
		}

		if(check_name() && check_password() && check_repeat()){
			return true;
		}else{
			return false;
		}
	})


</script>
@endsection



	
