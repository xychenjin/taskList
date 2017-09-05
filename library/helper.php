<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 10:18
 */

if(! function_exists('storage_path')) {
    function storage_path() {
        return __DIR__ . '/../storage';
    }
}

if(! function_exists('app_path')) {
    function app_path() {
        return __DIR__ . '/../app';
    }
}

if(! function_exists('route_path')) {
    function route_path() {
        return app_path(). '/http/route';
    }
}

if(! function_exists('compile_file')) {
    function compile_file() {
        $path = app_path(). '/../bootstrap/compile';
        return $path . '/'. md5($path . '/router');
    }
}


if(! function_exists('public_path')) {
    function public_path() {
        return app_path(). '/../public';
    }
}