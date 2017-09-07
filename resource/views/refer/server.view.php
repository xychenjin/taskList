<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 10:27
 */

$title = "全局变量\$_SERVER";

$context = "<br/>";

$context = <<<EOT
    $eco
EOT;

view('layouts.master', compact('context', 'title'));

