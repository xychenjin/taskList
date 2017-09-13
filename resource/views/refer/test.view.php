<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/8
 * Time: 17:24
 */

function buildArray($length, $offset = 1){
    return [
        $offset,  $offset < $length  ? buildArray($length, $offset + 1) : str_repeat("$", $offset)
    ];
}

var_dump(buildArray(4));