<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 18:15
 */

$title = 'HOST版本信息';

$filename = 'C:\Windows\System32\drivers\etc\hosts';

$file = file($filename);
$context = <<<EOT
    <p>$filename</p>
EOT;

foreach ($file as $line_num => $line) {
    $context .= " $line_num ". iconv( 'GBK', 'utf-8', $line ). "<br/>";
}

$context = <<<EOT
    <p>$context</p>
EOT;


view('layouts.master', ['context' => $context, 'title' => $title]);