<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\User;

class Login extends Controller
{

    public function index(Request $request)
    {

        return view('register');
    }

}