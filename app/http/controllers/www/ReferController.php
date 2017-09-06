<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 10:51
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;

class ReferController extends Controller
{
    public function phpInfo()
    {
        return view('refer.phpinfo');
    }

    public function mysqlInfo()
    {
        return view('refer.mysql');
    }

    public function httpdInfo()
    {
        return view('refer.httpd');
    }

    public function hostInfo()
    {
        return view('refer.host');
    }

    public function reference()
    {
        return view('refer.index', []);
    }

    public function proc()
    {
        return view('refer.proc', []);
    }

    public function test()
    {
        throw new \Exception('Forbidden', 403);
    }

    public function look()
    {
        foreach ($_SERVER as $key => $item) {
            echo "$key => $item ", "<br/>";
        }
    }
}