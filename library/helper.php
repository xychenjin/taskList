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

if(! function_exists('static_path')) {
    function static_path() {
        return app_path(). '/../resource/views';
    }
}

if(! function_exists('view')) {
    function view($view, $params = []) {
        extract($params, EXTR_SKIP);

        $filepath = static_path().'/'. strtr($view, '.', '/') ;

        if (file_exists($filename =  $filepath . '.view.php') || file_exists($filename = $filepath . '.php')) {
            require_once $filename;
        }

        return ;
    }
}

if(! function_exists('config')) {
    function config($key) {
        return require_once app_path(). '/../config/'. $key .'.php';
    }
}

if(! function_exists('route')) {
    function route($key, $params = []) {
        $router = json_decode(file_get_contents(compile_file()), true);
        foreach ($router as $item) {
            list($uri,, $aliasName) = $item;
            if ($key === $aliasName) {
                return getRequestName(). '/' . ltrim($uri, '/') .(empty($params) ? '': '?' . http_build_query($params));
            }
        }
        return  '/';
    }
}

if(! function_exists('static_url')) {
    function static_url($file) {
        return getRequestName(). '/'. ltrim($file, '/');
    }
}

if(! function_exists('getRequestName')) {
    function getRequestName() {
        return $_SERVER['REQUEST_SCHEME'] .':'.( $_SERVER['SERVER_PORT'] == '80' ?  '': $_SERVER['SERVER_PORT'])
            . '//'. $_SERVER['SERVER_NAME'];
    }
}

