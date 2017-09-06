<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 10:30
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $hosts = config('host');
        return view('index', compact('hosts'));
    }

    public function countClick()
    {

    }
}