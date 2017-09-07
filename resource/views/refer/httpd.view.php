<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 17:59
 */

$title = 'HTTP版本信息';

$filename = 'D:\wamp\xampp\apache\conf\httpd.conf';

$context = <<<EOT
    <p>$filename</p>
    <p>Apache官网：<a href="http://httpd.apache.org" >http://httpd.apache.org</a></p>
EOT;

$file = file($filename);

foreach ($file as $line_num => $line) {
    $context .= " $line_num ". $line . "<br/>";
}

$context = <<<EOT
    <p>$context</p>
EOT;


view('layouts.master', ['context' => $context, 'title' => $title]);