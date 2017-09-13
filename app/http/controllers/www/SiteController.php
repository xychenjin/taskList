<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 10:30
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;
use Service\Input;
use \stdClass;

class SiteController extends Controller
{
    public function index()
    {
        $hosts = config('host');

        return view('index', compact('hosts'));
    }

    public function countClick()
    {
        $input = new Input();
        $name = $input::get('name');

        echo json_encode(['msg' => 'ok', 'code' => 0, 'data' => ['name' => $name] ]);
    }
}