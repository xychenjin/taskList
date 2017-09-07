<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 17:59
 */

$title = 'PHP相关';
$globalUrl = route('otherinfo');
$globalLocalUrl = route('phpinfo');

$context = <<<EOT
    <p>PHP官网：</p>
    <p><a href="http://php.net" target="_blank">http://php.net/</a></p>
    <p>本地环境时时变量：</p>
    <p><a href="$globalUrl" target="_blank">$globalUrl</a></p>

    <p>查看本地PHP版本：</p>
    <p><a href="$globalLocalUrl" target="_blank">$globalLocalUrl</a></p>
EOT;

view('layouts.master', compact('context', 'title'));
