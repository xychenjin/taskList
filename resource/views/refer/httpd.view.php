<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 17:59
 */

$title = 'HTTP版本信息';

$filename = 'C:\Windows\System32\drivers\etc\hosts';

$file = file($filename);
$context = <<<EOT
    <p>$filename</p>
EOT;

$file = file('D:\wamp\xampp\apache\conf\httpd.conf');

foreach ($file as $line_num => $line) {
    $context .= " $line_num ". $line . "<br/>";
}

$context = <<<EOT
    <p>$context</p>
EOT;


view('layouts.master', ['context' => $context, 'title' => $title]);