<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class commonController extends Controller
{
    //设置页面信息
    public function setPageInfo($title, $keywords, $description)
    {
        return array(
            'page_title' => $title,
            'page_keywords' => $keywords,
            'page_description' => $description,
        );

    }
}