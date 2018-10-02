<?php
Route::any('login','Login@index');


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

// 验证码的路由
Route::get('captcha','Index\RegisterController@code');