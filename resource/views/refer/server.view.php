<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 10:27
 */

$title = "全局变量\$_SERVER";

$context = "<br/>";

$backUrl = route('php.param');

$eco = $eco ? : json_encode($eco);

$context = <<<EOT
    <p><a href="$backUrl">返回上一页</a> </p><br/>
    $eco 
EOT;

view('layouts.master', compact('context', 'title'));

