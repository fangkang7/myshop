<?php 

namespace app\Http\Controllers\Index;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Validator;
use App\Http\model\User;
use Crypt;

/**
* 用户登录类
*/
class LoginController extends CommonController
{
	// 用户登录页面
	public function index(Request $request)
	{
		//设置页面title信息
        $data = $this->setPageInfo('Login','','');

        if($request->method() == 'POST'){
        	$userData = $request->input();
        	$user = new user();
        	$userInfo = $user->where([
        		'user_name'=>$userData['username']
        		])->first();
        	if(!$userInfo){
        		return back()->withInput()->withErrors('用户名不正确!');
        	}

        	if($userInfo['password'] !== Crypt::decrypt($userInfo['password'])){
        		return back()->withInput()->withErrors('密码不正确!');
        	}

        	return redirect('home/index');

        }

        return view('home.login')->with([
        	'data'=>$data
        	]);
	}
 
}