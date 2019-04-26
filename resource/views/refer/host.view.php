<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 18:15
 */
error_reporting(0);
$title = 'HOST版本信息';

$filename = 'C:\Windows\System32\drivers\etc\hosts';

$file = file($filename);
$context = "";

foreach ($file as $line_num => $line) {
    $context .= trim($line) ? " $line_num ". iconv( 'GBK', 'utf-8', $line ). "<br/>" : "<br/>";
}

$filemtime = date('Y-m-d H:i:s', filemtime($filename) );
$fileatime = date('Y-m-d H:i:s', fileatime($filename) );
$filesize = filesize($filename);

$context = <<<EOT
    <p>文件存放路径：$filename</p>
    <p>文件上次被修改时间：$filemtime</p>
    <p>文件上次被访问时间：$fileatime</p>
    <p>文件大小：$filesize 字节</p>
    <p>文档内容</p>
    <p>$context</p>
EOT;


view('layouts.master', ['context' => $context, 'title' => $title]);