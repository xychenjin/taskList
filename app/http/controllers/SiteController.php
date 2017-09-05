<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 10:30
 */

namespace App\Http\Controllers;


class SiteController
{
    public function index()
    {
        require public_path(). '/index.php';
        return ;
    }

    public function countClick()
    {
        echo "hi!";
        return 222;
    }
}