<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 10:26
 */

_autoloadClass(app_path() . '/http/controllers');

if (! file_exists($compileFile = compile_file()) || false) {
    _autoCompileRouter();
}

function _autoloadClass($dir){
    if (is_file($dir)) {
        require_once $dir;
        return;
    }

    $dirs = scandir($dir);
    while ( list(,$file) = each($dirs)) {
        if ($file == '.' || $file == '..') {
            continue;
        }

        if (is_file($dir.'/'. $file)) {
            require_once $dir.'/'. $file;
        } elseif (is_dir($dir.'/'. $file)) {
            _autoloadClass($dir.'/'. $file);
        }
    }
}

function _autoloadRouter($dir){
    if (is_file($dir)) {
        $routers = require $dir;
        return $routers;
    }

    $dirs = scandir($dir);
    $routers = [];

    while ( list(,$file) = each($dirs)) {
        if ($file == '.' || $file == '..') {
            continue;
        } elseif (is_file($dir.'/'. $file)) {
            $tempRouters = require $dir .'/'. $file;
            $routers = array_merge($routers, $tempRouters);
        } elseif (is_dir($dir.'/'. $file)) {
            $tempRouters = _autoloadRouter($dir.'/'. $file);
            $routers = array_merge($routers, $tempRouters);
        }
    }
    return $routers;
}

function _autoCompileRouter() {
    $routers = _autoloadRouter( app_path() . '/http/route');

    file_put_contents(compile_file(), json_encode($routers));
}