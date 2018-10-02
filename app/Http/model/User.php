<?php

namespace App\Http\model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'user';
    public $timestamps = false;

    //用户注册模型
    public function register()
    {

    }
}
