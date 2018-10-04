<?php 

namespace app\Http\Controllers\Index;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Validator;
use App\Http\model\User;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Crypt;

/**
* 用户注册类
*/
class RegisterController extends CommonController
{
	// 用户注册页面
	public function index(Request $request)
	{
        //设置页面信息
        $data = $this->setPageInfo('Register','','');
        // dd($data);
        //获取请求方式
		$method=$request->method();
		if($method == 'POST'){
            $input = $request->all();

            $rules = [
                'code'=>'required',
                'user_name'=>'required',
                'password' => 'required|confirmed',
            ];
            $message = [
                'required'           =>  ':attribute不能为空',
                'password.confirmed' => '两次输入的密码不一致'
            ];
            $validator = Validator::make($input, $rules, $message);
            /*$validator->passes()验证通过返回true
             * $validator->fails()验证通过返回false
             * */
            // 验证是否输入的内容是否全部通过验证
            if($validator->fails()){
                // laravle自带的返回错误的方法
                return back()->withErrors($validator);
            }
            $user = new user();
            $user->user_name = $input['user_name'];
            $user->password = Crypt::encrypt($input['password']);
            $data = $user->save($data);

            if($data){
                return redirect("home.login");
            }

		}
		return view('home.register')->with([
		    'data'=>$data
        ]);
	}


    // 验证用户名是否重复
    public function checkName(Request $request)
    {
        // 获取用户名
        $username = $request->input('name');
        if($username){
            $userData = new user();
            // 查询数据库判断是否存在用户输入的值
            $data = $userData->where([
                'user_name'=>$username
                ])->first();
            if($data){
                $send = ['code'=>400,'msg'=>'用户名已存在'];
            }else{
                $send = ['code'=>200];
            }
            return $send;
        }
    }



    // 验证码
    public function code()
    {
        $builder = new CaptchaBuilder();

        $builder->build(150,32);

        $phrase = $builder->getPhrase();

        //把内容存入session

        // Session::flash('milkcaptcha', $phrase); //存储验证码
        session(['code' => $phrase]);

        ob_clean();

        return response($builder->output())->header('Content-type','image/jpeg');
    }


    // 验证验证码
    public function checkCode(Request $request)
    {
        $inputCode = $request->input('code');

        $code = session('code');

        if($inputCode != $code){
            $send = ['code'=>400,'msg'=>'验证码输入错误'];
        }else{
            $send = ['code'=>200];
        }

        return $send;
    }


}