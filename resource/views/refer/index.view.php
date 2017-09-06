<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 15:16
 */

$context = <<<EOT
    <h1>常用参考文档：</h1>
    <ul>
        <li><a href="https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Headers" target="_blank">HTTP Headers</a> </li>
    
</ul>

EOT;

view('layouts.master', [
    'context' => $context
]);
