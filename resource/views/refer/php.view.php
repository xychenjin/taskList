<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 17:59
 */

$title = 'PHP相关';
$globalParamUrl = route('php.param');
$globalLocalUrl = route('phpinfo');
$linkStyle = static_url('/css/self.css');

$context = <<<EOT
    <p class="label-control">PHP官网：</p>
    <p><a href="http://php.net/manual/zh/" target="_blank">http://php.net/</a></p>
    
    <p class="label-control">本地环境时时变量：</p>
    <p><a href="$globalParamUrl" target="_blank">$globalParamUrl</a></p>

    <p class="label-control">查看本地PHP版本：</p>
    <p><a href="$globalLocalUrl" target="_blank">$globalLocalUrl</a></p>

    <p class="label-control">PHP 7.0新特性：</p>
    <p><a href="http://php.net/manual/zh/migration70.new-features.php">http://php.net/manual/zh/migration70.new-features.php</a> </p>
    
    <p class="label-control">PHP 下载：</p>
    <p><a href="http://php.net/downloads.php">http://php.net/downloads.php</a> </p> 
       
       <p class="label-control">PHP 对象和类：</p>
    <p><a href="http://php.net/language.oop5">http://php.net/language.oop5</a> </p>       
    
    <p class="label-control">PHP 必读：</p>
    <p><a href="https://laravel-china.github.io/php-the-right-way/">https://laravel-china.github.io/php-the-right-way/</a> </p>       
    
    <p class="label-control">PHP laravel参考：</p>
    <p><a href="http://cs.laravel-china.org">http://cs.laravel-china.org</a> </p>
    
    

EOT;

$linkStyle = <<<EOT
    <link charset="utf-8" rel="stylesheet" href="$linkStyle" />
EOT;

view('layouts.master', compact('context', 'title', 'linkStyle'));
