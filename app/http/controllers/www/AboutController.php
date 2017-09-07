<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 15:42
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index');
    }
}