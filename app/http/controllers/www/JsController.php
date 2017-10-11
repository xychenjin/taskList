<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/12
 * Time: 16:08
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;

class JsController extends Controller
{
    public function index()
    {

    }

    public function animate()
    {
        return view('js.animate');
    }
}