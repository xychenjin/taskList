<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/11
 * Time: 14:15
 */

namespace Service;


class Input
{
    private static $inputs = [];

    public function __construct()
    {
        static::$inputs = array_merge($_GET, $_POST);
    }

    public static function get($key = '', $default = '')
    {
        if ($key == '') {
            return static::$inputs;
        }

        if (is_array($key)) {
            return isset($key[$default]) ? $key[$default] : $key;
        }

        return isset(static::$inputs[$key]) ? static::$inputs[$key] : $default;
    }

}