<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 11:03
 */

namespace App\Http\Controllers;


class Controller
{
    public static function __callStatic($method, $args)
    {
        switch (count($args)) {
            case 1:
                return (new static())->{$method}($args[0]);

            case 2:
                return (new static())->{$method}($args[0], $args[1]);

            case 3:
                return (new static())->{$method}($args[0], $args[1], $args[2]);

            case 4:
                return (new static())->{$method}($args[0], $args[1], $args[2], $args[3]);

            case 5:
                return (new static())->{$method}($args[0], $args[1], $args[2], $args[3], $args[4]);
        }

        return (new static())->{$method}($args);
    }
}