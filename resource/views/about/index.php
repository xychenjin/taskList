<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 15:42
 */
$title = "关于本站-特别说明";
$context = <<<EOT
    <br/>
    <br/>
    <br/>
EOT;


$context .=
     "#" . str_repeat("&nbsp;", 18) . "#" . str_repeat("&nbsp;", 31) . "#" . str_repeat("&nbsp;", 15). "#" . str_repeat("&nbsp;", 15).  "<br/>"
    ."#" . str_repeat("&nbsp;", 18) . "#" . str_repeat("&nbsp;", 15) . "#" . str_repeat("&nbsp;", 14). "#" . str_repeat("&nbsp;", 15). "#". str_repeat("&nbsp;", 13) . "#". str_repeat("&nbsp;", 5) ."#". "<br/>"
    ."#" . str_repeat("&nbsp;", 18) . "#" . str_repeat("&nbsp;", 8) ."#". str_repeat("&nbsp;", 10) . "#" . str_repeat("&nbsp;", 8). "#" . str_repeat("&nbsp;", 15). "#". str_repeat("&nbsp;", 10). "#". str_repeat("&nbsp;", 15). "#"."<br/>"



    ."#" . str_repeat("&nbsp;#", 6) . str_repeat("&nbsp;", 6) . str_repeat("&nbsp;#", 6). str_repeat("&nbsp;", 7). "#".  str_repeat("&nbsp;", 15). "#". str_repeat("&nbsp;", 9). "#". str_repeat("&nbsp;", 16). "#"."<br/>"



    ."#" . str_repeat("&nbsp;", 18) . "#" . str_repeat("&nbsp;", 8) .  "#" . str_repeat("&nbsp;", 8). "#". str_repeat("&nbsp;", 10). "#" . str_repeat("&nbsp;", 15). "#". str_repeat("&nbsp;", 13) . "#". str_repeat("&nbsp;", 10) ."#"."<br/>"
    ."#" . str_repeat("&nbsp;", 18) . "#" . str_repeat("&nbsp;", 10) . "#" . str_repeat("&nbsp;", 2). "#" . str_repeat("&nbsp;", 14). "#". str_repeat("&nbsp;", 15). "#" . str_repeat("&nbsp;", 18). "#"."<br/>"
    ."#" . str_repeat("&nbsp;", 18) . "#" . str_repeat("&nbsp;", 30) . "#" . str_repeat("&nbsp;", 15). "#" . str_repeat("&nbsp;", 15).  "<br/>"
;

$context .= <<<EOT
    <h1>说明：</h1>
    <p>1.本内容总结了开发中常用到的小知识，便于查阅和参考，如有不足之处，欢迎指出，谢谢您宝贵的经验</p>
    <p>2.版本：通用1.0版</p>
    <p>3.日期：<i>2017年9月</i></p>
    <p>4.作者：<b>Jim</b></p>
    <p>5.邮箱：<u>953440772@qq.com</u></p>
    <p>6.一切解释归作者保留所有</p>
    <br/>
EOT;



view('layouts.master', ['context' => $context, 'title' => $title]);
