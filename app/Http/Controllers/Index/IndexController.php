<?php 

namespace app\Http\Controllers\Index;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Validator;
use App\Http\model\User;


/**
* 
*/
class IndexController extends CommonController
{       
    // 首页
    public function index()
    {
        $data = $this->setPageInfo('Index','','');
        return view('home.index')->with([
            'data'=>$data     
        ]);
    }    
       
}