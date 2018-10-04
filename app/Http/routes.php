<?php

// Route::any('index','Admin\IndexController@index');

// Route::group(['namespace' => 'Admin'],['middleware' => 'admin.index'], function(){
//     // 控制器在 "App\Http\Controllers\Admin" 命名空间下
//     Route::any('index','IndexController@index');
// });

Route::group(['middleware' => ['web','admin.login']], function(){
    Route::get('/', function () {
    	echo 456;
    	// return view('welcome');
	});
	Route::get('test', function () {
		echo '咔咔';
	});
});


// 用户注册
Route::any('register','Index\RegisterController@index');
// Route::any('register','Index\RegisterController@register');

// 验证用户用户名是否重复
Route::get('checkName','Index\RegisterController@checkName');

// 验证验证码
Route::get('checkCode','Index\RegisterController@checkCode');

// 验证码的路由
Route::get('captcha','Index\RegisterController@code');


/*
用户登录
*/
Route::any('login','Index\LoginController@index');

/*
首页
*/
Route::any('index','Index\IndexController@index');